```PHP 8.0 or avobe```
```Composer install```
## Used Separate Database for Multi-Tenant
### Main Database migrate
```php artisan migrate```
### Main Database seed
```php artisan db:seed```

### Tenant Database seed
```php artisan tenants:seed```

## Valet user
#### Use valet link command for tenant.
### Docker or Sail user don't need to do anything. Just use the URL. 
#### For Example:
```tenant.localhost.test```

### From tenant create and blog. It will fire an event and that event will listen from another Laravel app.
