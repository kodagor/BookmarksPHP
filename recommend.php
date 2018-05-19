<?php

  session_start();
  require_once('functions_cards.php');

  create_header_html('Recomment url');
  try {
    check_correct_user();
    show_user_menu();
    $urls = recommend_urls($_SESSION['correct_user']);
    show_recommend_urls($urls);
  }
  catch (Exception $e) {
    $e->getMessage();
  }
  create_footer();

?>
