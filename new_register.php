<?php

    // attach file with functions
    require_once('functions_cards.php');

    // short variables names
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    // starting session
    // session must be started before sending headers

    session_start();

    try {
        // checking fields correctness
        if (!filled($_POST)) {
            throw new Exception('Form has been filled incorrectly.
                Please <a href="register_form.php">return</a> and try again.');
        }
        // wrong e-mail address
        if (!correct_email($email)) {
            throw new Exception('Wrong email address.
                Please <a href="register_form.php">return</a> and try again.');
        }
        // passwords does not match
        if ($pass != $pass2) {
            throw new Exception('Passwords are not the same.
                Please <a href="register_form.php">return</a> and try again.');
        }
        // checking password length
        if (strlen($pass) < 6 || strlen($pass) > 16) {
            throw new Exception('Password should hava at least 6 and maximum 16 characters.
                Please <a href="register_form.php">return</a> and try again.');
        }
        // trying to register
        register($username, $email, $pass);
        // register session
        $_SESSION['current_user'] = $username;
        // creating anchor to members site
        create_header_html('Registration successful');
        echo "<h3>You can go to members site and menage your bookmarks!</h3>";
        create_html_url('member.php', 'Members site');

        // end site
        create_footer();
        } catch(Exception $e) {
            create_header_html('Error: ');
            echo $e->getMessage();
            create_footer();
            exit;
    }

?>
