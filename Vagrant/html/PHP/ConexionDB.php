<?php
//Se define el nombre del servidor
if (!defined('DATABASE')) define('DATABASE',   'GExpensesBBDD');
//Se define el usuario 
if (!defined('BD_USUARIO')) define('BD_USUARIO',   'gexpensesuser');
//Se define la contraseña del usuario para conectar a la base de datos
if (!defined('BD_CLAVE')) define('BD_CLAVE',   '1234');
//Se define la ubicación del servidor de la base de datos "mysql:host=172.16.0.10", 
//el nombre "dbname=' . DATABASE ." y la codificación de caracteres "charset=utf8"
if (!defined('SERVER_MYSQL')) define('SERVER_MYSQL',   'mysql:host=172.16.0.10;dbname=' . DATABASE . ';charset=utf8');

// Se crea una instancia de la clase PDO, que representa una conexión a una base de datos.
// El constructor de la clase recibe tres parámetros: el DSN (Data Source Name), el usuario y la contraseña.
// El DSN se construye a partir de la constante SERVER_MYSQL, que contiene la información necesaria para conectar
// al servidor MySQL y seleccionar la base de datos especificada en la constante DATABASE.
try {
        $conexion = new PDO(SERVER_MYSQL, BD_USUARIO, BD_CLAVE);
} catch (Exception $e) {
//En caso de error al conectar a la base de datos, muestra un mensaje de error.
        echo 'Error conectando a la BBDD. ' . $e->getMessage();
}