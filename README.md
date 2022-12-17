

<h1>Comandos para proyecto laravel</h1>

<b>composer create-project laravel/laravel Laravel</b> ----> Crear proyecto laravel con el nombre Laravel

<b>php artisan server</b> -----> activar servidor laravel en el puerto 8000

<b>php artisan make:migrations students</b> ---> crea la migracion de la tabla students en la cual configuraremos la tabla


 <b> php artisan migrate</b> ---> relaiza las migraciones que no hayan sido realizadas

<b>php artisan make:controller studentControler</b> ---> Crea el controlador donde configuraremos las funciones 

<b>php artisan make:seeder studentSeeder</b> ---> Crea el seeder con el nombre studentSeeder donde configuraremos insercciones de datos si queremos utilizarla


<b>php artisan make:middleware Validateid</b> ---> Crea el middleware para que valide la id introducida 


<b>php artisan bd:seed --class=StudentSeeder</b> ---> ejecuta la clase StudentSeerder especificada que se encuentra en el StudenSeeder.php e inserta en la base de datos los datos que hayamos definido, no se puede ejecutar el mismo con datos a mano ya que si existen uniques dara errores, por lo que o creas que se ejecute random los que creen mediante funciones o se una factoria






