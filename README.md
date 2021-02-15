## Decision Link filter & pagination proposal.

#### Set database on .env file as sqlite

```dotenv
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=project
#DB_USERNAME=root
#DB_PASSWORD=
```

In `database` directory you would find the database.sqlite file

#### Run the migrations

```
php artisan migrate:fresh --seed
```

#### Import postman collection

Instructions to import postman collection [here](https://kb.datamotion.com/?ht_kb=postman-instructions-for-exporting-and-importing)

#### Move with GIT on commits

###### Move to Simple example directory endpoints

```
git checkout d92092a
```

###### Move to Intermediate example directory endpoints

```
git checkout 1829b3d
```

###### Move to Advance example directory endpoints

```
git checkout 8a3c528
```
