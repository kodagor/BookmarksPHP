<?php

  require_once('functions_cards.php');
  session_start();

  // create short variable names
  @$delete_me = $_POST['delete_me'];
  $correct_user = $_SESSION['correct_user'];

  create_header_html('Deleting bookmarks');
  check_correct_user();
  show_user_menu();
  if (!filled($_POST)) {
    echo '<p>No bookmarks has been chosen to delete. Please try again.</p>';
    create_footer();
    exit;
  } else {
    if (count($delete_me) > 0) {
      foreach ($delete_me as $url) {
        if (delete_cards($correct_user, $url)) {
          echo 'Deleted '.htmlspecialchars($url).'<br>';
        } else {
          echo 'Cannot delete '.htmlspecialchars($url).'<br>';
        }
      }
    } else {
      echo 'No bookmarks has been chosen to delete.';
    }
  }

  // reading user url
  if ($array_url = load_user_urls($correct_user)) {
    show_user_urls($array_url);
  }

  create_footer();

?>
