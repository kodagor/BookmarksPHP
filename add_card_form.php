<?php

  session_start();

  require_once('functions_cards.php');
  create_header_html('Add bookmarks');

  check_correct_user();

  show_user_menu();

  show_add_bookmarks_form();

  create_footer();

?>
