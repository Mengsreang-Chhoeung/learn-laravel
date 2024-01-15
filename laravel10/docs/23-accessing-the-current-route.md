# 23 - Accessing the Current Route

You may use the `current`, `currentRouteName`, and `currentRouteAction` methods on the `Route` facade to access information about the route handling the incoming request:

```php
use Illuminate\Support\Facades\Route;

$route = Route::current(); // Illuminate\Routing\Route
$name = Route::currentRouteName(); // string
$action = Route::currentRouteAction(); // string
```

You may refer to the API documentation for both the [underlying class of the Route facade](https://laravel.com/api/10.x/Illuminate/Routing/Router.html) and [Route instance](https://laravel.com/api/10.x/Illuminate/Routing/Route.html) to review all of the methods that are available on the router and route classes.
