## Decision Link filter & pagination proposal.

#### Download the project

```
git clone https://github.com/ArielMejiaDev/filters-pagination-propousal.git project
```

#### Install dependencies

```
composer install
```

#### Import postman collection

[Collection link](https://drive.google.com/file/d/15VEcYY8-yNkyRkL1rZnAjlLTDIwYNcF_/view?usp=sharing)

Instructions to import postman collection [here](https://kb.datamotion.com/?ht_kb=postman-instructions-for-exporting-and-importing)

#### Set environment

Create the .env file

```
cp .env.example .env
```

Create the database

```
touch database/database.sqlite
```

run migrations and seeds

```
php artisan migrate:fresh --seed
```

#### Move with GIT on commits

###### Move to Simple example directory endpoints

```
git checkout 6c822ca
```

###### Move to Intermediate example directory endpoints

```
git checkout 879a9a2
```

###### Move to Advance example directory endpoints

```
git checkout 0fa46fe
```
