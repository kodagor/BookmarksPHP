<?php

  require_once('functions_cards.php');
  session_start();
  create_header_html('Change password');
  show_user_menu();

  // create short variables
  $old_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];
  $new_pass2 = $_POST['new_pass2'];

  try {
    check_correct_user();
    if (!filled($_POST)) {
      throw new Exception('Form is not fullfilled. Please try again later.');
    }
    if ($new_pass != $new_pass2) {
      throw new Exception('Entered passwords ar not the same. Please try again.');
    }
    if (strlen($new_pass) > 16 || strlen($new_pass) < 6) {
      throw new Exception('New password must be between 6 and 16 characters.');
    }
    // trying to update password
    change_password($_SESSION['correct_user'], $old_pass, $new_pass);
    echo 'Password has been changed';
  }
  catch (Exception $e) {
    echo $e->getMessage();
  }
  create_footer();

?>
