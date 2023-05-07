# Foody

## How To Install

- Download Xampp From [HERE](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.1.17/xampp-windows-x64-8.1.17-0-VS16-installer.exe)
- Start Xampp and upload the database file in `backend/db/foody.sql`
- configure DB Info In `backend/config.php` , update these values
```php
<?php
return [
    // app
    'name' => 'foody',
    'url' => 'http://localhost/foody',
    'backend_url' => 'http://localhost/foody/backend',
    // database
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db_name' => 'foody'
];
```