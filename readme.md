# Take a Quiz

### Installation

Quick Note: If this is a new project, make sure to install the default user authentication provided with Laravel. `php artisan make:auth`

1.  Download or Clone the git repository


2.  You'll need to install the dependencies in composer.json by running

    ```
    composer install
    ```

3. You need to rename the .env.example to .env, and set the environment variables. To generate the APP_KEY, run 

    ```
    php artisan key:generate
    ```

4. In the boot method of your AppServiceProvider class, add

    ```
    Schema::defaultStringLength(191);
    ```

5. Run Your migrations:

    ```
    php artisan migrate
    ```

    Quick tip: Make sure that you've created a database and added your database credentials in your `.env` file.

6. Lastly, run the seed files to seed your database with a little data:

    ```
    php artisan db:seed
    ```

7. To start the application, run

    ```
    php artisan serve
    ```

Now, visit http://127.0.0.1:8000 and you should see the IntelligentQuiz App in front of you!

You can check out the demo
[TakeAQuiz](http://takeaquiz.herokuapp.com).

P.S: For the demo, any email can be selected from the landing page for a "test login". The password is **password**