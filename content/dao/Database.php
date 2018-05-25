<?php

class Database
{
    private static $pdoInstance = null;

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
    }

    public static function __callStatic($name, $args)
    {
        $callback = array(self::connect(), $name);
        return call_user_func_array($callback, $args);
    }

    public static function connect()
    {
        if (self:: $pdoInstance) {
            return self:: $pdoInstance;
        }

        $iniFile = "../config/config.ini";
        $databaseConfig = parse_ini_file($iniFile, true)["database"];

        $dsn = $databaseConfig ["db_driver"] . ":host=" . $databaseConfig ["db_host"] . "; dbname=" . $databaseConfig ["db_name"];

        self:: $pdoInstance = new PDO ($dsn, $databaseConfig ["db_user"], $databaseConfig ["db_password"]);
        self:: $pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self:: $pdoInstance;
    }

    public static function disconnect()
    {
        self::$pdoInstance = null;
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}