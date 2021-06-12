<?
    $host = "localhost";
    $port = 3306;
    $user = "root";
    $pass = "";
    $name = "db_ip";

    $db = new mysqli($host, $user, $pass, $name);

    function GetLastId() {
        global $db;

        return $db->insert_id;
    }
