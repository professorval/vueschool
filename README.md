#Installation
> 1. Install dependencies:<br>
```composer install```

> 2. Do database migrations:<br>
```php artisan migrate```

> 3. Seed test users:<br>
```php artisan db:seed --class=UserSeeder```

> 4. Randomize the firstname, lastname and timezone of all 20 users generated in step 3 above:<br>
```php artisan app:update-user-randomly```
