<?php namespace App\Models;

use CodeIgniter\Model;

class SalesTransactionModel extends Model
{
    protected $table = 'sales_transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['variety_id', 'quantity_kg', 'total_price', 'customer_name', 'transaction_date'];

    // Join with Inventory to show variety names in history
    public function getSalesHistory()
    {
        return $this->select('sales_transactions.*, rice_inventory.variety, rice_inventory.grade')
                    ->join('rice_inventory', 'rice_inventory.id = sales_transactions.variety_id')
                    ->orderBy('transaction_date', 'DESC')
                    ->findAll();
    }
}