# filament-peek-demo-with-astro

*(Work in progress)*

A demo project showcasing the [Peek](https://github.com/pboivin/filament-peek/) plugin for [Filament](https://filamentphp.com/). This version is a remix of the [main demo](https://github.com/pboivin/filament-peek-demo), using [Astro](https://astro.build/) as a decoupled front-end.

<p class="filament-hidden">
<img src="https://raw.githubusercontent.com/pboivin/filament-peek/2.x/art/01-page-preview.jpg" alt="Screenshots of the edit page and preview modal">
</p>

The idea is to explore Filament as a light, headless content management system (CMS). You'll find simple content types such as Pages, Posts and Menus, with support for image uploads. For content entry, Pages feature a rich-text editor ([Tiptap](https://github.com/awcodes/filament-tiptap-editor)) while Posts feature a block-based content editor ([Builder](https://filamentphp.com/docs/3.x/forms/fields/builder)).

The approach chosen is to run both Filament and Astro locally for content entry, then generate a full static site from the command line. From there, the site can be easily deployed in a variety of ways. Alternatively, it's also possible to run Filament on a server dedicated to content entry, then build and deploy the static site on the server or through automation (e.g. GitHub Actions). Both approaches support live content previews while editing in the CMS.

## Requirements

- PHP >= 8.1
- Node >= 18.0

## Local setup

#### Filament

```sh
composer install
cp .env.example .env
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

You can log into the admin at [localhost:8000/admin](http://localhost:8000/admin) with the following credentials:

- Email: `admin@test.test`
- Password: `admin@test.test`

#### Astro

```sh
cd frontend
cp .env.example .env
npm install
npm run dev
```

You can access the site at [localhost:3000](http://localhost:3000)
