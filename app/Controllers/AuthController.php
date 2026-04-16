<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    // --- LOGIN LOGIC ---

    public function login()
    {
        return view('login');
    }

    public function loginAuth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $model->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    // --- REGISTRATION LOGIC (NEW) ---

    public function register()
    {
        return view('register');
    }

    public function registerStore()
    {
        $model = new UserModel();

        // Basic Validation Rules
        $rules = [
            'username' => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[255]',
        ];

        if($this->validate($rules)){
            $data = [
                'username' => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                // Hash the password for security
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $model->save($data);
            
            // Redirect to login with success message
            session()->setFlashdata('msg', 'Registration Successful! You can now log in.');
            return redirect()->to('/login');
        } else {
            // If validation fails, reload the register page with errors
            $session = session();
            $session->setFlashdata('msg', 'Validation Failed: Check email uniqueness or password length.');
            return redirect()->to('/register');
        }
    }

    // --- LOGOUT LOGIC ---

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}