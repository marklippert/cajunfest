<?php
$PageTitle = "RSVP";
include "header.php";

include "inc/dbconfig.php";

// Settings for randomizing the field names
$ip = $_SERVER['REMOTE_ADDR'];
$timestamp = time();
$salt = "Cthulhu";

if (isset($_POST['submit'])) {
  // Is name and email address filled?
  if ($_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "" && $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] != "") {
    // If so, check to see if they already exist in database
    $result = $mysqli->query("SELECT * FROM rsvp WHERE name = '" . $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "' AND email = '" . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "'");
    
    if ($result->num_rows > 0) {
      // They exist, so let's update the entry
      $mysqli->query("UPDATE rsvp SET
                  adults = '" . $_POST[md5('adults' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                  children = '" . $_POST[md5('children' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                  bringing = '" . $_POST[md5('bringing' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "'
                  WHERE
                  name = '" . $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "'
                  AND
                  email = '" . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "'");
    } else {
      // They do NOT exist, so let's add them
      // ...as long as they're not spambots
      if ($_POST[md5('adults' . $_POST['ip'] . $salt . $_POST['timestamp'])] > 0 && $_POST['confirmationCAP'] == "") {
  			$mysqli->query("INSERT INTO rsvp (
                    name,
                    email,
                    adults,
                    children,
                    bringing
                    ) VALUES (
                    '" . $_POST[md5('name' . $_POST['ip'] . $salt . $_POST['timestamp'])] ."',
                    '" . $_POST[md5('email' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                    '" . $_POST[md5('adults' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                    '" . $_POST[md5('children' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "',
                    '" . $_POST[md5('bringing' . $_POST['ip'] . $salt . $_POST['timestamp'])] . "'
                    )");
  		}
  	}
  }
}
?>

<h1>RSVP</h1>

<h2>Here's what other folks are bringing</h2>
<table cellpadding="0" cellspacing="0" border="0" id="rsvp">
  <tr>
    <td style="width: 29%; padding-right: 2%;"><strong>Name</strong></td>
    <td style="width: 4%; padding-right: 2%;"><strong>Adults</strong></td>
    <td style="width: 4%; padding-right: 2%;"><strong>Children</strong></td>
    <td style="width: 57%;"><strong>Bringing</strong></td>
  </tr>
  
  <?php
  $bg = " style=\"background: #edf4f4;\"";
  
  $result = $mysqli->query("SELECT * FROM rsvp ORDER BY name ASC");
  
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
      ?>
      <tr<?php echo $bg; ?>>
        <td valign="top" style="padding: 0.2em 1%;"><?php echo $row['name']; ?></td>
        <td valign="top" style="padding: 0.2em 2% 0.2em 0; text-align: center;"><?php echo ($row['adults'] != "") ? $row['adults'] : "0"; ?></td>
        <td valign="top" style="padding: 0.2em 2% 0.2em 0; text-align: center;"><?php echo ($row['children'] != "") ? $row['children'] : "0"; ?></td>
        <td valign="top" style="padding: 0.2em 1% 0.2em 0;"><?php echo $row['bringing']; ?></td>
      </tr>
      <?php
      $bg = ($bg == "") ? " style=\"background: #edf4f4;\"" : "";
    }
  }
  
  // Get the totals
  $adults = $mysqli->query("SELECT SUM(adults) AS adulttotal FROM rsvp");
  $adult = $adults->fetch_array(MYSQLI_BOTH);
  
  $children = $mysqli->query("SELECT SUM(children) AS childrentotal FROM rsvp");
  $child = $children->fetch_array(MYSQLI_BOTH);

  $result->free(); 
  $adults->free(); 
  $children->free(); 
  ?>
  
  <tr>
    <td style="text-align: right;"><strong>Totals</strong></td>
    <td style="text-align: center; padding-right: 2%;"><strong><?php echo $adult[adulttotal]; ?></strong></td>
    <td style="text-align: center; padding-right: 2%;"><strong><?php echo $child[childrentotal]; ?></strong></td>
    <td>&nbsp;</td>
  </tr>
</table><br>
<br>

<br>

<h2>RSVP</h2>
<form action="rsvp.php" method="POST" id="rsvp-form">
  <div>
    <label for="name" class="float-label">Your name?</label>
    <input type="text" name="<?php echo md5("name" . $ip . $salt . $timestamp); ?>" id="name" class="float-input"><br>
    <br>
    
    <label for="email" class="float-label">Your email?</label>
    <input type="text" name="<?php echo md5("email" . $ip . $salt . $timestamp); ?>" id="email" class="float-input"><br>
    <br>
    
    <div class="left">
      <label for="adults">How many adults?</label>
      <input type="text" name="<?php echo md5("adults" . $ip . $salt . $timestamp); ?>" id="adults" style="width: 2em; margin-left: 0.5em;">
    </div>
    
    <div class="right">
      <label for="children">How many children?</label>
      <input type="text" name="<?php echo md5("children" . $ip . $salt . $timestamp); ?>" id="children" style="width: 2em; margin-left: 0.5em;">
    </div>
    
    <div style="clear: both;"></div>
    
    <label for="what">What will you bring?</label><br>
    <textarea name="<?php echo md5("bringing" . $ip . $salt . $timestamp); ?>" id="what" style="width: 99%; height: 5em;"></textarea><br>
    <br>
    
    <input type="text" name="confirmationCAP" style="display: none;"> <?php // Non-displaying field as a sort of invisible CAPTCHA. ?>
    
    <input type="hidden" name="ip" value="<?php echo $ip; ?>">
    <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">
    
    <input type="submit" name="submit" value="That's it for now" style="display: block; margin: 0 auto;">
  </div>
</form><br>
<br>

Note: you can update your RSVP just by specifying the same name and your email address (which won't be shown).  Likewise, if you can't come, just change the number of adults to 0.  AND if you'd like to change anything else in your RSVP, just put in your name and email address &mdash; everything else will be changed to whatever you say.

<?php
$mysqli->close();

include "footer.php";
?>