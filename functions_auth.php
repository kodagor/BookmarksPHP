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

    function login($username, $pass) {
        // login users
        // check, if username and password are in database
        // if yes, returns true
        // else returns exception

        // database connection
        $dbConn = dbConnection();

        // check if user exists
        $result = $dbConn->query("SELECT * FROM users
            WHERE user_name='".$username."' and pass=sha1('".$pass."')");
        if (!$result) {
          throw new Exception('Login failed');
        }

        if ($result->num_rows > 0) {
          return true;
        } else {
          throw new Exception('Login failed');
        }
    }

  function check_correct_user() {
    // check if user is logged in and inform him, if not
    if (isset($_SESSION['correct_user'])) {
      echo "<h3>Logged as ".$_SESSION['correct_user']."</h3>";
    } else {
      // not logged in
      create_header_html('Error: ');
      echo "Login failed<br>";
      create_html_url('login.php', 'Login');
      create_footer();
      exit;
    }
  }

?>
