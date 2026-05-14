<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RiceInventoryModel;
use App\Models\SalesTransactionModel; // Added the Sales Transaction Model
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function __construct() {
        // Protect all methods in this controller
        if(!session()->get('isLoggedIn')){
            header('Location: '.base_url('login'));
            exit;
        }
    }

    public function index() {
        return view('dashboard');
    }

    // ==========================================
    // USER MANAGEMENT CRUD
    // ==========================================

    // List all users
    public function userList() {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    // Show Create User Form
    public function userCreate() {
        return view('users/create');
    }

    // Store New User
    public function userStore() {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];
        $model->save($data);
        return redirect()->to('/users')->with('status', 'User Created Successfully');
    }

    // Show Edit User Form
    public function userEdit($id) {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    // Update User
    public function userUpdate($id) {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
        ];
        
        // If password is provided, hash and update it
        if($this->request->getVar('password')){
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }

        $model->update($id, $data);
        return redirect()->to('/users')->with('status', 'User Updated Successfully');
    }

    // Delete User
    public function userDelete($id) {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users')->with('status', 'User Deleted Successfully');
    }

    // ==========================================
    // RICE INVENTORY MANAGEMENT CRUD
    // ==========================================

    // List all inventory items
    public function inventoryIndex() {
        $model = new RiceInventoryModel();
        $data['inventory'] = $model->findAll();
        return view('inventory/index', $data);
    }

    // Show Create Inventory Form
    public function inventoryCreate() {
        return view('inventory/create');
    }

    // Store New Rice Variety
    public function inventoryStore() {
        $model = new RiceInventoryModel();
        $stock = $this->request->getVar('stock_kg');
        
        // Automatic Status Determination
        $status = 'In Stock';
        if ($stock <= 0) {
            $status = 'Out of Stock';
        } elseif ($stock <= 10) {
            $status = 'Low Stock';
        }

        $data = [
            'variety'  => $this->request->getVar('variety'),
            'grade'    => $this->request->getVar('grade'),
            'stock_kg' => $stock,
            'price'    => $this->request->getVar('price'),
            'status'   => $status
        ];

        $model->save($data);
        return redirect()->to('/inventory')->with('status', 'Rice Variety Added Successfully');
    }

    // Show Edit Inventory Form
    public function inventoryEdit($id) {
        $model = new RiceInventoryModel();
        $data['item'] = $model->find($id);
        return view('inventory/edit', $data);
    }

    // Update Inventory Item
    public function inventoryUpdate($id) {
        $model = new RiceInventoryModel();
        $stock = $this->request->getVar('stock_kg');

        // Automatic Status Determination
        $status = 'In Stock';
        if ($stock <= 0) {
            $status = 'Out of Stock';
        } elseif ($stock <= 10) {
            $status = 'Low Stock';
        }

        $data = [
            'variety'  => $this->request->getVar('variety'),
            'grade'    => $this->request->getVar('grade'),
            'stock_kg' => $stock,
            'price'    => $this->request->getVar('price'),
            'status'   => $status
        ];

        $model->update($id, $data);
        return redirect()->to('/inventory')->with('status', 'Inventory Updated Successfully');
    }

    // Delete Inventory Item
    public function inventoryDelete($id) {
        $model = new RiceInventoryModel();
        $model->delete($id);
        return redirect()->to('/inventory')->with('status', 'Inventory Item Deleted');
    }

    // ==========================================
    // SALES TRANSACTION MANAGEMENT (NEW)
    // ==========================================

    // List Sales and Show Transaction Form
    public function salesIndex() {
        $inventoryModel = new RiceInventoryModel();
        $salesModel = new SalesTransactionModel();

        // Get only items that have stock for the dropdown
        $data['inventory'] = $inventoryModel->where('stock_kg >', 0)->findAll();
        // Get sales history with joined variety names
        $data['sales'] = $salesModel->getSalesHistory();
        $data['selected_variety_id'] = $this->request->getGet('variety_id');
        $data['cart'] = session()->get('cart') ?? [];

        return view('sales/index', $data);
    }

    // Add item to cart
    public function addToCart() {
        $inventoryModel = new RiceInventoryModel();
        $variety_id = $this->request->getPost('variety_id');
        $qty_sold = $this->request->getPost('quantity_kg');
        $customer_name = $this->request->getPost('customer_name') ?: 'Walk-in Customer';

        $rice = $inventoryModel->find($variety_id);
        
        if (!$rice) {
            return redirect()->back()->with('error', 'Variety not found.');
        }

        if ($rice['stock_kg'] < $qty_sold) {
            return redirect()->back()->with('error', 'Not enough stock for ' . $rice['variety']);
        }

        $cart = session()->get('cart') ?? [];
        
        // Check if already in cart, if so, update quantity
        $found = false;
        foreach ($cart as &$item) {
            if ($item['variety_id'] == $variety_id) {
                $item['quantity_kg'] += $qty_sold;
                $item['total_price'] = $item['quantity_kg'] * $rice['price'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart[] = [
                'variety_id'    => $variety_id,
                'variety'       => $rice['variety'],
                'grade'         => $rice['grade'],
                'quantity_kg'   => $qty_sold,
                'price'         => $rice['price'],
                'total_price'   => $rice['price'] * $qty_sold,
                'customer_name' => $customer_name
            ];
        }

        session()->set('cart', $cart);
        return redirect()->to('/sales')->with('status', 'Added to cart!');
    }

    // Remove item from cart
    public function removeFromCart($index) {
        $cart = session()->get('cart') ?? [];
        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->set('cart', array_values($cart));
        }
        return redirect()->to('/sales');
    }

    // Process and Save a Sale (Now handles Cart)
    public function salesStore() {
        $salesModel = new SalesTransactionModel();
        $inventoryModel = new RiceInventoryModel();

        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            // Fallback for single sale if form submitted directly without cart (optional)
            $variety_id = $this->request->getVar('variety_id');
            if ($variety_id) {
                $qty_sold = $this->request->getVar('quantity_kg');
                $customer_name = $this->request->getVar('customer_name') ?: 'Walk-in Customer';
                
                $rice = $inventoryModel->find($variety_id);
                if ($rice['stock_kg'] < $qty_sold) {
                    return redirect()->back()->with('error', 'Not enough stock.');
                }

                $total_price = $rice['price'] * $qty_sold;
                $salesModel->save([
                    'variety_id'    => $variety_id,
                    'quantity_kg'   => $qty_sold,
                    'total_price'   => $total_price,
                    'customer_name' => $customer_name
                ]);

                $new_stock = $rice['stock_kg'] - $qty_sold;
                $status = ($new_stock <= 0) ? 'Out of Stock' : (($new_stock <= 10) ? 'Low Stock' : 'In Stock');
                $inventoryModel->update($variety_id, ['stock_kg' => $new_stock, 'status' => $status]);

                return redirect()->to('/sales')->with('status', 'Sale Recorded!');
            }
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Process each item in cart
        $db = \Config\Database::connect();
        $db->transStart();

        foreach ($cart as $item) {
            $rice = $inventoryModel->find($item['variety_id']);
            
            // Final stock check before saving
            if ($rice['stock_kg'] < $item['quantity_kg']) {
                $db->transRollback();
                return redirect()->back()->with('error', 'Error: Not enough stock for ' . $item['variety']);
            }

            $salesModel->save([
                'variety_id'    => $item['variety_id'],
                'quantity_kg'   => $item['quantity_kg'],
                'total_price'   => $item['total_price'],
                'customer_name' => $item['customer_name']
            ]);

            $new_stock = $rice['stock_kg'] - $item['quantity_kg'];
            $status = ($new_stock <= 0) ? 'Out of Stock' : (($new_stock <= 10) ? 'Low Stock' : 'In Stock');
            $inventoryModel->update($item['variety_id'], ['stock_kg' => $new_stock, 'status' => $status]);
        }

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            return redirect()->back()->with('error', 'Transaction failed.');
        }

        session()->remove('cart');
        return redirect()->to('/sales')->with('status', 'Multiple Sales Recorded Successfully!');
    }
}