---
layout: default
---

#### The app

 Tell us your wishes and we'll help you decide! ConDr gives you suggestions whether to buy or not a product you are looking for by searching through our database.

### Original request

 > A web tool is needed to provide consumers with advice on decisions to purchase goods / services in an ethical way. The system will be able to store and use the simple rules of the form "if <condition> then <action>" - in our case, for example, "we will not buy / use the product P because it contains / uses substance S", or "I will choose P instead of Q because of M (for example, low mobility or unreasonable price)"- to provide suggestions on personal or group resources. The application will also provide statistics on most of the desired resources, restrictions, people with similar preferences, etc. As a source of inspiration, see Buycott. Bonus: using web microservices.

### Developers team:

Adrian Harabulă  
Elisa Bulbuc-Aioanei  
Elena Anghelina  
Mădălina Buza  

[Click to see invidual work log](another-page).


## Install instructions

Se face clone la repo:
 - Copiați `Dockerfiles/apache/100-condr.conf.example` în __100-condr.conf__ și completați cu date valide

```sh
<VirtualHost *:80>
   ServerName condr.lan
   ProxyPass / http://app/public/
</VirtualHost>
```

 - La fel copiaţi şi `app/.env.example` în __.env__ și completați cu date valide

```sh
APP_ENV=local
# random app_key to be used by default; should be changed
APP_KEY=AfotPtr/kdTWeosS03T3Ghtja6llz7fqBBRzxxwFY64=
APP_WEBHOOKKEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
# this also should be changed accordingly
APP_URL=http://localhost:8000

// verify ssl for curl requests
// you may disable this in dev environment
CURLOPT_SSL_VERIFYPEER=true

DB_CONNECTION=oracle
# oracledb for docker compose
# localhost or anything if else
DB_HOST=oracledb
DB_PORT=1521
DB_USERNAME=condr
DB_PASSWORD=condr
```
 
### Pentru pornire server:
 - `docker-compose up -d`
 - Prima pornire pregăteşte baza de date cu scripturile din [sqlscripts](https://github.com/adrianharabula/condr/tree/master/Dockerfiles/oracledb/sqlscripts).
 - Pentru reinițializare baza de date rulați `docker-compose stop && docker-compose rm -v && docker-compose build && docker-compose up -d`.

### Pentru a instala laravel (se face numai la prima rulare!)

Ne conectăm la containerul aplicaţiei cu
```sh
docker exec -it condr_app_1 bash
```
Instalăm composer cu [get-composer.sh](https://github.com/adrianharabula/condr/blob/master/app/get-composer.sh)
```sh
./get-composer.sh
```
Instalăm laravel cu
```sh
php composer.phar install
```

### Instrucţiuni adiţionale baza de date

 - mai trebuie create tabele în baza de date şi populate, facem asta cu migrations pentru creeare şi seeding pentru populare

Odată pornit docker-compose înseamnă că baza de date s-a şi iniţializat, ce mai urmează este să rulăm peste ea migrările din laravel şi să facem seeding, populând baza de date.

Pentru a rula migrările, ne conectăm la containerul aplicaţiei:
```sh
docker exec -it condr_app_1 bash
```
Şi din container rulăm
```sh
php artisan migrate:refresh --seed
```
Tabelele sunt acum create şi populate.

## Database schema

![](https://raw.githubusercontent.com/adrianharabula/condr-devbook/master/images/schema_latest_part1.png)```

## App URL Routing

### Products routes

| VERB | URI           | ACTION                             | ROUTE                 |
|------|---------------|------------------------------------|-----------------------|
| GET  | /products     | ProductsController@getProductsList | products.listproducts |
| GET  | /product/{id} | ProductsController@getProduct      | products.singleview   |

### Groups routes

| VERB | URI           | ACTION                             | ROUTE                 |
|------|---------------|------------------------------------|-----------------------|
| GET  | /groups       | GroupsController@getGroupsList     | groups.listgroups     |
| GET  | /group/{id}   | GroupsController@getGroup          | groups.singleview     |

### My account routes

| VERB | URI                         | ACTION                                       | ROUTE                      |
|------|-----------------------------|----------------------------------------------|----------------------------|
| GET  | /my/account                 | User\UserSettingsController@index            | my.account.index                |
| GET  | /my/account/change-password | User\UserSettingsController@getEditPassword  | my.account.change-password |
| POST | /my/account/change-password | User\UserSettingsController@postEditPassword | my.account.change-password |

### Favored products routes

| VERB   | URI                     | ACTION                                                | ROUTE              |
|--------|-------------------------|-------------------------------------------------------|--------------------|
| GET    | /my/products            | User\UserProductsController@getFavoriteProducts       | my.products.listproducts        |
| POST   | /my/product/{id}/add    | User\UserProductsController@addFavoriteProduct        | my.product.add     |
| DELETE | /my/product/{id}/delete | User\UserProductsController@deleteFavoriteProduct     | my.product.delete  |

### Groups routes

| VERB   | URI                     | ACTION                                                | ROUTE              |
|--------|-------------------------|-------------------------------------------------------|--------------------|
| GET    | /my/groups              | Group\GroupController@getFavoriteGroups               | my.groups.listgroups       |
| POST   | /my/group/{id}/add      | Group\GroupController@addFavoriteGroup                | my.group.add       |
| DELETE | /my/group/{id}/delete   | Group\GroupController@deleteFavoriteGroup             | my.group.delete    |


## Future times

 Basic functionalities are working. But we want to add (or receieve Pull Requests :) ) for:

 * Mobile app to scan barcode, search product and insert in our database if not exists
 * Posibility to attach characteristic with value to user
 * Filter products by user preference(a characteristic attached to user becomes a preference)
 * Posibility to attach characteristic with value to group
 * Filter products by group preference
 * Advanced filter by characteristics
 * Even more statistics

