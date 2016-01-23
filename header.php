<?php
header("Cache-Control: no-transform"); // Fix AT&T's wireless servers gzipping bullshit (random characters on page)
// ob_start('ob_gzhandler'); also works
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta name="viewport" content="width=device-width">
  
  <title>CajunFest 2013 Waukesha<?php if ($PageTitle != "") { echo " | " . $PageTitle; } ?></title>
  <meta name="description" content="Cajunfest 2013 Waukesha with Greg Stratton, Mr. Mike Passaretti, and Jim Kohli">
  <meta name="keywords" content="cajunfest, 2013, waukesha, cajun food, waukesha, cajun, greg stratton, mr. mike passaretti, jim kohli">
  <meta name="author" content="Mark Lippert"><meta name="recognition" content="Thanks Mark!!!">
  
  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="stylesheet" href="inc/cajunfest2013.css" type="text/css" media="screen,print">
  
  <script type="text/javascript" src="inc/jquery-1.10.0.js"></script>
  <script type="text/javascript" src="inc/bootstrap-collapse.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');
    });
  </script>
  <!--[if lt IE 8 ]>
  <script type="text/javascript" src="inc/IE8.js"></script>
  <![endif]-->
  <!--[if lt IE 7 ]>
  <script type="text/javascript" src="inc/dd_belatedpng.js"></script>
  <script type="text/javascript">DD_belatedPNG.fix('img, .png');</script>
  <![endif]-->
</head>
<body>

<div id="header">
  <a href="."><img src="images/logo-2013.png" alt="CajunFest" id="logo"></a>
  
  <button id="menu-toggle" data-toggle="collapse" data-target="#menu">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>

  <div id="menu" class="collapse">
    <ul>
      <li><a href=".">Home</a></li>
      <li><a href="rsvp.php">RSVP</a></li>
      <li><a href="location.php">Location</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="prizes.php">Prizes</a></li>
      <li><a href="pink-gator.php">Pink Gator</a></li>
    </ul>
  </div>

  <div id="slogan">
    Celebrating <?php echo date('Y') - 1984; ?> years <div id="subslogan">of exquisitely exothermic cooking!</div>
  </div>
</div> <!-- END header -->

<div id="wrap">
  <div id="content">
    