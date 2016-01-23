<?php
include "../inc/dbconfig.php";

switch ($_GET['a']) {
  case "add":
    $mysqli->query("INSERT INTO rsvp (
                name,
                email,
                adults,
                children,
                bringing
                ) VALUES (
                '" . $_POST['name'] . "',
                '" . $_POST['email'] . "',
                '" . $_POST['adults'] . "',
                '" . $_POST['children'] . "',
                '" . $_POST['bringing'] . "'
                )");
    break;
  case "edit":
    $mysqli->query("UPDATE rsvp SET
                name = '" . $_POST['name'] . "',
                email = '" . $_POST['email'] . "',
                adults = '" . $_POST['adults'] . "',
                children = '" . $_POST['children'] . "',
                bringing = '" . $_POST['bringing'] . "'
                WHERE id = '" . $_POST['id'] . "'");
    break;
  case "delete":
    $mysqli->query("DELETE FROM rsvp WHERE id = '" . $_GET['id'] . "'");
    break;
  case "deleteall":
    $mysqli->query("TRUNCATE TABLE rsvp");
    break;
}

$mysqli->close();

header( "Location: rsvp.php" );
?>