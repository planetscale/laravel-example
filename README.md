# Learn how to integrate PlanetScale with a sample Laravel application

This sample application demonstrates how to connect to a PlanetScale MySQL database, run migrations, seed the database, and display the data.

![Sample app homepage](https://docs.planetscale.com/img/docs/laravel-planetscale-example-data.png)

For the full tutorial, see the [Laravel PlanetScale documentation](https://docs.planetscale.com/tutorials/connect-laravel-app).

## Prerequisites

- [PHP](https://www.php.net/manual/en/install.php) &mdash; This tutorial uses `v8.1`
- [Composer](https://getcomposer.org/)
- A [free PlanetScale account](https://auth.planetscale.com/sign-up)
- [PlanetScale CLI](https://github.com/planetscale/cli) &mdash; You can also follow this tutorial using just the PlanetScale admin dashboard, but the CLI will make setup quicker. For dashboard instructions, see [the full tutorial](https://docs.planetscale.com/tutorials/connect-laravel-app).

## Set up the Laravel app

1. Clone the starter Laravel 9 application:

```bash
git clone https://github.com/planetscale/laravel-example.git
```

2. Enter into the folder and install the dependencies:

```bash
cd laravel-example
composer install
```

3. Copy the `.env.example` file into `.env`:

```bash
cp .env.example .env
```

4. Start the application:

```bash
php artisan serve
```

View the application at [http://localhost:8000](http://localhost:8000).

## Set up the database

1. Authenticate the CLI with the following command:

```bash
pscale auth login
```

2. Create a new database with a default `main` branch with the following command:

```bash
pscale database create <DATABASE_NAME> --region <REGION_SLUG>
```

This tutorial uses `laravel_example` for `DATABASE_NAME`, but you can use any name with lowercase, alphanumeric characters or underscores. You can also uses dashes, but we don't recommend them, as they may need to be escaped in some instances.

For `REGION_SLUG`, choose a region closest to you from the [available regions](/concepts/regions#available-regions) or leave it blank.

## Connect to the Laravel app

There are **two ways to connect** to PlanetScale:

- Using client certificates with the CLI
- With an auto-generated username and password

Both options are covered below.

### Connect with username and password

1. Create a username and password with the PlanetScale CLI by running:

```bash
pscale password create <DATABASE_NAME> <BRANCH_NAME> <PASSWORD_NAME>
```

> Note: `PASSWORD_NAME` represents the name of the username and password being generated. You can have multiple credentials for a branch, so this gives you a way to categorize them.

The default branch created for you is called `main`.

Take note of the values returned to you, as you won't be able to see them again.

2. Open the `.env` file in your Laravel app, find the database connection section, and fill it in as follows:

```
DB_CONNECTION=mysql
DB_HOST=<ACCESS HOST URL> # outputted in the previous step
DB_PORT=3306
DB_DATABASE=<DATABASE_NAME> # this tutorial uses 'laravel_example'
DB_USERNAME=<USERNAME> # outputted in the previous step
DB_PASSWORD=<PLAIN TEXT> # outputted in the previous step
MYSQL_ATTR_SSL_CA=/etc/ssl/cert.pem
```

Refresh your Laravel homepage and you should see the message that you're connected to your database!

### Connect with client certificates

To connect with client certificates, you'll need the [PlanetScale CLI](https://github.com/planetscale/cli).

1. Open a connection by running the following:

```bash
pscale connect <DATABASE_NAME> <BRANCH_NAME>
```

The default branch is `main`.

2. A secure connection to your database will be established and you'll see a local address you can use to connect to your application.

3. Open the `.env` file in your Laravel app and update it as follows:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 // Get this from the output of the previous step
DB_DATABASE=<DATABASE_NAME>
DB_USERNAME=
DB_PASSWORD=
```

The connection uses port `3306` by default, but if that's being used, it will pick a random port. Make sure you paste in whatever port is returned in the terminal. You can leave `DB_USERNAME` and `DB_PASSWORD` blank.

Refresh your Laravel homepage and you should see the message that you're connected to your database!

## Run migrations and seeder

Now that you're connected, let's add some data to see it in action. The sample application comes with two migration files:

- `database/migrations/2021_12_20_194637_create_stars_table.php` &mdash; Creates a `stars` table
- `database/migrations/2021_12_20_194637_create_constellations_table.php` &mdash; Creates a `constellations` table


There are also two seeders, `database/seeders/ConstellationSeeder.php` and `database/seeders/StarSeeder.php`, that will add two rows to the each table. Let's run those now.

1. Make sure your database connection has been established. You'll see the message "You are connected to your-database-name" on the [Laravel app homepage](http://localhost:8000/) if everything is configured properly.

2. In the root of the Laravel project, run the following to run migrations:

```bash
php artisan migrate
```

3. Seed the database by running:

```bash
php artisan db:seed
```

You should get the message "Database seeding completed successfully".

4. Refresh your Laravel homepage and you'll see a list of stars and their constellations printed out.

The `resources/views/home.blade.php` file pulls this data from the `stars` table with the help of the `app/Http/Controllers/StarController.php` file.

## Need help?

For more information about adding data, check out the full [Laravel PlanetScale documentation](https://docs.planetscale.com/tutorials/connect-laravel-app).

If you need further assistance, you can reach out to [PlanetScale's support team](https://www.planetscale.com/support), or join our [GitHub Discussion board](https://github.com/planetscale/beta/discussions) to see how others are using PlanetScale.
