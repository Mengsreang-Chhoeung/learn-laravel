# 08 - Frontend

**Laravel** is a backend framework that provides all of the features you need to build modern web applications, such as _routing_, _validation_, _caching_, _queues_, _file storage_, and more. However, we believe it's important to offer developers a beautiful full-stack experience, including powerful approaches for building your application's frontend.

## Using PHP

### PHP & Blade

In the past, most PHP applications rendered HTML to the browser using simple HTML templates interspersed with PHP `echo` statements which render data that was retrieved from a database during the request:

```php
<div>
    <?php foreach ($users as $user): ?>
        Hello, <?php echo $user->name; ?> <br />
    <?php endforeach; ?>
</div>
```

In Laravel, this approach to rendering HTML can still be achieved using _views_ and _Blade_. Blade is an extremely light-weight templating language that provides convenient, short syntax for displaying data, iterating over data, and more:

```php
<div>
    @foreach ($users as $user)
        Hello, {{ $user->name }} <br />
    @endforeach
</div>
```

When building applications in this fashion, form submissions and other page interactions typically receive an entirely new HTML document from the server and the entire page is re-rendered by the browser. Even today, many applications may be perfectly suited to having their frontends constructed in this way using simple Blade templates.

### Livewire

**Laravel Livewire** is a framework for building Laravel powered frontends that feel dynamic, modern, and alive just like frontends built with modern JavaScript frameworks like Vue and React.

When using Livewire, you will create Livewire "components" that render a discrete portion of your UI and expose methods and data that can be invoked and interacted with from your application's frontend. For example, a simple "Counter" component might look like the following:

```php
<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
```

And, the corresponding template for the counter would be written like so:

```html
<div>
  <button wire:click="increment">+</button>
  <h1>{{ $count }}</h1>
</div>
```

As you can see, Livewire enables you to write new HTML attributes such as `wire:click` that connect your Laravel application's frontend and backend. In addition, you can render your component's current state using simple Blade expressions.

### Starter Kits

If you would like to build your frontend using PHP and Livewire, you can leverage our Breeze or Jetstream starter kits to jump-start your application's development. Both of these starter kits scaffold your application's backend and frontend authentication flow using _Blade_ and _Tailwind_ so that you can simply start building your next big idea.

## Using Vue / React

Although it's possible to build modern frontends using Laravel and Livewire, many developers still prefer to leverage the power of a JavaScript framework like Vue or React. This allows developers to take advantage of the rich ecosystem of JavaScript packages and tools available via NPM.

### Inertia

Thankfully, Laravel offers the best of both worlds. **Inertia** bridges the gap between your Laravel application and your modern Vue or React frontend, allowing you to build full-fledged, modern frontends using Vue or React while leveraging Laravel routes and controllers for routing, data hydration, and authentication — all within a single code repository. With this approach, you can enjoy the full power of both Laravel and Vue / React without crippling the capabilities of either tool.

After installing Inertia into your Laravel application, you will write routes and controllers like normal. However, instead of returning a Blade template from your controller, you will return an Inertia page:

```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(string $id): Response
    {
        return Inertia::render('Users/Profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}
```

An Inertia page corresponds to a Vue or React component, typically stored within the `resources/js/Pages` directory of your application. The data given to the page via the `Inertia::render` method will be used to hydrate the "props" of the page component:

```html
<script setup>
  import Layout from "@/Layouts/Authenticated.vue";
  import { Head } from "@inertiajs/vue3";

  const props = defineProps(["user"]);
</script>

<template>
  <head title="User Profile" />

  <Layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
    </template>

    <div class="py-12">Hello, {{ user.name }}</div>
  </Layout>
</template>
```

As you can see, Inertia allows you to leverage the full power of Vue or React when building your frontend, while providing a light-weight bridge between your Laravel powered backend and your JavaScript powered frontend.

#### Server-Side Rendering

If you're concerned about diving into Inertia because your application requires server-side rendering, don't worry. Inertia offers _server-side rendering support_.

### Starter Kits

If you would like to build your frontend using Inertia and Vue / React, you can leverage our Breeze or Jetstream starter kits to jump-start your application's development. Both of these starter kits scaffold your application's backend and frontend authentication flow using Inertia, `Vue / React`, `Tailwind`, and `Vite` so that you can start building your next big idea.

## Bundling Assets

Regardless of whether you choose to develop your frontend using Blade and Livewire or Vue / React and Inertia, you will likely need to bundle your application's CSS into production ready assets. Of course, if you choose to build your application's frontend with Vue or React, you will also need to bundle your components into browser ready JavaScript assets.

By default, Laravel utilizes **Vite** to bundle your assets. Vite provides lightning-fast build times and near instantaneous Hot Module Replacement (HMR) during local development. In all new Laravel applications, including those using our starter kits, you will find a `vite.config.js` file that loads our light-weight Laravel Vite plugin that makes Vite a joy to use with Laravel applications.
