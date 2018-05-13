<?php

    function dbConnection() {
        // creating connection with db
        $result = new mysqli('localhost', 'user123', 'zaq1@WSX', 'cards');
        if (!$result) {
            throw new Exception('Database connection failed');
        } else {
            return $result;
        }
    }

?>