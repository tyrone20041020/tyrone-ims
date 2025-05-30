<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'supplier_id', 'name', 'description', 'price', 'sku'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class);
    }
}

