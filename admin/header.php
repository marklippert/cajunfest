<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title>CajunFest Administration<?php if ($PageTitle != "") echo " | " . $PageTitle; ?></title>
    <link rel="shortcut icon" type="../image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
    
    <meta name="author" content="Mark Lippert">
    
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../inc/main.css">
    <link rel="stylesheet" href="inc/admin.css">
    
    <script type="text/javascript" src="../inc/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../inc/bootstrap-collapse.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');
      });
    </script>
    
    <!--[if lt IE 9]><script src="../inc/modernizr-2.6.2-respond-1.1.0.min.js"></script><![endif]-->
    <!--[if lt IE 7 ]>
    <script type="text/javascript" src="../inc/dd_belatedpng.js"></script>
    <script type="text/javascript">DD_belatedPNG.fix('img, .png');</script>
    <![endif]-->
  </head>
  <body>
    
    <header>
      <a href="."><img src="images/logo.png" alt="CajunFest Admin" id="logo"></a>
      
      <!--
      <button id="menu-toggle" data-toggle="collapse" data-target="#menu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <nav id="menu" class="collapse">
        <ul class="clearfix">
          <li><a href=".">Home</a></li>
          <li><a href="rsvp.php">RSVP</a></li>
          <li><a href="location.php">Location</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="prizes.php">Prizes</a></li>
          <li><a href="pink-gator.php">Pink Gator</a></li>
        </ul>
      </nav>
      -->
    </header>
    
    <div id="content-wrap" class="clearfix">
      <article>
        