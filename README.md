<h1 align="center">
  <br>
  <a href="#"><img src="https://cdn2.downdetector.com/static/uploads/logo/twitter-logo_1.png" alt="twitter" width="200"></a>
</h1>

<h4 align="center">Twitter Clone</h4>

<p align="center">
  <a href="#getting-started">Getting Started</a> •
  <a href="#Running The App"> Running The App</a> •
</p>

## Getting Started 💻

1. Clone the repo  
   ` git clone https://github.com/talaridisTh/twitter.git`

2. Install Composer dependencies  
   ` composer install`

3. Install NPM Dependencies  
   ` npm install`

4. Create a copy of your `.env` file  
   ` cp .env.example .env`

5. Generate an app encryption key  
   ` php artisan key:generate`

6. Create an empty database for our application

7. In the `.env` file, add database information to allow Laravel to connect to the database
   > In the `.env` file fill in the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match the credentials of the database you just created. This will allow us to run migrations database in the next step.

8. In the `.env` file, include the mail credentials to send and receive emails when using the website.

9. Last but not least, run `php artisan migrate --seed` to create the database schema.

## Running The App 🛠

1. Run the Laravel Server  
   ` php artisan serve`

2. Build the ui  
   ` npm run watch`

3. Visit `localhost:3000`

<hr>

> Documentation Version v1.0  
By [@talaridisTh](https://github.com/talaridisTh)