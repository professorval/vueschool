# Installation

> 1. Clone this repo:
```https://github.com/professorval/vueschool.git```

> 2. Install dependencies:<br>
```composer install```

> 3. Do database migrations:<br>
```php artisan migrate```

> 4. Seed test users:<br>
```php artisan db:seed --class=UserSeeder```

> 5. Randomize the firstname, lastname and timezone of all 20 users generated in step 3 above:<br>
```php artisan app:update-user-randomly```

> 6. Qeue the 'batch' table, if you already have not:<br>
```php artisan queue:batches-table``` <br>

> 7. Migrate (replace the correct path accordingly)<br>
```php artisan migrate --path=/database/migrations/2024_11_30_154413_create_job_batches_table.php```

> 8. Run the app:
```php artisan serve```


# Usage
> Make a POST request to ```/update-user-attributes```.<br><br>
> If the jobs run successfully, ```storage/logs/laravel.log``` will contain the ```Batch ID``` of the batch.