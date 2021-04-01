<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'sku', 'description'
    ];

    public function product_variants(){
        return $this->hasMany(ProductVariant::class,'product_id','id');
    }

    public function product_variant_prices(){
        return $this->hasMany(ProductVariantPrice::class, 'product_id', 'id');
    }

    // Insert Data into Product Table
    public static function addNewProduct($requestData){
        try{
            $id = static::create($requestData);
            return $id;
        }catch(\Exception $e){
            throw new \Exception($e->getMessage(), 1);               
        }
    }

}
