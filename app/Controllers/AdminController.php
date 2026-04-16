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

        return view('sales/index', $data);
    }

    // Process and Save a Sale
    public function salesStore() {
        $salesModel = new SalesTransactionModel();
        $inventoryModel = new RiceInventoryModel();

        $variety_id = $this->request->getVar('variety_id');
        $qty_sold = $this->request->getVar('quantity_kg');

        // 1. Fetch current rice data
        $rice = $inventoryModel->find($variety_id);
        
        // 2. Security Check: Is there enough stock?
        if ($rice['stock_kg'] < $qty_sold) {
            return redirect()->back()->with('error', 'Error: Not enough stock available for ' . $rice['variety']);
        }

        // 3. Calculate Total
        $total_price = $rice['price'] * $qty_sold;

        // 4. Record Transaction
        $salesModel->save([
            'variety_id'    => $variety_id,
            'quantity_kg'   => $qty_sold,
            'total_price'   => $total_price,
            'customer_name' => $this->request->getVar('customer_name') ?: 'Walk-in Customer'
        ]);

        // 5. Update Inventory Stock Level
        $new_stock = $rice['stock_kg'] - $qty_sold;
        
        // 6. Recalculate Status
        $status = 'In Stock';
        if ($new_stock <= 0) $status = 'Out of Stock';
        elseif ($new_stock <= 10) $status = 'Low Stock';

        $inventoryModel->update($variety_id, [
            'stock_kg' => $new_stock,
            'status'   => $status
        ]);

        return redirect()->to('/sales')->with('status', 'Sale Recorded! Total: ₱' . number_format($total_price, 2));
    }
}