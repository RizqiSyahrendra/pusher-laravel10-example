# pusher-laravel10-example
This repository is created as an example how to integrate laravel 10 with pusher using laravel-echo without using any auth provider such as sanctum or passport, I'll be using custom auth guard instead.

## Quick Start

### Installation
1. Create `.env` file from `.env.example` and dont forget to fill PUSHER env variable :
    ```
    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    ```
2. Install php dependencies
    ```
    composer install
    ```
3. Install js dependencies
    ```
    npm install
    ```

### Run
1. Run php server
    ```
    php artisan serve
    ```
2. Run js bundler
    ```
    npm run dev
    ```
  
## Step by step explanation

### Create custom auth provider
- open `app/Providers/AuthServiceProvider.php`
- add a custom guard named 'custom-auth' by using `Auth::viaRequest()`

### Set custom auth guard
- open `config/auth.php`, change defaults->guard to be `api` and add additional guard for broadcasting
  ```
  'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'custom-auth',
            'provider' => 'users'
        ],
        'broadcasting' => [
            'driver' => 'custom-auth',
            'provider' => 'users'
        ],
    ]
    ```
- open `config/app.php` and activate `App\Providers\BroadcastServiceProvider::class`  

- open `App\Providers\BroadcastServiceProvider`, and use middleware in broadcast routes 
```
Broadcast::routes(['middleware' => ['auth:broadcasting']]);
```