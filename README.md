# BookmarksPHP

<h2 id="index">Files structure</h2>
<ul>
  <li><a href="#one">cards.sql</a></li>
  <li><a href="#two">functions_display.php</a></li>
  <li><a href="#three">functions_auth.php</a></li>
  <li><a href="#four">functions_cards.php</a></li>
  <li><a href="#five">functions_correct_data.php</a></li>
  <li><a href="#six">functions_db.php</a></li>
  <li><a href="#seven">login.php</a></li>
  <li><a href="#eight">member.php</a></li>
  <li><a href="#nine">new_register.php</a></li>
  <li><a href="#ten">register_form.php</a></li>
  <li><a href="#eleven">style.css</a></li
</ul>
<ul>
  <li>
    <dl>
      <dt id="one"><h3>cards.sql</h3></dt>
      <dd>file with queries for db creation</dd>
    </dl>
   </li>
   <hr>
   <li>
    <dl>
      <dt id="two"><h3>functions_display.php<a href="#index"> (index)</a></h3></dt>
      <dd>contains functions needed to create view</dd>
      <dl>
        <dt>create_header_html($title)</dt>
        <dd>creates header and head section in document</dd>
        <dt>create_html_url($url, $name)</dt>
        <dd>creates the a tag with dynamic url</dd>
        <dt>reate_title_html($title)</dt>
        <dd>creates h3 title in document</dd>
        <dt>create_footer()</dt>
        <dd>creates a footer</dd>
        <dt>show_site_info()</dt>
        <dd>creates aside section with the list of slogans</dd>
        <dt>show_login_form()</dt>
        <dd>creates login form</dd>
        <dt>show_reg_form()</dt>
        <dd>creates register form</dd>
      </dl>
    </dl>
   </li>
   <hr>
   <li>
    <dl>
      <dt id="three"><h3>functions_auth.php<a href="#index"> (index)</a></h3></dt>
      <dd>contains functions needed to authorization</dd>
      <dl>
        <dt>register($username, $email, $pass)</dt>
        <dd>register new user in database and returns true or false message</dd>
        <dt>login($username, $pass)</dt>
        <dd>login users; checks if user is in database; if is, returns true, else throws exception</dd>
        <dt>check_correct_user()</dt>
        <dd>checks if user is logged in and inform him, if not<dd>
      </dl>
    </dl>
   </li>
   <hr>
   <li>
    <dl>
      <dt id="four"><h3>functions_cards.php<a href="#index"> (index)</a><h3></dt>
      <dd>this file includes other files and can be attached in other files</dd>
      <dl>
        <dt>files icluded: <dt>
        <dd><a href="#five">functions_correct_data.php</a></dd>
        <dd><a href="#six>functions_db.php</a></dd>
        <dd><a href="#three">functions_auth.php</a></dd>
        <dd><a href="#two">functions_display.php</a></dd>
        <dd>functions_url.php</dd>
      </dl>
     </dl
   </li>
   <hr>
   <li>
    <dl>
      <dt id="five"><h3>functions_correct_data.php<a href="#index"> (index)</a></h3></dt>
      <dd>contains functions checking inputs</dd>
      <dl>
        <dt>filled($form_var)</dt>
        <dd>checks if every variable has a value</dd>
        <dt>correct_email($email)</dt>
        <dd>uses regexp to check, if e-mail address is correct</dd>
      </dl>
    </dl>
   </li>
   <hr>
   <li>
    <dl>
      <dt id="six"><h3>functions_db.php<a href="#index"> (index)</a></h3></dt>
      <dd>functions related with database</dd>
      <dl>
        <dt>dbConnection()</dt>
        <dd>setting up connection with database</dd>
      </dl>
    </dl>
   </li>
   <hr>
   <li>
    <dl>
      <dt id="seven"><h3>login.php<a href="#index"> (index)</a></h3></dt>
      <dd>allows displaying login form; includes file <em><b><a href="#two">functions_cards.php</a></b></em> and uses his functions:</dd>
      <ul>
        <li>create_header_html('Login form')</li>
        <li>show_site_info();</li>
        <li>show_login_form();</li>
        <li>create_footer();</li>
      </ul>
    </dl>
   </li>
   <hr>
   <li>
    <dl>
      <dt id="eight"><h3>member.php<a href="#index"> (index)</a></h3></dt>
      <dd>creates the member site which can be displayed only by logged in users<br>
        includes file <em><b><a href="#four">functions_cards.php</a></b></em> and uses functions: </dd>
        <ul>
          <li>create_header_html(), create_html_url('login.php', 'Login') and create_footer() from <em><b><a href="#two">functions_display.php</a></b></em></li>
          <li>check_correct_user() from <em><b><a href="#three">functions_auth.php</a></b></em></li>
          <li>load_user_urls($_SESSION['correct_user'])) from <em><b><a href=""></a></b></em></li>
          <li>show_user_urls($array_url) from <em><b><a href=""></a></b></em></li>
          <li>show_user_menu() from <em><b><a href=""></a></b></em></li>
        </ul>
    </dl>
   </li>
   <hr>
   <li>
    <dl>
      <dt id="nine"><h3>new_register.php<a href="#index"> (index)</a></h3></dt>
      <dd>check inputs correctness and tries register new user<br>
        includes file <em><b><a href="#four">functions_cards.php</a></b></em> and uses functions: </dd>
        <ul>
          <li>filled($_POST) and correct_email($email) from <em><b><a href="#five">functions_correct_data.php</a></b></em></li>
          <li>register($username, $email, $pass) from <em><b><a href="#three">functions_auth.php</a></b></em></li>
          <li>and functions for creating view from <em><b><a href="#two">functions_display.php</a></b></em></li>
        </ul>
    </dl>
   </li>
   <hr>
   <li>
    <dl>
      <dt id="ten"><h3>register_form.php<a href="#index"> (index)</a></h3></dt>
      <dd>allows displaying register form; includes file <em><b><a href="#two">functions_cards.php</a></b></em> and uses his functions:</dd>
      <ul>
        <li>create_header_html('User registration')</li>
        <li>show_site_info();</li>
        <li>show_reg_form();</li>
        <li>create_footer();</li>
      </ul>
    </dl>
   </li>
   <hr>
      <li>
    <dl>
      <dt id="eleven"><h3>style.css<a href="#index"> (index)</a></h3></dt>
      <dd>The css file for make the app more friendly</dd>
     </dl>
   </li>
   
</ul>
