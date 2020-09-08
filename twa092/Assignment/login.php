<!--
Authorship:
Name: James Guerra
Student ID: 19045229
Prac Time: Thursday 10am
-->
<!DOCTYPE html>
<?php
   header("Cache-Control: no-cache");
   header("Expires: -1");
   session_start();
  //The following code segment is from week10-examples/login.php file
  //Reference:
  //Davies, P. (2020).login.php
  $validateCreds = "";
  $errorMessage = "";
  if(isset($_REQUEST["submit-login"])) {
    if(empty($_POST["username"]) || empty($_POST["password"])) {
      $validateCreds = "Username or password required";
    }
    else {
      require_once('conn.php');
      $username = $dbConn->escape_string($_POST["username"]);
      $password = $dbConn->escape_string($_POST["password"]);
      $hashedPassword = hash('sha256', $password);
      $sql = "SELECT username, firstname, surname, password, category, member_id
      FROM membership
      WHERE username = '$username'
      AND password = '$hashedPassword' ";
      $results = $dbConn->query($sql)
        or die ('Problem with query' . $dbConn->connect_error);
      if($results->num_rows) {
        $member = $results->fetch_assoc();
        $_SESSION["member-fname"] = $dbConn->escape_string($member["firstname"]);
        $_SESSION["member-sname"] = $dbConn->escape_string($member["surname"]);
        $_SESSION["member-category"] = $dbConn->escape_string($member["category"]);
        $_SESSION["member-id"] = $dbConn->escape_string($member["member_id"]);
        header('Location: search.php');
      }
      else {
        $errorMessage = "Invalid Username or Password";
      }
    }
  }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script src="247-site.js"></script>
  </head>
  <body>
    <header>
      <nav>
        <a href="search.php"><div class="logo">
          <img src="images/247Logo.svg" width="200" height="170" alt="24/7 music logo">
        </div>
        </a>
        <span class="navigation-link"><a href="search.php">Search</a><a href="playlist.php">Playlist</a><a href="login.php">Login</a>
        </span>
      </nav>
    </header>

    <div id="login-container">
      <form id="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <p class="login-error-message" ><?php echo $errorMessage; ?> </p>
        <?php if(empty($_POST["username"]) || empty($_POST["password"])) { ?>
        <p class="login-error-message"><?php echo $validateCreds; ?> </p>
      <?php } ?>
        <label id="username-label" for="username">Username:</label>
        <input id="username" type="text" name="username">
        <label id="password-label" for="password">Password:</label>
        <input id="password" type="password" name="password">
        <input id="login-submit" type="submit" name="submit-login" value="login">
      </form>
    </div>
  </body>
</html>
<?php $dbConn->close();?>
