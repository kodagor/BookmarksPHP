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

  function change_password($username, $old_pass, $new_pass) {
    // changes password from old_pass to new_pass2
    // returns true or false

    // if old_pass is correct, changes it to new_pass and returns true
    // in other way, throws exception
    login($username, $old_pass);
    $dbConn = dbConnection();
    $result = $dbConn->query("UPDATE users SET pass = sha1('".$new_pass."')
      WHERE user_name = '".$username."'");
    if (!$result) {
      throw new Exception ('Changin password fault.');
    } else {
      return true;    // successful changing
    }
  }

  function setup_password($username) {
    // setting up a password as a random value
    // return new password or false, if failed

    // load random word
    $new_pass = load_random_password(6, 16);

    if ($new_pass == false) {
      // if error, create new default pass
      $new_pass = "changeMe";
    }

    // setting up new password in data base or returning false
    $dbConn = dbConnection();
    $result = $dbConn->query("UPDATE users SET pass = sha1('".$new_pass."')
      WHERE user_name = '".$username."'");

    if (!$result) {
      throw new Exception('Cannot create new password. Please try again later');  // pass not changed
    } else {
      return $new_pass;      // password changed
    }
  }

  function load_random_password($min, $max) {
    // create string with letters and nummbers, randomize it
    // and take string with length in range from $min to $max
    try {
      // string
      $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      // take string length
      $len = strlen($letters);
      // set number of iterations
      $range = rand($min, $max);
      // create new pass
      $new_pass = "";

      for ($i = 1; $i <= $range; $i++) {
        // take random letter and attach it to new password
        $new_pass .= $letters[(rand(1, $len)-1)];
        // if shit happen, be sure that pass length is maximum 16 and min 6
        if (strlen($new_pass) > 16) {
          break;
        }
      }

      return $new_pass;
    }
    catch (Exception $e) {
      return false;
    }
  }

  function inform_password($username, $pass) {
    // inform user about password change

    $dbConn = dbConnection();
    $result = $dbConn->query("SELECT email FROM users WHERE user_name = '".$username."'");

    if (!$result) {
      throw new Exception("Cannot find email address");
    } elseif ($result->num_rows == 0) {
      // username not in database
      throw new Exception("Cannot find email address");
    } else {
      // send email with password
      $row = $result->fetch_object();
      $email = $row->email;
      $from = "From: noreply@BookmarksPHP \r\n";
      $msg = "New password: $pass \r\n"
        ."Please change it immediatly. \r\n";

      if (mail($email, 'new password', $msg, $from)) {
        return true;
      } else {
        return new Exception("There was problem with sending email");
      }
    }
  }

?>
