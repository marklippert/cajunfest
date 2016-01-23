<?php
include "login.php";
$PageTitle = "RSVP";
include "header.php";

include "../inc/dbconfig.php";
?>

<a href="rsvp-db.php?a=deleteall" onClick="return(confirm('Are you sure you want to delete ALL entries?'));" style="float: right;">Delete ALL entries</a>

<h1>RSVP</h1>

<table cellpadding="0" cellspacing="0" border="0" id="rsvp">
  <tr>
    <td width="7%">&nbsp;</td>
    <td style="width: 29%; padding-right: 2%;"><strong>Name</strong></td>
    <td style="width: 4%; padding-right: 2%;"><strong>Adults</strong></td>
    <td style="width: 4%; padding-right: 2%;"><strong>Children</strong></td>
    <td style="width: 50%;"><strong>Bringing</strong></td>
  </tr>
  
  <?php
  $bg = " style=\"background: #edf4f4;\"";
  
  $result = $mysqli->query("SELECT * FROM rsvp ORDER BY name ASC");
  
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
      ?>
      <tr<?php echo $bg; ?>>
        <td valign="top" class="controls">
          <a href="rsvp-edit.php?id=<?php echo $row['id']; ?>"><img src="images/edit.png" alt="Edit" title="Edit" style="margin: 3px 3px 0 0;"></a>
          <a href="rsvp-db.php?a=delete&id=<?php echo $row['id']; ?>" onClick="return(confirm('Are you sure you want to delete this entry?'));"><img src="images/delete.png" alt="Delete" title="Delete" style="margin: 3px 3px 0 0;"></a>
        </td>
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
    <td>&nbsp;</td>
    <td style="text-align: right;"><strong>Totals</strong></td>
    <td style="text-align: center; padding-right: 2%;"><strong><?php echo $adult[adulttotal]; ?></strong></td>
    <td style="text-align: center; padding-right: 2%;"><strong><?php echo $child[childrentotal]; ?></strong></td>
    <td>&nbsp;</td>
  </tr>
</table>

<a href="rsvp-db.php?a=deleteall" onClick="return(confirm('Are you sure you want to delete ALL entries?'));" style="float: right;">Delete ALL entries</a>
<br><br>

<?php
$mysqli->close();

include "footer.php";
?>