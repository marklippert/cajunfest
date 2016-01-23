<?php
include "login.php";
$PageTitle = "Edit RSVP Entry";
include "header.php";

include "../inc/dbconfig.php";
$result = $mysqli->query("SELECT * FROM rsvp WHERE id = '" . $_GET['id'] . "'");
$row = $result->fetch_array(MYSQLI_BOTH);
?>

<h1>Edit RSVP Entry</h1>

<form action="rsvp-db.php?a=edit" method="POST" id="rsvp-form">
  <div>
    <label for="name" class="float-label">Your name?</label>
    <input type="text" name="name" class="float-input" value="<?php echo $row['name']; ?>"><br>
    <br>
    
    <label for="email" class="float-label">Your email?</label>
    <input type="text" name="email" class="float-input" value="<?php echo $row['email']; ?>"><br>
    <br>
    
    <div class="left">
      <label for="adults">How many adults?</label>
      <input type="text" name="adults" style="width: 2em; margin-left: 0.5em;" value="<?php echo $row['adults']; ?>">
    </div>
    
    <div class="right">
      <label for="children">How many children?</label>
      <input type="text" name="children" style="width: 2em; margin-left: 0.5em;" value="<?php echo $row['children']; ?>">
    </div>
    
    <div style="clear: both;"></div>
    
    <label for="what">What will you bring?</label><br>
    <textarea name="bringing" style="width: 99%; height: 5em;"><?php echo $row['bringing']; ?></textarea><br>
    <br>
    
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="submit" name="submit" value="That's it for now" style="display: block; margin: 0 auto;">
  </div>
</form>

<?php
$result->free(); 
$mysqli->close();

include "footer.php";
?>