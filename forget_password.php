<?php

  require_once('functions_cards.php');
  create_header_html('Setting up new password');

  // shrort variable
  $username = $_POST['username'];

  try {
    $pass = setup_password($username);
    inform_password($username, $pass);
    echo "New password has been sent to your E-mail address.";
  } catch (Exception $e) {
    echo "Password could not been set. Please try again later.";
  }
  create_html_url('login.php', 'Login');
  create_footer();

?>
