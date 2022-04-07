<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['code', 'name'];

    protected static function booted()
    {
        static::creating(function ($product) {
            $max = self::where('code', $product->code)->max('increment') ?? 0;
            $max++;

            $product->increment = $max;
            $product->id = $product->code . $max;
        });
    }
}
