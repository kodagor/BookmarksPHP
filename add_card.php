<?php

  require_once('functions_cards.php');
  session_start();

  // short var name
  $new_url = $_POST['new_url'];

  create_header_html('Add bookmarks');

  try {
    check_correct_user();
    show_user_menu();
    if (!filled($_POST)) {
      throw new Exception('Cannot add empty bookmark ;]');
    }
    // check URL format
    if (strstr($new_url, 'http://') === false) {
      // add http:// at the begining of url
      $new_url = 'http://'.$new_url;
    }
    // check URL correctness
    if (!(@fopen($new_url, 'r'))) {
      throw new Exception('URL not correct!');
    }
    // trying to add bookmark
    add_card($new_url);
    echo "Bookmark has been added!<br>";

    // load users bookmarks
    if ($url_tab = load_user_urls($_SESSION['correct_user'])) {
      show_user_urls($url_tab);
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }

  create_footer();

?>
