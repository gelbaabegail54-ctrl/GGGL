<?php namespace App\Controllers;

use App\Models\SalesTransactionModel;
use CodeIgniter\Controller;

class Sales extends Controller
{
    public function __construct() {
        if(!session()->get('isLoggedIn')){
            header('Location: '.base_url('login'));
            exit;
        }
    }

    public function history()
    {
        $model = new SalesTransactionModel();
        
        $data = [
            'sales' => $model->getSalesHistory(), // This calls the join method in your Model
            'title' => 'Sales History Log'
        ];

        // This points to the new view file you will create
        return view('sales/history_view', $data);
    }
}