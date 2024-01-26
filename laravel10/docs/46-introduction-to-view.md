# 46 - Introduction To View

Of course, it's not practical to return entire HTML documents strings directly from your routes and controllers. Thankfully, views provide a convenient way to place all of our HTML in separate files.

Views separate your controller / application logic from your presentation logic and are stored in the `resources/views` directory. When using Laravel, view templates are usually written using the `Blade templating language`. A simple view might look something like this:

```html
<!-- View stored in resources/views/greeting.blade.php -->

<html>
  <body>
    <h1>Hello, {{ $name }}</h1>
  </body>
</html>
```

Since this view is stored at `resources/views/greeting.blade.php`, we may return it using the global `view` helper like so:

```php
Route::get('/', function () {
    return view('greeting', ['name' => 'James']);
});
```

Looking for more information on how to write Blade templates? Check out the full [Blade documentation](https://laravel.com/docs/10.x/blade) to get started.

## Writing Views in React / Vue

Instead of writing their frontend templates in PHP via Blade, many developers have begun to prefer to write their templates using React or Vue. Laravel makes this painless thanks to [Inertia](https://inertiajs.com), a library that makes it a cinch to tie your React / Vue frontend to your Laravel backend without the typical complexities of building an SPA.

Our Breeze and Jetstream [starter kits](https://laravel.com/docs/10.x/starter-kits) give you a great starting point for your next Laravel application powered by Inertia. In addition, the [Laravel Bootcamp](https://bootcamp.laravel.com) provides a full demonstration of building a Laravel application powered by Inertia, including examples in Vue and React.
