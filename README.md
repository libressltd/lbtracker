# DeepPermission

### Step 1: Install DeepPermission

composer require libressltd/lbtracker

### Step 2: Add service provider to config/app.php

```php
//Provider

LIBRESSLtd\LBTracker\LBTrackerServiceProvider::class,

```

### Step 3: Publish vendor

```php
php artisan vendor:publish --tag=lbtracker --force

php artisan migrate
```

### Step 4: Add following line to App\Http\Kernel > middleware
	
	
```php


'lbtracker' => \App\Http\Middleware\LBTrackerMiddleware::class

```

Add middleware to any route that you want to track

```php

Route::group(["middleware" => ["lbtracker"]], function() {
	Route::get('/', function () {
	    return view('welcome');
	});
});

```
```