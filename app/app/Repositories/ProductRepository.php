<?php

namespace App\Repositories;

use App\Product;
use App\Repositories\Eloquent\EloquentRepository;
use App\SearchAnalytics;
use stdClass;

class ProductRepository extends EloquentRepository
{

    /**
     * @var \App\SearchAnalytics
     */
    private $_searchAnalytics;


    /**
     * ProductRepository constructor.
     *
     * @param \App\SearchAnalytics $_searchAnalytics
     */
    public function __construct(SearchAnalytics $_searchAnalytics)
    {
        parent::__construct();
        $this->_searchAnalytics = $_searchAnalytics;
    }

    public function getModel()
    {
        return Product::class;
    }

    public function searchProducts($data)
    {
        $cacheKey = 'productSearch'.$data->product_name;
        if (cache()->has($cacheKey)) {
            $products = cache()->get($cacheKey);
        } else {
            $products = $this->_model->where('name', 'LIKE',
                '%'.ucwords($data->product_name).'%')->orWhere('description', 'LIKE',
                '%'.ucwords($data->product_name).'%')->get();
            cache()->put($cacheKey, $products, 1440);
        }

        if($data->product_name!=""){
            $this->incrementSearch($data->product_name);
        }

        return $products;
    }

    private function incrementSearch($keyword)
    {
        $analyze = $this->_searchAnalytics->where("keyword", "=", strtolower($keyword))->first();

        if($analyze) {
            $analyze->increment("searches");
        } else {
            $analyze=new SearchAnalytics();
            $analyze->keyword=strtolower($keyword);
            $analyze->searches=1;
            $analyze->save();
        }
        return true;
    }
}