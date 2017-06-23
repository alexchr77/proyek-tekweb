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
  .card-image {
    width: 200px;
          height: 200px;
          max-width: 200px;
          max-height: 200px;
          border-radius: 100px;
  }
  #green_bar, #red_bar {
          /*width: 50%;*/
          height: 30px;
        }
        #green_bar {
          width:20%;
          background-color: #3A97FF;
          float: left;
          border-bottom-left-radius: 50px;
          border-top-left-radius: 50px;
        }
        #red_bar {
          width: 80%;
          background-color: #cc2323;
          float:right;
          border-bottom-right-radius: 50px;
          border-top-right-radius: 50px;
        }
        #poll2 {
          text-align: right;
          float:right;
        }
        #poll1 {
          float:left;
        }
        #poll1, #poll2 {
          width: 50%;
        }
        .stats {
          margin-top: 50px;
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

  <h1 align="center" id="headline">Beauty's Profile</h1>

  <?php
  $post_id = $_GET["id"];
  
  if ($post_id == "") {
    die("Invalid Request");
  }

  $sql = "SELECT * FROM usertable WHERE ID_USER = $post_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      ?>
    <div class="row">
      <div class="col-sm-5" style="display:flex;justify-content:flex-end;align-items:center;">
        <img src='<?=$row["IMAGE_URL"]?>' class="card-image"><br><br>
      </div>
      <div class="col-sm-7">
        <h2>Nama      : <?=$row["NAMA"]?></h2>
        <h2>Umur      : <?=$row["UMUR"]?></h2>
        <h2>Kota      : <?=$row["KOTA"]?></h2>
        <h2>Gender    : <?=$row["GENDER"]?></h2>
      </div>
    </div>

<script>
  $(function(){
      $(document).ready(function(){
        // ambil like dan dislike dri DB
        var green_poll = <?=$row["LIKE"]?>;
        var red_poll = <?=$row["DISLIKE"]?>;
        var width_green = green_poll*100/(green_poll+red_poll);
        width_green = width_green.toFixed(); //pembulatan
        var width_red = 100 - width_green ;
        width_red = width_red.toFixed(); // pembulatan
        $('#green_bar').css('width', width_green + '%');
        $('#red_bar').css('width', width_red + '%');
        $("#poll1").text(green_poll + ' Votes (' + width_green + '%)');
        $("#poll2").text(red_poll + ' Votes (' + width_red + '%)');
      });
    });
</script>

<h1 class="text-center stats">Statistics:</h1>
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <div class="container-fluid">
        <div id="poll1"></div>
        <div id="poll2"></div>
      </div>
      <div id="bar">
        <div id="green_bar"></div>
        <div id="red_bar"></div>
      </div>
    </div>
    <div class="col-sm-3" >
    </div>
  </div>
  <?php
    }
  } else {
    echo "0 results";
  }
  ?>
  <br>
  <center>
  <form method="post" action="cari.php">
      <input type="submit" class=" btn btn-warning next" value="Back to Search">
  </form>
  </center>
</body>
</html>