<?php namespace App\Models;

use CodeIgniter\Model;

class SalesTransactionModel extends Model
{
    protected $table = 'sales_transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['reference_no', 'variety_id', 'quantity_kg', 'total_price', 'customer_name', 'transaction_date'];

    // Join with Inventory to show variety names in history
    public function getSalesHistory()
    {
        return $this->select('sales_transactions.*, rice_inventory.variety, rice_inventory.grade')
                    ->join('rice_inventory', 'rice_inventory.id = sales_transactions.variety_id')
                    ->orderBy('transaction_date', 'DESC')
                    ->findAll();
    }

    public function getWeeklySales()
    {
        return $this->select("DATE(transaction_date) as date, SUM(total_price) as total")
                    ->groupBy("DATE(transaction_date)")
                    ->where('transaction_date >=', date('Y-m-d', strtotime('-6 days')))
                    ->orderBy('date', 'ASC')
                    ->findAll();
    }

    public function getSalesByVariety()
    {
        return $this->select('rice_inventory.variety, SUM(sales_transactions.total_price) as total')
                    ->join('rice_inventory', 'rice_inventory.id = sales_transactions.variety_id')
                    ->groupBy('rice_inventory.variety')
                    ->findAll();
    }

    public function getTransactionByReference($ref)
    {
        return $this->select('sales_transactions.*, rice_inventory.variety, rice_inventory.grade, rice_inventory.price as unit_price')
                    ->join('rice_inventory', 'rice_inventory.id = sales_transactions.variety_id')
                    ->where('sales_transactions.reference_no', $ref)
                    ->findAll();
    }
}