# First launch of the project

### 1) Git clone

        - https://github.com/artem20210413/urbanToolsBackend.git

### 2) DB settings in .env file 11-16

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=urban-tools
    DB_USERNAME=root
    DB_PASSWORD=

### 3) Start openserver

        - crate DB_DATABASE: "urban-tools"

### 5) Rename file .env.loc to .env

### 5) Unzip file 'public\storage.zip'

### 6) Go to the server console and navigate to the project folder.

        - composer install
        - php artisan serve
        - php artisan migrate
        - php artisan db:seed


