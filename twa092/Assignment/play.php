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
  if(isset($_SESSION["member-fname"]) && isset($_SESSION["member-sname"]) && isset($_SESSION["member-category"])) {
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
    <title>Play Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script src="247-site.js"></script>
  </head>
  <body>
    <?php
    if(isset($_GET['track-id'])) {
      $sql5 = "SELECT DISTINCT playlist_name, playlist_id
      FROM memberplaylist
      INNER JOIN membership
      ON memberplaylist.member_id = membership.member_id
      WHERE membership.firstname = '$firstname' ";
      $results5 = $dbConn->query($sql5)
         or die ('Problem with query' . $dbConn->connect_error);
    ?>

    <!-- FORM:
    PURPOSE Select a playlist to choose from to add a song -->
    <div id="playlist-selection-pop-up" style="display: none;">
      <p class="close-button" id="2" onclick="hidePopUp(this)">x</p>
      <div id="divide-submit-and-radio">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ;?>" method="get">
        <p><b>Choose a playlist</b></p>
        <?php while($row5 = $results5->fetch_assoc()) { ?>
        <span id="group-input">
          <label for="<?php echo $row5["playlist_id"];?>"><?php echo $row5["playlist_name"];?></label>
          <input id="<?php echo $row5["playlist_id"];?>" onclick="disable(this)" type="radio" name="playlist-id" value="<?php echo $row5["playlist_id"] ?>">
        </span>
      <?php } ?>
        <input type="hidden" name="track-id" value="<?php echo htmlspecialchars($_GET["track-id"]); ?>">
    </div>
        <input id="submit-choice" type="submit" value="confirm" name="submit-choice" disabled>
      </form>
    </div>
    <?php
    if(isset($_GET["submit-choice"])) {
      $playlistId = $dbConn->escape_string($_GET["playlist-id"]);
      $trackId = $dbConn->escape_string($_GET["track-id"]);
      $sql9 = "INSERT INTO playlist (playlist_id, track_id)
      VALUES ('$playlistId', '$trackId')";
      if($dbConn->query($sql9)) {
      }
    }
  } ?>
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
        <?php if($loggedIn == true) {
            echo "<script>window.onload = function() {document.getElementsByClassName('drop-down')[0].style.right = '100px';}</script>";
        }?>
        <span class="navigation-link"><a href="search.php">Search</a><a href="playlist.php?create-playlist=" id="drop-down-trigger">Playlist</a><a href="playlist.php?create-playlist=true" class="drop-down">Create</a>
          <a href="<?php if($loggedIn == true) {echo "logoff.php";} if($loggedIn == false) {echo "login.php";}?>">
        <!-- login/logoff anchor tag continued code...--><?php if($loggedIn == true) {echo "Log Off";} if($loggedIn == false) {echo "Login";}?></a>
        </span>
      </nav>
    </header>
    <main>
        <?php
          if(isset($_GET['artist-id'])) {
            $artist_id = $dbConn->escape_string($_GET['artist-id']);
            $sql = "SELECT DISTINCT *, artist.thumbnail AS artist_thumb
            FROM artist
            INNER JOIN album
            ON artist.artist_id = album.artist_id
            WHERE artist.artist_id = '$artist_id' ";
            $results = $dbConn->query($sql)
              or die ('Problem with query' . $dbConn->connect_error);
            $display = "artists";
          }

          if(isset($_GET['album-id'])) {
            $album_id = $dbConn->escape_string($_GET['album-id']);
            $sql_2 = "SELECT DISTINCT *, album.thumbnail AS album_thumb
            FROM track
            INNER JOIN album
            ON track.album_id = album.album_id
            INNER JOIN artist
            ON track.artist_id = artist.artist_id
            WHERE track.album_id = '$album_id' ";
            $results2 = $dbConn->query($sql_2)
              or die ('Problem with query' . $dbConn->connect_error);
            $display = "albums";
          }

          if(isset($_GET['track-id'])) {
            $track_id = $dbConn->escape_string($_GET['track-id']);
            $sql_3 = "SELECT DISTINCT *
            FROM track
            INNER JOIN album
            ON track.album_id = album.album_id
            WHERE track.track_id = '$track_id' ";
            $results3 = $dbConn->query($sql_3)
              or die ('Problem with query' . $dbConn->connect_error);
            $display = "song";
          }

          if(isset($_GET['playlist-id']) || isset($_GET["submit-choice"])) {
            if(isset($_GET["playlist-id"])) {
              $playlist_id = $dbConn->escape_string($_GET['playlist-id']);
            }
            $sql_4 = "SELECT DISTINCT *
            FROM playlist
            INNER JOIN memberplaylist
            ON playlist.playlist_id = memberplaylist.playlist_id
            INNER JOIN track
            ON playlist.track_id = track.track_id
            INNER JOIN artist
            ON track.artist_id = artist.artist_id
            WHERE playlist.playlist_id = '$playlist_id' ";
            $results4 = $dbConn->query($sql_4)
              or die ('Problem with query' . $dbConn->connect_error);
            $display = "playlist";
          }
         ?>

         <?php if($display == "artists") {
           $row = $results->fetch_assoc();?>
           <div class="heading-container">
             <img class="thumbnail" src="/twa/thumbs/artists/<?php echo $row["artist_thumb"];?>" alt="<?php echo $row["artist_name"];?> Thumbnail">
             <h1 class="heading-above">Albums</h1>
             <h1 class="heading-below"><?php echo $row["artist_name"]; ?></h1>
           </div>

           <table class="selection-table">
             <tr>
               <th>Cover Art</th>
               <th>Album Name</th>
               <th>Album Year</th>
             <tr>

           <?php
           mysqli_data_seek($results, 0); //reset results back to 0th row
           while ($row = $results->fetch_assoc()) { ?>
               <tr class="selection-table">
                 <td><img src="/twa/thumbs/albums/<?php echo $row["thumbnail"]; ?>" alt="<?php echo $row["album_name"]?> Album cover art"></td>
                 <td><a href="play.php?album-id=<?php echo $row["album_id"]?>"><?php echo $row["album_name"]?></a></td>
                 <td><?php echo $row["album_date"]?></td>
               </tr>
           <?php } ?>
           </table>
         <?php } ?>

           <!-- if input is album  -->
           <?php
           if($display == "albums") {
           $row_2 = $results2->fetch_assoc(); ?>
           <div class="heading-container">
             <img class="thumbnail" src="/twa/thumbs/albums/<?php echo $row_2["album_thumb"];?>" alt="<?php echo $row_2["album_name"];?> Thumbnail">
             <h1 class="heading-above"><?php echo $row_2["album_name"]; ?></h1>
             <h1 class="heading-below"><?php echo $row_2["artist_name"]; ?></h1>
           </div>


           <table class="selection-table">
             <tr>
               <th>Song Title</th>
               <th>Duration</th>
             </tr>

           <?php
           mysqli_data_seek($results2, 0);
           while ($row_2 = $results2->fetch_assoc()) { ?>
               <tr class="selection-table">
                 <td><a href="play.php?track-id=<?php echo $row_2["track_id"]?>"><?php echo $row_2["track_title"] ?></a></td>
                 <td><?php echo $row_2["track_length"] ?></td>
               </tr>
           <?php } ?>
           </table>
         <?php } ?>

         <?php if($display == "song") {
             $row_3 = $results3->fetch_assoc(); ?>
              <table class="song-table">
                <tr>
                 <th><?php echo $row_3["track_title"];?></th>
                </tr>
                <tr>
                  <td>Album: <?php echo $row_3["album_name"];?></td>
                </tr>
                <tr>
                  <td>Duration: <?php echo $row_3["track_length"];?></td>
                </tr>
                <tr>
                  <td><iframe src="https://open.spotify.com/embed/track/<?php echo $row_3["spotify_track"];?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted- media"></iframe></td>
                </tr>
                <tr>
                  <?php if($loggedIn) {?>
                    <td><a onclick="showPopUp(this);" id="add-to-playlist" style="cursor: pointer;"><span>Add song to playlist</span><img style="padding-left: 5px;" src="images/add-icon.svg" width="17" height="17" alt="add to playlist icon"></a></td>
                  <?php }
                  else {}
                  ?>
                </tr>
              </table>
          <?php
         } ?>

           <?php

           if($display == "playlist") {
             if($results4->num_rows) {
               $row_4 = $results4->fetch_assoc();
                 ?>
               <h1 class="playlist-heading" ><?php echo $row_4["playlist_name"] ?></h1>
               <p class="playlist-heading">playlists</p>

               <table class="selection-table">
                 <tr>
                   <th>Song Title</th>
                   <th>Artist Name</th>
                   <th>Duration</th>
                 </tr>

               <?php
               mysqli_data_seek($results4, 0);
               while ($row_4 = $results4->fetch_assoc()) { ?>
                   <tr class="selection-table">
                     <td><a href="play.php?track-id=<?php echo $row_4["track_id"]?>"><?php echo $row_4["track_title"] ?></a></td>
                     <td><?php echo $row_4["artist_name"] ?></td>
                     <td><?php echo $row_4["track_length"] ?></td>
                   </tr>
               <?php } ?>
               </table>
           <?php }
           else { ?>
             <p>Click<a href="search.php"> here </a>to add songs to playlist</p>
             <div class="empty-box-icon-container">
               <img class="empty-box-icon" src="images/box-icon.svg" alt="empty box icon">
               <div class="empty-box-icon-text"><h1>EMPTY PLAYLIST</h1></div>
             </div>
        <?php }
         } ?>
    </main>
    <div class="maintain-overlay">
    </div>
  </body>
</html>
