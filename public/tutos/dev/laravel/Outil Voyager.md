# Laravel : 

```bash
composer require tcg/voyager
php artisan voyager:install --with-dummy

```




email: admin@admin.com
password: password

https://github.com/the-control-group/voyager


If you did not go with the dummy user, you may wish to assign admin privileges to an existing user. This can easily be done by running this command:

php artisan voyager:admin your@email.com

If you did not install the dummy data and you wish to create a new admin user you can pass the --create flag, like so:

php artisan voyager:admin your@email.com --create

And you will be prompted for the user's name and password.



https://stackoverflow.com/questions/48743770/how-to-create-custom-controller-in-laravel-voyager
