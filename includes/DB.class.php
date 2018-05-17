<?php
//Definimos los datos de conexión a la DB
//Modificamos nuestros datos de conexión AQUI
define('DB_HOST', 'localhost');     //Dirección del servidor
define('DB_NAME', 'alumnos');       //Base de datos
define('DB_USER', 'dwes');          //Usuario
define('USER_PW', 'dwes');          //Contraseña

class DB {
    private static $instancia;
    private $con;
    
    /**
     * Constructor de la clase con los datos de conexión a la base de datos
     */
    private function __construct(){
        try {
            $this->con = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, USER_PW);
            $this->con->exec("set names utf8");
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) { //Se capturan los mensajes de error
            exit("<p>No se ha conectado a la DB. " . $e->getMessage() . "</p>");
            die();
        }
    }
    
    /**
     * Método estático que devuelve la conexión a la base de datos. En caso de
     * no haberse realizado la conexión se instancia el constructor a si mismo.
     * 
     * En el caso de haber sido ya instanciada devuelve el valor de la instancia
     * 
     * @return Objeto
     */
    private static function conexion(){
        if(!isset(self::$instancia)){
            self::$instancia = new DB;
        }
        return self::$instancia;
    }
   
    /**
     * Método que devuelve una consulta preparada
     * 
     * @param  string $sql
     * @return consulta
     */
    private static function prepare($sql){
        return self::$instancia->con->prepare($sql);
    }
    
    /**
     * Metodo que devuelve los datos de un usuario por su DNI
     * 
     * @param  string $dod (DNI del usuario)
     * @return array
     */
    public static function getData($doc){
        //Realizamos la conexión
        self::conexion();
        //Realizamos la consulta preparada
        $sql = 'SELECT * FROM alumnos WHERE DNI= ?';
        //Llamamos a la preparacion de la consulta a la funcion correspondiente
        $resultado = self::prepare($sql);
        //Introducimos los correspondientes parametros de la consulta
        $resultado->bindParam(1,$doc);
        //Ejecutamos la consulta
        $resultado->execute();
        //Flag de control de usuario. Valor devuelto si no aparecen resultados.
        $usuario = false;
        
        //Si existe un resultado
        if ($resultado->rowCount() == 1){
            //Guardamos los resultados para devolver
            $usuario = $resultado->fetch();
        }
        return $usuario;
    }
    
    /**
     * Método que evita que por seguridad el objeto sea clonado
     */
    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}