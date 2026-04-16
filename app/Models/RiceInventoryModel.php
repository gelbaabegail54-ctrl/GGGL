<?php namespace App\Models;

use CodeIgniter\Model;

class RiceInventoryModel extends Model
{
    protected $table = 'rice_inventory';
    protected $primaryKey = 'id';
    protected $allowedFields = ['variety', 'grade', 'stock_kg', 'price', 'status'];
}