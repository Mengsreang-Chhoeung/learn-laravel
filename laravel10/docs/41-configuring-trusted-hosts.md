# 41 - Configuring Trusted Hosts

By default, Laravel will respond to all requests it receives regardless of the content of the HTTP request's `Host` header. In addition, the `Host` header's value will be used when generating absolute URLs to your application during a web request.

Typically, you should configure your web server, such as Nginx or Apache, to only send requests to your application that match a given host name. However, if you do not have the ability to customize your web server directly and need to instruct Laravel to only respond to certain host names, you may do so by enabling the `App\Http\Middleware\TrustHosts` middleware for your application.

The `TrustHosts` middleware is already included in the `$middleware` stack of your application; however, you should uncomment it so that it becomes active. Within this middleware's `hosts` method, you may specify the host names that your application should respond to. Incoming requests with other `Host` value headers will be rejected:

```php
/**
 * Get the host patterns that should be trusted.
 *
 * @return array<int, string>
 */
public function hosts(): array
{
    return [
        'laravel.test',
        $this->allSubdomainsOfApplicationUrl(),
    ];
}
```

The `allSubdomainsOfApplicationUrl` helper method will return a regular expression matching all subdomains of your application's `app.url` configuration value. This helper method provides a convenient way to allow all of your application's subdomains when building an application that utilizes wildcard subdomains.
