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
                        <input type="text" id="username" name="username">
                    </p>
                    <p>
                        <label for="pass">Password: </label><br>
                        <input type="password" id="pass" name="pass">
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

    function show_user_menu() {
      // show user's menu options on site
      ?>
        <hr>
        <a href="logout.php" class="menu">Logout</a>
        <a href="change_password_form.php" class="menu">Change password</a>
        <hr>
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
                <button type="submit">Login</button>
            </div>
        </form>
      <?php
    }

?>
