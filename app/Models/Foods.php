<?php

namespace App\Models;

use App\Models\Category;
use App\Models\TransactionItems;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foods extends Model
{
    use HasFactory;
    // use Search;

    protected $guarded = ['id'];
    // protected $searchable = ['name', 'description'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function items()
    {
        return $this->hasMany(TransactionItems::class);
    }

    public function getAllFoods()
    {
        return DB::table('foods')
            ->leftJoin('transaction_items', 'foods.id', '=', 'transaction_items.foods_id')
            ->select('foods.*', DB::raw('COALESCE(SUM(transaction_items.quantity), 0) as total_sold'))
            ->groupBy('foods.id')
            ->get();
    }

    public function getFoodDetails($id)
    {
        return DB::table('foods')
            ->leftJoin('transaction_items', 'foods.id', '=', 'transaction_items.foods_id')
            ->select('foods.*', DB::raw('COALESCE(SUM(transaction_items.quantity), 0) as total_sold'))
            ->where('foods.id', $id)
            ->groupBy('foods.id')
            ->get();
    }

    public function getPromo()
    {
        return DB::table('foods')
            ->leftJoin('transaction_items', 'foods.id', '=', 'transaction_items.foods_id')
            ->select('foods.*', DB::raw('COALESCE(SUM(transaction_items.quantity), 0) as total_sold'))
            ->where('foods.is_promo', 1)
            ->groupBy('foods.id')
            ->get();
    }

    public function getFavoriteFood()
    {
        return TransactionItems::select(
            'foods.*',
            DB::raw('SUM(transaction_items.quantity) as total_sold')
        )
        ->join('foods', 'transaction_items.foods_id', '=', 'foods.id')
        ->groupBy('foods.id')
        ->orderByDesc('total_sold')
        ->get();
    }
}
