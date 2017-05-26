<?php

namespace App\Repositories;

use App\Product;
use App\Repositories\Eloquent\EloquentRepository;
use stdClass;

class ProductRepository extends EloquentRepository
{

    /**
     * @var \App\Repositories\CharacterizableRepository
     */
    private $_characterizableRepository;


    /**
     * ProductRepository constructor.
     *
     * @param \App\Repositories\CharacterizableRepository $_characterizableRepository
     */
    public function __construct(CharacterizableRepository $_characterizableRepository)
    {
        parent::__construct();
        $this->_characterizableRepository = $_characterizableRepository;
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

        return $products;
    }


    /**
     * Get one product with characteristics
     *
     * @param       $id
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function findProduct($id, $columns = ['*'])
    {

        $result                  = new stdClass();
        $result->product         = $this->_model->find($id, $columns);
        $result->characteristics = [];
        foreach ($result->product->characteristics as $characteristic) {
            $chars                      = [];
            $chars[ 'characterizable' ] = $this->_characterizableRepository->_model->where('characterizable_id',
                $characteristic->pivot->characterizable_id)->first();
            $chars[ 'characteristics' ] = $characteristic;
            dd('aa');
            $result->characteristics[]  = $chars;
        }

        return $result;
    }
}