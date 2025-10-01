# Company Management Panel

Create, Read, Update, and Delete operations for two key resources; Companies and Employees.

## Recommendation to run locally:

- Download and unzip this repo, `cd` to project root in your terminal and run `composer install`. This will pull in everything from [composer.json](composer.json). You will need [Composer](https://getcomposer.org/download/) installed.
- In the same terminal, run `npm install`, then run `npm run dev` (development environment) or `npm run build` (production environment).
- Clone [.env.example](.env.example) and rename it to `.env`.
- `cd` to project root in your terminal and run `php artisan key:generate` and then `php artisan migrate:fresh --seed`.
- Run Apache using [XAMPP](https://www.apachefriends.org/download.html) and set the Apache config file to run the server on [public](public).

