<?php
require 'config/db-config.php';
session_start();
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
  width: 100%;
  height:100%;
  font-family: 'Open Sans', sans-serif;
  background: #092756;
  background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
  background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
  background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
  background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
  background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}
        #pics {
          margin-top: 150px;
          width: 200px;
          height: 200px;
          max-width: 200px;
          max-height: 200px;
          border-radius: 100px;
        }
        #image {
          width: 200px;
          height: 200px;
          max-width: 200px;
          max-height: 200px;
          border-radius: 100px;
        }
        #like {
          background-color: #3A97FF;
        }
        #like, #dislike {
          width: 100%;
        }
        #choice_result {
          margin-top: 100px;
          margin-bottom: 100px;
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
        .next, #like, #dislike {
          height:50px;
          -webkit-transition: height 1s;
          transition: height 1s ;
        }
        .next:hover, #like:hover, #dislike:hover  {
          height: 70px;
      </style>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
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

<?php
  $id = $_GET['id'];
  $sql = "SELECT * from usertable where ID_USER= $id";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    $angka_like = $row["LIKE"];
    $angka_dislike = $row["DISLIKE"];
  }
  $angka_like = $angka_like+1;
  $angka_dislike = $angka_dislike+1;
  if (isset($_GET['like'])){
    $sql = "UPDATE usertable SET `LIKE` = $angka_like where ID_USER = $id ";
    echo $sql;
    $result = $conn->query($sql);
  } else if (isset($_GET['dislike'])){
    $sql = "UPDATE usertable SET DISLIKE = $angka_dislike where ID_USER = $id";
    $result = $conn->query($sql);
  }
?>
<?php
$sql = "SELECT * from usertable where ID_USER= $id";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
?>
<script>
  $(function(){
      $(document).ready(function(){
        var green_poll = <?=$row["LIKE"]?>;
        var red_poll = <?=$row["DISLIKE"]?>;
        var width_green = green_poll*100/(green_poll+red_poll);
        width_green = width_green.toFixed(); //pembulatan
        var width_red = 100 - width_green ;
        width_red = width_red.toFixed(); // pembulatan
        $('#green_bar').css('width', width_green + '%');
        $('#red_bar').css('width', width_red + '%');
        $("#poll1").text(green_poll + ' people say YES (' + width_green + '%)');
        $("#poll2").text(red_poll + ' people say NO (' + width_red + '%)');
      });
    });
</script>
<div class="container-fluid" id="choice_result">
  <div id="container-fluid">
    <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-3" id="left" style="float:left; margin-right: auto; margin-left:auto; vertical-align: middle;">
          <center>
            <!-- img url  -->
            <img class="img-responsive" id="image" src='<?=$row["IMAGE_URL"]?>'>
          </center>
        </div>
        <div class="col-md-3" id="right" style="margin-right: auto; margin-left:auto; vertical-align: middle;">
            <h2>
              Nama : <?=$row["NAMA"]?>
            </h2>
            <h2>
              Kota : <?=$row["KOTA"]?>
            </h2>
            <h2>
              Umur : <?=$row["UMUR"]?>
            </h2>
            <h2>
              Gender : <?=$row["GENDER"]?>
            </h2>
        </div>
      <div class="col-md-3"></div>
    </div>
  </div>
  <h1 class="text-center" style="margin-top: 40px">Would You Date <?=$row["NAMA"]?> ?</h1>
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

  
  <br>
  <div class="container">
    <div class="col-sm-5">
      </div>
      <!-- ini tombol next untuk balik ke awal. terus dirandom supaya keluar profile org lain -->
      <!-- nanti senin dipikirkan lagi caranya -->
    <form method="post" action="home.php">
      <input type="submit" class="col-sm-2 btn btn-success next" value="NEXT Pics">
    </form>
    <div class="col-sm-5">
      </div>
  </div>
</div>
</div>
<?php
}
?>
</body>
</html>