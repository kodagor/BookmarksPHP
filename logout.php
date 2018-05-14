<?php

  // unclude file with functions
  require_once('functions_cards.php');
  session_start();
  @$old_user = $_SESSION['correct_user'];

  // check if login was happen
  unset($_SESSION['correct_user']);
  $result_boom = session_destroy();

  // start html
  create_header_html('Logout');

  if (!empty($old_user)) {
    if ($result_boom) {
      // if user logged and and not logout
      echo 'Logout succesfully!<br>';
      create_html_url('login.php', 'Login');
    } else {
      // user logged in and logout could not happen
      echo 'Logout impossible!<br>';
    }
  } else {
    // if not logged int , but somehow user had access
    echo 'User not logged in, so logout cannot happen<br>';
    create_html_url('login.php', 'Login');
  }

  create_footer();

?>
