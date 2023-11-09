# 06 - Installation

Before creating your first Laravel project, you should ensure that your local machine has **PHP** and **Composer** installed. In addition, we recommend installing **Node** and **NPM**.

For IDE, we recommend **Visual Studio Code**.

After you have installed **PHP** and **Composer**, you may create a new Laravel project via the Composer `create-project` command:

```shell
composer create-project laravel/laravel example-app
```

Or, you may create new Laravel projects by _globally_ installing the Laravel installer via Composer.

```shell
composer global require laravel/installer

laravel new example-app
```

After the project has been created, start Laravel's local development server using the Laravel's Artisan CLI `serve` command:

```shell
cd example-app

php artisan serve
```

Once you have started the Artisan development server, your application will be accessible in your web browser at `http://localhost:8000`.
