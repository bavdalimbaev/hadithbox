<?php

class Db
{
    public static function connect()
    {
        $conn = mysqli_connect("localhost", "root", "root", "hadithbox");
        $conn->set_charset("utf8");
        mysqli_set_charset($conn,"utf8");
        if (!$conn) die("Connection failed: " . mysqli_connect_error());
        return $conn;
    }

}


?>