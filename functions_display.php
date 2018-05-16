<?php
      function create_header_html($title) {
        // displays html header
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title><?php echo $title; ?></title>
                <link rel="stylesheet" type="text/css" href="style.css">
            </head>
            <body>
                <section>
                    <div>
                        <img src="card.gif" alt="Logo CardPHP" height="55" withd="57" style="float: left; padding-right: 6px;">
                        <h1>BookmarksPHP</h1>
                    </div>
                    <hr>

    <?php

        if ($title) {
            create_title_html($title);
        }
    }

    function create_html_url($url, $name) {
      // creates urls
      ?>
          <p><a href="<?php echo $url; ?>"><?php echo $name; ?></a></p>
      <?php
    }

    function create_title_html($title) {
        // shows title
        ?>
            <h3> <?php echo $title; ?></h3>
        <?php
    }

    function create_footer() {
        // shows footer
        ?>
            </section>
            <footer>&copy; BookmarksPHP 2018 </footer>
            </body>
            </html>
        <?php
    }

    function show_site_info() {
        // shows info about site
        ?>
            <aside>
            <div  class="info">
                <ul>
                    <li>Store your <strong>bookmarks</strong> online!</li>
                    <li>See, what is using by others!</li>
                    <li>Share your favorites websites with others!</li>
                </ul>
            </div>
            </aside>
        <?php

    }

    function show_login_form() {
        // shows login form
        ?>
            <p>Not a member? <a href="register_form.php">Click here!</a></p>
            <form method="post" action="member.php">
                <div class="formblock">
                    <h2>Login</h2>
                    <p>
                        <label for="username">Username: </label><br>
                        <input type="text" id="username" name="username" size="16" maxlength="16" required>
                    </p>
                    <p>
                        <label for="pass">Password: </label><br>
                        <input type="password" id="pass" name="pass" size="16" maxlength="16" required>
                    </p>
                    <button type="submit">Login</button>
                    <p><a href="forget_form.php">Forgot your password?</a></p>
                </div>
            </form>
        <?php
    }

    function show_reg_form() {
        // shows register form
        ?>
            <p>Already a member? <a href="login.php">Click here!</a></p>
            <form method="post" action="new_register.php">
                <div class="formblock">
                    <h2>Register now!</h2>
                    <p>
                        <label for="email">E-mail address: </label><br>
                        <input type="email" id="email" name="email" size="30" maxlength="100" required>
                    </p>
                    <p>
                        <label for="username">Username<br>(max 16 characters): </label><br>
                        <input type="text" id="username" name="username" size="16" maxlength="16" required>
                    </p>
                    <p>
                        <label for="pass">Password<br>(Between 6 and 16 characters): </label><br>
                        <input type="password" id="pass" name="pass" size="16" maxlength="16" required>
                    </p>
                    <p>
                        <label for="pass2">Repeat password: </label>
                        <input type="password" id="pass2" name="pass2" size="16" maxlength="16" required>
                    </p>
                    <button type="submit">Submit</button>
                </div>
            </form>
        <?php
    }

    function show_password_form() {
      // show form for changing password
      ?>
        <form method="post" action="change_password.php">
            <div class="formblock">
                <h2>Change password</h2>
                <p>
                    <label for="old_pass">Old password: </label><br>
                    <input type="password" id="old_pass" name="old_pass" size="16" maxlength="16" required>
                </p>
                <p>
                    <label for="new_pass">New password: </label><br>
                    <input type="password" id="new_pass" name="new_pass" size="16" maxlength="16" required>
                </p>
                <p>
                    <label for="new_pass2">Repeat new password: </label><br>
                    <input type="password" id="new_pass2" name="new_pass2" size="16" maxlength="16" required>
                </p>
                <button type="submit">Change password</button>
            </div>
        </form>
      <?php
    }

    function forget_password() {
      // shows form for password recovery
      ?>
        <form method="post" action="forget_password.php">
            <div class="formblock">
                <h2>Password recovery</h2>
                <p>
                    <label for="username">Username: </label><br>
                    <input type="text" id="username" name="username" size="16" maxlength="16" required>
                </p>
                <button type="submit">Send new password</button>
            </div>
        </form>
      <?php
    }

    function show_user_urls($array_url) {
      // shows user's urls

      // setting a global var, for checking site
      global $cards_tab;
      $cards_tab = true;
      ?>
      <br>
        <p>
          <form name="cards_tab" method="post" action="delete_cards.php">
            <table width="500" cellpadding="2" cellspacing="0">
              <?php
                $color = '#cccccc';
                echo '<tr bgcolor="'.$color.'"><td><strong>Bookmark</strong></td>';
                echo '<td><strong>Delete?</strong></td></tr>';
                if ((is_array($array_url)) && (count($array_url > 0))) {
                  foreach($array_url as $url) {
                    if ($color == '#cccccc') {
                      $color = '#ffffff';
                    } else {
                      $color = '#cccccc';
                    }
                    // and showtime is here
                    echo '<tr bgcolor="'.$color.'"><td><a href="'.$url.'">'.htmlspecialchars($url).'</a></td>';
                    echo '<td><input type="checkbox" name="delete_me[]" value="'.$url.'"></td></tr>';
                  }
                } else {
                  echo '<tr><td>There are not saved bookmarks</td></tr>';
                }
              ?>
            </table>
          </form>
        </p>
      <?php
    }

    function show_user_menu() {
      // show user's menu options on site
      ?>
        <hr>
          <a href="member.php" class="menu">Main page</a>&nbsp;/&nbsp;
          <a href="add_card_form.php" class="menu">Add bookmark</a>&nbsp;/&nbsp;
      <?php
        // option 'delete' only visible, when bookmarks table appears
        global $cards_tab;
        if ($cards_tab == false) {

          echo "<a href=\"#\" onClick=\"cards_tab.submit();\">Delete bookmarks</a>&nbsp;/&nbsp;";
        } else {
          echo "<span style=\"color: #cccccc\">Delete bookmarks</span>&nbsp;/&nbsp;";
        }

      ?>
          <a href="change_password_form.php" class="menu">Change password</a>&nbsp;/&nbsp;
          <a href="logout.php" class="menu">Logout</a>
        <hr>
      <?php
    }

    function show_add_bookmarks_form() {
      // shows form for new bookmark
      ?>
        <form name="cards_tab" method="post" action="add_card.php">
          <div class="formblock">
            <h2>Add new bookmark: </h2>
            <p>
              <input type="text" name="new_url" id="new_url" size="40" maxlength="255" value="http://" required>
            </p>
            <button type="submit">Add</button>
          </div>
        </form>
      <?php
        }
?>
