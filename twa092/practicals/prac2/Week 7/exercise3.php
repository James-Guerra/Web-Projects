<!--
  Name: James Guerra
  Student ID: 19045229
  Prac Class: Thursday 10am
-->
<?php
//if submit buttom is set initialise each variable
  if(isset($_REQUEST["submit"])) {
    $fname = htmlspecialchars($_POST["firstname"]);
    $email = htmlspecialchars($_POST["email"]);
    $address = htmlspecialchars($_POST["postaddr"]);
    if(empty($_POST["emaillist"])) {
      $mailingList = "No";
    }
    else {
      $mailingList = htmlspecialchars($_POST["emaillist"]);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Week 7 Exercise 3 Form</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h1>Week 7 Exercise 3 PHP form demo</h1>
    <form id="userinfo" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <p>Please fill in the following form. All fields are mandatory.</p>

      <p>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="firstname">
      </p>

      <p>
        <label for="email">Email Address:</label>
        <input type="text" id="email" name="email">
      </p>

      <p>
        <label for="addr">Postal Address:</label>
        <textarea rows="5" cols="300" id="addr" name="postaddr"></textarea>
      </p>

      <p>
        <label for="sport">Favourite sport: </label>
        <select id="sport" name="favsport[]" size="4" multiple>
            <option value="soccer">Soccer</option>
            <option value="cricket">Cricket</option>
            <option value="squash">Squash</option>
            <option value="golf">Golf</option>
            <option value="tennis">Tennis</option>
            <option value="basketball">Basketball</option>
            <option value="baseball">Baseball</option>
        </select>
      </p>

      <p>
        <label for="list">Add me to the mailing list</label>
        <input type="checkbox" id="list" name="emaillist" value="Yes">
      </p>

      <p><input type="submit" value="submit" name="submit"></p>
    </form>

    <section id="output">
      <?php
        if(isset($_REQUEST["submit"])) {
           echo "<h2>The following information was received from the form:</h2>";
           echo "<p><strong>First Name = </strong>" . "$fname" . "</p>";
           echo "<p><strong>Email = </strong>" . "$email" . "</p>";
           echo "<p><strong>Postal Address = </strong>" . "$address" . "</p>";
           echo "<p><strong>Favourite Sports = </strong></p>";
           if(empty($_POST["favsport"])) {
             echo $multiSport = "N/A";
           }
           else {
             foreach($_POST["favsport"] as $multiSport) {
               echo "<p>$multiSport</p>";
             }
           }
           echo "<p><strong>Subscribed = </strong>" . "$mailingList" . "</p>";
        }
      ?>
    </section>
  </body>
</html>
