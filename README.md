# filament-peek-demo-with-astro

WIP

## Local setup

Add the following entries to `/etc/hosts`:

```
127.0.0.1    admin.acme.test
127.0.0.1    front.acme.test
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
npm install
npm run dev
```

You can access the site at [front.acme.test:3000](http://front.acme.test:3000)
