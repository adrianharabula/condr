---
layout: default
---
# Site routes

## Products routes

| VERB | URI           | ACTION                             | ROUTE                 |
|------|---------------|------------------------------------|-----------------------|
| GET  | /products     | ProductsController@getProductsList | products.listproducts |
| GET  | /product/{id} | ProductsController@getProduct      | products.singleview   |

## My account routes

| VERB | URI                         | ACTION                                       | ROUTE                      |
|------|-----------------------------|----------------------------------------------|----------------------------|
| GET  | /my/account                 | User\UserSettingsController@index            | my.account.index                |
| GET  | /my/account/change-password | User\UserSettingsController@getEditPassword  | my.account.change-password |
| POST | /my/account/change-password | User\UserSettingsController@postEditPassword | my.account.change-password |

### Favored products routes

| VERB   | URI                     | ACTION                                                | ROUTE              |
|--------|-------------------------|-------------------------------------------------------|--------------------|
| GET    | /my/products            | User\UserProductsController@getFavoriteProducts       | my.products.listproducts        |
| POST   | /my/product/{id}/add    | User\UserProductsController@addFavoriteProduct | my.product.add |
| DELETE | /my/product/{id}/delete | User\UserProductsController@deleteFavoriteProduct | my.product.delete |

