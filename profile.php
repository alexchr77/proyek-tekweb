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
              background: linear-gradient(216deg, #ff8a40, #fd5068, #dc4588);
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
      .img_rounded {
        border-radius: 300px;
        width: 20%;
        max-width: 25%;
        max-height: 70px;
      }
      #image-src {
          width: 200px;
          height: 200px;
          max-width: 200px;
          max-height: 200px;
          border-radius: 100px;
      }
      #overall {
        display:flex;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
      }
      #image_container {
        float: left;
        border-radius: 90px;
        padding-right: 30px;
      }
      #nama, #umur, #gender, #kota{
        float: left;
      }
      .btn {max-height: 30px;}
      #profile_container {
        float: right;
        padding-left: 30px;
        margin-left:30px;
      }
      #wrapper {
        width: 100%;
        max-width: 700px;
        clear: both;
        display:flex;
        justify-content:center;
        align-items:center;
      }
      #s1, #s2, #s3, #s4, #s5, #s6, #s7, #s8, #s9, #s10 {
        float:left;
        border: 0.5px solid black;
      }
      #s1, #s2, #s3, #s4, #s5, #s6{
        background-color: gold;
      }
      #edit, #save, #back {
        width:100%;
        margin-bottom:60px;
      }
      .gone {
        display:none;
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
$id = $_SESSION["id_user"];
$sql = "SELECT * from usertable where ID_USER= $id";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
?>

<div class="container-fluid" id="overall">
  <div>
    <div id="image_container">
      <form id="formulir" method="post" action="processor/edit-profile.php">
      <div id="image-container2">
        <!-- ini link image y ditampilkan -->
       <img id="image-src" src='<?=$row["IMAGE_URL"]?>' class="img-rounded">
       <!-- ini untuk edit IMG_URL -->
       <input type="text" class="gone tog form-control" id="postImage" name="postImage" value='<?=$row["IMAGE_URL"]?>' hidden>
      </div>
    </div>
    <div  id="profile_container">
      <div id="nama_container">
        <!-- ini nama yg diambil dri database -->
        <h3 id="nama">Nama: <?=$row["NAMA"]?></h3>
        <!-- Ini untuk edit Name -->
        <input type="text" class="gone tog form-control" id="postNama" name="postNama" placeholder="enter your name" value='<?=$row["NAMA"]?>' hidden>
      </div>
      <!-- umur dri db -->
        <h3 id="umur">Umur: <?=$row["UMUR"]?> </h3>
        <!-- untuk edit umur -->
        <input type="text" class="gone tog form-control" id="postUmur" name="postUmur" placeholder="enter your age" value='<?=$row["UMUR"]?>' hidden>
        <!-- kelamin dari database -->
        <p></p>
        <h3 id="gender">Gender: <?=$row["GENDER"]?></h3>
        <!-- untuk edit kelamin -->
        <select class="gone tog form-control" id="postGender" name="postGender" hidden>
          <option value='<?=$row["GENDER"]?>''>-- <?=$row["GENDER"]?> --</option>
          <option value="male">male</option>
          <option value="female">female</option>
        </select>
      <div id="kota_container">
        <!-- kota dari database -->
        <h3 id="kota">Kota: <?=$row["KOTA"]?></h3>
        <!-- untuk edit kota -->
        <select class="gone tog form-control" id="postKota" name="postKota">
          <option value='<?=$row["KOTA"]?>''>-- <?=$row["KOTA"]?> --</option>
          <option value="surabaya">Surabaya</option>
          <option value="jakarta">Jakarta</option>
          <option value="bandung">Bandung</option>
          <option value="denpasar">Denpasar</option>
        </select>
      </div>
    </div>
  </div>
</div>

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

<h1 class="text-center"><b>Would The World Date You?</b></h1>
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

<br><br>
<div class="container-fluid">
  <div class="col-sm-5"></div>
  <div class="col-sm-2">
    <input type="submit" id="save" class="gone tog btn btn-info" name="submit" value="Save">
    </form>
    <button id="edit" class="tog btn btn-info">Edit</button>
    <!-- tombol save untuk update ke database -->
    <button id="back" class="gone tog btn btn-danger" >Back</button>
  </div>
  <div class="col-sm-5"></div>
</div>

<script>
  $(function(){
    $("#edit").click(function(){
      $(".tog").toggle();
    });
  });
  $(function(){
    $("#back").click(function(){
      $(".tog").toggle();
    });
  });
  </script>
<?php
  }
?>
</body>
</html>