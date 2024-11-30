# Installation
> 1. Install dependencies:<br>
```composer install```

> 2. Do database migrations:<br>
```php artisan migrate```

> 3. Seed test users:<br>
```php artisan db:seed --class=UserSeeder```

> 4. Randomize the firstname, lastname and timezone of all 20 users generated in step 3 above:<br>
```php artisan app:update-user-randomly```

> 5. Migrate/Qeue the 'batch' table, if you already have not:<br>
```php artisan queue:batches-table``` <br>
Then migrate: (replace the correct path accordingly)
```php artisan migrate --path=/database/migrations/2024_11_30_154413_create_job_batches_table.php```


# Usage
> Make a POST request to ```/update-user-attributes```.
> If the jobs run successfully, ```storage/logs/laravel.log``` will contain the ```Batch ID``` of the batch.