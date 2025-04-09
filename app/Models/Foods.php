<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function items()
    {
        return $this->hasMany(TransactionItems::class);
    }
}
