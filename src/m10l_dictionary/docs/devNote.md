# Dev note

This is a note of creating my first Laravel application.

I make this note to used while creating tutorial in the future.

## Create project

* Create project
    ```php
    composer create-project --prefer-dist laravel/laravel dictionary
    ```
* Create MySQL DB
    ```sql
    CREATE USER m10l_dictionary IDENTIFIED BY 'm10l_dictionary_password';
    GRANT ALL ON m10l_dictionary.* TO m10l_dictionary_user;
    CREATE DATABASE m10l_dictionary DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
    ```
##