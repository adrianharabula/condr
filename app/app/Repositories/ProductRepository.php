<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepositoryInterface;

use App\Product;

class ProductRepository extends EloquentRepository
{

    public function getModel()
    {
        return Product::class;
    }


    public function searchProducts($data)
    {
        $cacheKey = 'productSearch'.$data->product_name;
        if(cache()->has($cacheKey)){
            $products = cache()->get($cacheKey);
        }else{
            $products = $this->_model
                ->where('name','LIKE','%'.ucwords($data->product_name).'%')
                ->orWhere('description','LIKE','%'.ucwords($data->product_name).'%')->get();
            cache()->put($cacheKey,$products,1440);
        }
        return $products;
    }
}