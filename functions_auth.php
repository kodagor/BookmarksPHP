<?php

    function register($username, $email, $pass) {
        // register new user in database
        // returns true or error message

        // connect with db
        $dbConn = dbConnection();

        // check if username exists
        $result = $dbConn->query("SELECT * FROM users WHERE user_name = '".$username."'");
        if (!$result) {
            throw new Exception('Database query failed.
                Please <a href="register_form.php">return</a> and try again.');
        }
        if ($result->num_rows > 0) {
            throw new Exception('Entered username exists in database. Try another one
                Please <a href="register_form.php">return</a> and try again.');
        }
        // if is ok, insert user into database
        $result = $dbConn->query("INSERT INTO users VALUES 
            ('".$username."', sha1('".$pass."'), '".$email."')");
        if (!$result) {
            throw new Exception('Register in database impossible. Please try again later.
                Please <a href="register_form.php">return</a> and try again.');
        }
        return true;
    }

?>