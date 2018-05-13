<?php

  // include file with functions
  require_once('functions_cards.php');
  session_start();

  // creating short variables
  if (!isset($_POST['username'])) {
    // if field is not identified -> SETTING UP a value
    $_POST['username'] = " ";
  }
  $username = $_POST['username'];

  if (!isset($_POST['pass'])) {
    // if field is not identified -> SETTING UP a value
    $_POST['pass'] = " ";
  }
  $pass = $_POST['pass'];

  if ($username && $pass) {
    // trying to login
    try {
      login($username, $pass);
      // if user in database -> set session id
      $_SESSION['correct_user'] = $username;
    } catch (Exception $e) {
      // login failed
      create_header_html('Error: ');
      echo '<p>Login failed!<br>You need to be logged in to see this site</p>';
      create_html_url('login.php', 'Login');
      create_footer();
      exit;
    }
    create_header_html('Main site');
    check_correct_user();
    // read user bookmarks
    if ($array_url = load_user_urls($_SESSION['correct_user'])) {
      show_user_urls($array_url);
    }
    // creating options menu
    show_user_menu();

    create_footer();
  }

?>
