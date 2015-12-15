# Dolphin database access and view app

Documentation In Progress.

# Installation Notes
First enter the repository, edit .env to set up DB_HOST, DB_DATABSE, DB_USERNAME, DB_PASSWORD.

Run(need to install composer first)

    composer install
    php artisan migrate

Change permissions on storage folder

    chmod -R a+w storage

Set up a virtual host in apache