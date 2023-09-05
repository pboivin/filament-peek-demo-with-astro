# filament-peek-demo-with-astro

**Work in progress**

This is a remix of the [Filament Peek demo project](https://github.com/pboivin/filament-peek-demo), using [Astro.js](https://astro.build/) as a decoupled front-end.

## Local setup

Add the following entries to `/etc/hosts`:

```
127.0.0.1    admin.acme.test
127.0.0.1    front.acme.test
127.0.0.1    media.acme.test
```

#### Filament

```sh
composer install
cp .env.example .env
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

You can log into the admin at [admin.acme.test:8000/admin](http://admin.acme.test:8000/admin) with the following credentials:

- Email: `admin@test.test`
- Password: `admin@test.test`

#### Astro

```sh
cd frontend
cp .env.example .env
npm install
npm run dev
```

You can access the site at [front.acme.test:3000](http://front.acme.test:3000)
