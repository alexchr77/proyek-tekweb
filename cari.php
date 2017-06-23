<?php
require 'config/db-config.php';
?>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <style>
  h1, h2, h3, h4, div, p {
          color:white;
        }
  body { 
          background: linear-gradient(211deg, #ef0b40, #fd5058, #dc4031);
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
  #text {
    color: white;
  }
  #headline {
    margin-top:100px;
  }
  .caret.caret-up {
    border-top-width: 0;
    border-bottom: 4px solid #fff;
  }
  input[type="submit"] {
    border-radius: 12px;
    text-align: center;
    width: 50%;
    margin: 20px auto 0;
    background: linear-gradient(#FFDA63, #FFB940);
    color: brown;
    opacity: 0.8;
  }
  input[type="submit"]:hover {
    opacity: 1;
  }
  #regis {
    height:30px;
    max-height: 30px;
  }
</style>

</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid" id="text">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="home.php">Would You Date</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="home.php">HOME</a></li>
          <li><a href="profile.php">PROFILE</a></li>
          <li><a href="cari.php">SEARCH</a></li>
          <li><a href="processor/logout.php">LOGOUT</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <h1 align="center" id="headline">The Ultimate Beauty Ranker 3000</h1>
<center>
<h3>Umur:</h3>
<div id="container-fluid">
  <form id="formulir" method="post" action="story.php">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <input type="text" id="umur1" class="form-control" name="umur1" placeholder="min. age">
    </div>
    <div class="col-sm-3">
      <input type="text" id="umur2" class="form-control" name="umur2" placeholder="max. age">
    </div>
    <div class="col-sm-3"></div>
  </div>
  <h3>Kota:</h3>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <select class="form-control" id="kota" name="kota">
        <option value="surabaya">--Select your city--</option>
          <option value="surabaya">Surabaya</option>
          <option value="jakarta">Jakarta</option>
          <option value="bandung">Bandung</option>
          <option value="denpasar">Denpasar</option>
        </select>
    </div>
    <div class="col-sm-3"></div>
  </div>
  <h3>Gender:</h3>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <select class="form-control" id="gender" name="gender">
        <option value="any">-- any gender --</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>
    <div class="col-sm-3"></div>
  </div>
  <div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-2">
      <input type="submit" id="regis" class="btn-primary" name="search" value="OK">
    </div>
    <div class="col-sm-5"></div>
  </div>
  </form>
</div>
</center>

</body>
</html>