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
  if(isset($_SESSION["member-fname"]) && isset($_SESSION["member-sname"]) && isset($_SESSION["member-category"])) {
    $loggedIn;
    $firstname = $_SESSION["member-fname"];
    $surname = $_SESSION["member-sname"];
    $category = $_SESSION["member-category"];
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
    <title>Search Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script src="247-site.js"></script>
  </head>
  <body>
    <script>
      window.onscroll = function() {scrollFunction()};
    </script>
    <?php
      if($loggedIn == false && isset($_SESSION["redirect"])) {
        echo "<script>window.onload = function() {showPopUp(document.getElementById('playlist-redirection-message'))}</script>";
        unset($_SESSION["redirect"]);
      }
    ?>
    <div id="playlist-redirection-message">
      <p class="close-button" id="3" onclick="hidePopUp(this)">x</p>
      <div class="message">Must be logged in to access playlists</div>
      <a id="direct-to-login" href="login.php">Login Page</a>
    </div>
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

        <!-- When user is logged in, the drop down shifts slightly -->
        <?php if($loggedIn == true) {
            echo "<script>window.onload = function() {document.getElementsByClassName('drop-down')[0].style.right = '100px';}</script>";
        }?>

        <span class="navigation-link"><a href="search.php">Search</a><a href="playlist.php?create-playlist=" id="drop-down-trigger">Playlist</a><a href="playlist.php?create-playlist=true" class="drop-down">Create</a><a href="<?php if($loggedIn == true) {echo "logoff.php";} if($loggedIn == false) {echo "login.php";}?>">
        <!-- login/logoff anchor tag continued code...--><?php if($loggedIn == true) {echo "Log Off";} if($loggedIn == false) {echo "Login";}?></a>
        </span>
      </nav>
    </header>


    <main>
      <!-- Search bar:
           - postback form
           - allows all characters
           - displays error message if empty through JS
      -->
      <p id="error-message">This field is required</p>
      <div id="search-bar-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
          <div id="inner-search-bar-container">
            <input id="search-input" type="text" placeholder="Song title, Artist or Album" name="search-input">
            <input id="submit-search" type="image" src="images/search-icon.svg" width="23" height="23" name="submit" onclick="return validate();"></button>
          </div>
        </form>
      </div>

      <!-- The following code segment was modified from -->
      <!-- https://davidwalsh.name/php-form-submission-recognize-image-input-buttons -->
      <?php if(isset($_GET['submit_x'])) { ?>
        <!-- End of code segment from https://davidwalsh.name/php-form-submission-recognize-image-input-buttons -->
        <?php
          require_once('conn.php');
          $input = $dbConn->escape_string($_GET['search-input']);
          $sql = "SELECT *, count(*) AS matches
          FROM album
          INNER JOIN track
          ON album.album_id = track.album_id
          INNER JOIN artist
          ON album.artist_id = artist.artist_id
          WHERE album_name LIKE '%$input%'
          OR artist_name LIKE '%$input%'
          OR track_title LIKE '%$input%'
          GROUP BY track_id";
          $results = $dbConn->query($sql)
             or die ('Problem with query' . $dbConn->connect_error);
         ?>

         <!-- the following code segment was modified from
       https://stackoverflow.com/questions/5433387/counting-the-number-of-records-that-match-a-certain-criteria-and-displaying-th -->
         <?php if($results->num_rows) {
            $list_matches = array();
            while ($row = $results->fetch_assoc()) {
                $list_matches[$row['track_id']] = $row['matches'];
            }
            echo "<h1>" . count($list_matches) . " matches for '" . $input . "':</h1>"?>
            <!-- end of code segment from
          https://stackoverflow.com/questions/5433387/counting-the-number-of-records-that-match-a-certain-criteria-and-displaying-th -->
           <table class="selection-table">
             <tr>
               <th>Song</th>
               <th>Artist</th>
               <th>Album</th>
               <th>Cover Art</th>
             </tr>


             <?php
             /* the following code segment was sourced from
             https://www.w3schools.com/php/func_mysqli_data_seek.asp*/
             mysqli_data_seek($results, 0); //resets sql results to 0th row
             /* end of code segment from
             https://www.w3schools.com/php/func_mysqli_data_seek.asp*/
             while ($row = $results->fetch_assoc()) { ?>
                 <tr class="selection-table">
                   <td><a href="play.php?track-id=<?php echo $row["track_id"] ?>"><?php echo $row["track_title"]?></a></td>
                   <td>
                     <a href="play.php?artist-id=<?php echo $row["artist_id"] ?>">
                       <span><?php echo $row["artist_name"];?></span>
                     </a>
                   </td>
                   <td><a href="play.php?album-id=<?php echo $row["album_id"] ?>"><?php echo $row["album_name"]?></a></td>
                   <td><img src="/twa/thumbs/artists/<?php echo $row['thumbnail']?>" alt="<?php echo $row["artist_name"];?> Thumbnail"></td>
                 </tr>
             <?php } ?>
          <?php }
          else { ?>
            <div class="empty-box-icon-container">
              <img class="empty-box-icon" src="images/box-icon.svg" alt="empty box icon">
              <div class="empty-box-icon-text"><h1>NO MATCHES FOUND</h1></div>
            </div>
          <?php } ?>
        </table>
      <?php } ?>
    </main>
    <div class="scroll-to-top" onclick="backToTop();"><p>TOP</p></div>
    <div class="maintain-overlay">
    </div>
  </body>
</html>
