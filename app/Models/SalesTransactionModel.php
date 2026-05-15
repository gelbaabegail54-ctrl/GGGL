<?php namespace App\Models;

use CodeIgniter\Model;

class SalesTransactionModel extends Model
{
    protected $table = 'sales_transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['reference_no', 'variety_id', 'quantity_kg', 'total_price', 'cash_received', 'change_amount', 'customer_name', 'transaction_date'];

    // Join with Inventory to show variety names in history, grouped by reference
    public function getSalesHistory()
    {
        return $this->select('sales_transactions.reference_no, sales_transactions.customer_name, sales_transactions.transaction_date, SUM(sales_transactions.total_price) as total_amount, sales_transactions.cash_received, sales_transactions.change_amount, GROUP_CONCAT(CONCAT(rice_inventory.variety, " (", rice_inventory.grade, ")") SEPARATOR ", ") as items_summary, SUM(sales_transactions.quantity_kg) as total_qty')
                    ->join('rice_inventory', 'rice_inventory.id = sales_transactions.variety_id', 'left')
                    ->groupBy('sales_transactions.reference_no')
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