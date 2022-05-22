# Dev note

This is a note of creating my first Laravel application.

I make this note to used while creating tutorial in the future.

## Create project

* Create project
    ```shell
    composer create-project --prefer-dist laravel/laravel m10l_dictionary
    ```
* Create MySQL DB
    ```sql
    CREATE USER m10l_dictionary_user IDENTIFIED BY 'm10l_dictionary_password';
    GRANT ALL ON m10l_dictionary.* TO m10l_dictionary_user;
    CREATE DATABASE m10l_dictionary DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
    ```
* Edit .env file, set MySQL database information.
    ```shell
    DB_DATABASE=m10l_dictionary
    DB_USERNAME=m10l_dictionary_user
    DB_PASSWORD=m10l_dictionary_password
    ```
* Start server (run at *m10l_dictionary* directory)
    ```shell
    php -S localhost:8000 -t public
    ```
    or
    ```shell
    php artisan serv
    ```
* Access to http://localhost:8000/ and see the web server works.

## Create database user

* Run the default migration of Laravel
    ```shell
    php artisan migrate
    ```
* Create user group table
    ```shell
    php artisan make:migration create_groups_table
    php artisan make:migration create_user_groups_table
    ```
* After update migration file, run migration
    ```shell
    php artisan migrate
    ```
    To rollback migration
    ```shell
    php artisan migrate:rollback --step=1
    ```
* Create seeder
    ```shell
    php artisan db:seed --class=UserSeeder
    ```

## Create authentication

* Create SimpleAuth middleware
    ```shell
    php artisan make:middleware SimpleAuth
    ```
* Create SimpleLogin controller
    ```shell
    $ php artisan make:controller SimpleLoginController
    ```

Create code for middleware, controller, view, route.

### References

* [ユーザーログイン機能の作成 #Laravel頻出パターン #Laravel基礎](https://note.com/laravelstudy/n/n085aac4506bb?magazine_key=me6288d51a1b8)