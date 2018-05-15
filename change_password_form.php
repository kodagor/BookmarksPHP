<?php

  require_once('functions_cards.php');

  session_start();
  create_header_html('Change password');

  // check if user is correct
  check_correct_user();

  // show menu
  show_user_menu();

  // show form for changing passwords
  show_password_form();

// show footer
  create_footer();


?>
