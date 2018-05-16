<?php

  require_once('functions_db.php');

  function add_card($new_url) {
    // adding new bookmarks to database
    echo "<p>Trying to add ".htmlspecialchars($new_url)."...</p><br>";
    $correct_user = $_SESSION['correct_user'];

    $dbConn = dbConnection();

    // check if bookmark exists
    $result = $dbConn->query("SELECT * FROM overlaps
      WHERE user_name='".$correct_user."' AND url_card='".$new_url."'");
    if ($result && ($result->num_rows > 0)) {
      throw new Exception('This bookmark exists in databse');
    }

    // adding new bookmark
    if (!$dbConn->query("INSERT INTO overlaps VALUES ('".$correct_user."', '".$new_url."')")){
      throw new Exception('Adding new bookmark has fault.');
    }
    return true;
  }

  function load_user_urls($username) {
    // load from database all usser's urls

    $dbConn = dbConnection();

    $result = $dbConn->query("SELECT url_card FROM overlaps WHERE user_name='".$username."'");
    if (!$result) {
      return false;
    }
    // create urls table
    $array_url = array();
    for ($counter = 0; $row = $result->fetch_row(); ++$counter) {
      $array_url[$counter] = $row[0];
    }
    return $array_url;
  }

  function delete_cards($username, $url) {
    // removing url from database
    $dbConn = dbConnection();

    // del bookmark
    if (!$dbConn->query("DELETE FROM overlaps
      WHERE user_name='".$username."' AND url_card='".$url."'")){
        throw new Exception('Removing bookmark has failed.');
    }
    return true;
  }

?>
