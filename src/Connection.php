<?php
//patron de diseño singleton
class Connection
{

    Private static $instance = [];

    protected function __construct( ){ }

    protected function __clone( ){ }

    public function __wakeup( )
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    private static function getInstance(){
        if (self::$instance == null){
            $className = __CLASS__;
            self::$instance = new $className;
        }

        return self::$instance;
    }

    private static function openConn()
    {
        $db = self::getInstance();
        $dbConfig = include_once('Config.inc.php');
        $db = new PDO('pgsql:dbname='.$dbConfig['dbName'].';host='.$dbConfig['dbHost'].';port='.$dbConfig['dbPort'].'',$dbConfig['dbUser'],$dbConfig['dbPassword']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function getConn(){
        try{
            $db = self::openConn();
            return $db;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

