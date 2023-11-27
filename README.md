# DHVSUM (Don Honorio Ventura State University Marketplace WEB APP)
 

## Backpack Laravel Installation

- __Backpack__ <br />https://backpackforlaravel.com/docs/6.x/installation <br />

```
composer require backpack/crud


php artisan backpack:install
```

## Backpack PermissionManager
- __PermissionManager__ <br /> https://github.com/Laravel-Backpack/PermissionManager <br />

- This package assumes you've already installed Backpack for Laravel. If you haven't, please install Backpack first.

- In your terminal:

```
composer require backpack/permissionmanager
```

- inish all installation steps for spatie/laravel-permission, which has been pulled as a dependency. Run its migrations. Publish its config files. Most likely it's:

```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="permission-migrations"

php artisan migrate

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="permission-config"
// then, add the Spatie\Permission\Traits\HasRoles trait to your User model(s)
```

# Instructions
- If project is cloned make sure type `composer install` to intall all necessary independency

```
composer install
```

- Create database named `dhvsum` in phpmyadmin

- Open terminal in VSCode and type `php artisan migrate` to create all necessary data tables

```
php artisan migrate
```

- After migration type `php artisan db:seed` to insert the sample data

```
php artisan db:seed
```


- Type `php artisan serve` to run server

```
php artisan serve
```


- If error occurs type `composer update` then run serve

```
composer update
```


- If error occurs repair `node.js` executable from downloads then type `npm install` on terminal

```
npm install
```

- Open new terminal then type `npm run dev` to run script and live server (optional)

```
npm run dev
```

- Test Account

Test User
```
email: test@example.com
password: 12345678
```
Test Admin
```
email: admin@example.com
password: 12345678
```

## Dependencies
- __Composer__ <br />https://getcomposer.org/ <br />
- __Node js__  <br />https://nodejs.org/en/download<br />

## Frameworks
- __Laravel__ <br />https://laravel.com/<br />
- __Tailwind__ <br />https://tailwindcss.com/<br />

