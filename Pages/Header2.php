<?php 
 session_start();
 $connect=mysqli_connect('localhost','root','','airpollutiondb');
 ?>
<!DOCTYPE html>
<!--
Template Name: Air Pollution
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="en">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Air Pollution for Staff</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="nospace">
      <li><i class="fa fa-envelope-o"></i> MgMg@gmail.com</li>
      <li><a href="Home.php"><i class="fa fa-lg fa-home"></i></a></li>
      <li><a href="StaffLogin.php" ><i class="fa fa-lg fa-sign-in">Login</i></a></li>
      <li><a href="StaffRegister.php" ><i class="fa fa-lg fa-edit">Sign Up</i></a></li>
    </ul>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <section> 
      <!-- ################################################################################################ -->
      <div><i class="fa fa-phone"></i> +95 98 3456 748</div>
      <div>
        <h1 id="logo"><a href="index.html">Air Pollution</a></h1>
      </div>
      <div>
        <form class="clear" method="post" action="#">
          <fieldset>
            <legend>Search:</legend>
            <input type="search" value="" placeholder="Search Here&hellip;">
            <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
          </fieldset>
        </form>
      </div>
      <!-- ################################################################################################ -->
    </section>
    <nav id="mainav"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="Home.php">Home</a></li>
       <li><a class="active" href="StaffLogin.php">Login</a></li>
        <li><a class="active" href="StaffRegister.php">Register</a></li>
        <li><a class="active" href="ProductRegisteration.php">ProductRegistration</a></li>
        
         <li><a class="active" href="CityRegister.php">CityRegistration</a></li>
          <li><a class="active" href="ViewQuestion.php">ViewQuestion</a></li>
       

      <!-- ################################################################################################ -->
    </nav>
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
