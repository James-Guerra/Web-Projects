<!--
Authorship:
Name: James Guerra
Student ID: 19045229
Prac Time: Thursday 10am
-->

<!-- all svg files were created using svg-edit from
https://svg-edit.github.io/svgedit/editor/svg-editor.html -->

<?php
  header("Cache-Control: no-cache");
  header("Expires: -1");
  session_start();
  require_once('conn.php');
  if(isset($_SESSION["member-fname"]) && isset($_SESSION["member-sname"]) && isset($_SESSION["member-category"]) &&isset($_SESSION["member-id"])) {
    $loggedIn;
    $firstname = $_SESSION["member-fname"];
    $surname = $_SESSION["member-sname"];
    $category = $_SESSION["member-category"];
    $memberId = $_SESSION["member-id"];
    $loggedIn = true;
  }
  else {
    $loggedIn = false;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Playlist Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script src="247-site.js"></script>
  </head>
  <body>
    <div id="playlist-form-container" onclick="giveFocus();">
      <p class="close-button" id="1" onclick="hidePopUp(this);">x</p>
      <?php
      $errorMessage = "";
      $playlistName = "";
      if(isset($_GET["submit"])) {
        if(empty($playlistName) || isset($_GET["submit"])) {
          $playlistName = htmlspecialchars($_GET["playlist-name"]);
          if (!preg_match("/^[0-9 A-Za-z]*$/" , $playlistName) || empty($playlistName)) {
            $errorMessage =  "Invalid Playlist Name - Numbers and Letters only";
          }
        }
      }
      ?>
      <form class="playlist-form" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php
          if(isset($_REQUEST["submit"]) || empty($playlistName)) { ?>
              <span><?php echo $errorMessage; ?></span>
      <?php } ?>
        <label for="playlist-form">Enter Playlist Name:</label>
        <input id="playlist-input" type="text" name="playlist-name">
        <input type="hidden" name="create-playlist" value="">
        <input type="submit" style="display: none;" name="submit"></input>
      </form>
    </div>

    <?php if(isset($_GET["submit"]) && preg_match("/^[0-9 A-Za-z]*$/", $playlistName) && !empty($playlistName)) {
      $sql1 = "INSERT INTO memberplaylist (member_id, playlist_name)
      VALUES ('$memberId', '$playlistName')";
      if ($dbConn->connect_error) {
        die("Connection failed: " . $dbConn->connect_error);
      }
      if($dbConn->query($sql1)) { ?>
        <div id="successful-submission-pop-up">
          <img src="images/successful-icon.svg" alt="Successful icon">
          <p>Playlist was created successfully</p>
        </div>
      <?php
      }
  }?>
    <header>
      <nav>
        <?php if(isset($firstname) && isset($surname) && isset($category)) { ?>
          <span class="profile-container">
            <p class="profile-text"><?php echo "Welcome back " . $firstname . " " . $surname . " - " . $category . " membership"?></p>
          </span>
        <?php } ?>
        <a href="search.php"><div class="logo">
          <img src="images/247Logo.svg" width="200" height="170" alt="24/7 music logo">
        </div>
        </a>
        <?php if($loggedIn == true && htmlspecialchars($_GET["create-playlist"]) == "true") {
            echo "<script>window.onload = function() {
              document.getElementsByClassName('drop-down')[0].style.right = '100px';
              showPopUp(document.getElementById('new-playlist'));
            }</script>";
        }
        else {
          echo "<script>window.onload = function() {
            document.getElementsByClassName('drop-down')[0].style.right = '100px';
            }</script>";
        }?>
        <span class="navigation-link"><a href="search.php">Search</a><a href="playlist.php?create-playlist=" id="drop-down-trigger">Playlist</a><a href="playlist.php?create-playlist=true" class="drop-down">Create</a>
          <a href="<?php if($loggedIn == true) {echo "logoff.php";} if($loggedIn == false) {echo "login.php";}?>">
        <!-- login/logoff anchor tag continued code...--><?php if($loggedIn == true) {echo "Log Off";} if($loggedIn == false) {echo "Login";}?></a>
        </span>
      </nav>
    </header>
    <main>
      <?php if($loggedIn == true) {?>
        <?php
          $sql = "SELECT DISTINCT playlist_name, playlist_id
          FROM memberplaylist
          INNER JOIN membership
          ON memberplaylist.member_id = membership.member_id
          WHERE membership.firstname = '$firstname' ";
          $results = $dbConn->query($sql)
             or die ('Problem with query' . $dbConn->connect_error);
         ?>

         <table class="song-table" style="border: none; width: 85%;">
           <tr>
             <th style="font-size: 170%;">Playlists</th>
           </tr>
           <tr>
             <td id="new-playlist" onclick="showPopUp(this)"><b>Create A Playlist<b></td>
           </tr>
           <tr>
             <td>or</td>
           </tr>
           <tr>
             <td><b><i>Click a playlist to open</i></b></td>
           </tr>
         <?php while ($row = $results->fetch_assoc()) { ?>
             <tr>
               <td><a href="play.php?playlist-id=<?php echo $row["playlist_id"];?>"><?php echo $row["playlist_name"];?></a></td>
             </tr>
         <?php } ?>
       </table>
     <?php }
     else {
       $_SESSION["redirect"] = "true";
       header('Location: search.php');
     } ?>
    </main>
    <div class="maintain-overlay">
    </div>
    <?php
    if(isset($_GET["submit"]) && !preg_match("/^[0-9 A-Za-z]*$/" , $playlistName)) {
      echo
      "<script>
        document.getElementsByClassName('maintain-overlay')[0].style.visibility = 'visible';
        document.getElementById('playlist-form-container').style.display = 'block';
      </script>";
    }
    ?>
    <?php
    if(empty($sql1)) {
    }
    else {
      echo
      "<script>
        window.onload = function() {fadeOut()}
      </script>";
      }
    ?>
  </body>
</html>
