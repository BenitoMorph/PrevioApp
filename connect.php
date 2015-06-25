<?php
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_DATABASE', "previoapp");

class DB_CONNECT {
    
    private $db;
    
    function __construct() {
        $this->connect();
    }

    function __destruct() {
        $this->close();
    }

    function connect() {
        $con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());

        $db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());

        return $con;
    }

    function close() {
        mysql_close();
    }

}
?>