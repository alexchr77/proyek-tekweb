<?php
require 'config/db-config.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
    h1, h3 {
          color:white;
        }
    h2 {
      color: #E5F7FF;
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

	<h1 align="center" id="headline">Beauty Ranking</h1>

<?php
  
  $umur_min = $_POST['umur1'];
  $umur_max = $_POST['umur2'];
  $city = $_POST['kota'];
  $gender = $_POST['gender'];
if ($gender != 'any') {
  $sql = "SELECT * FROM usertable WHERE UMUR >= $umur_min AND UMUR <= $umur_max AND KOTA = '$city' AND GENDER = '$gender' ORDER BY `LIKE` DESC, DISLIKE ASC";
  $result = $conn->query($sql);
  $count = 1;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $post_link_detail = 'detailsearch.php?id='.$row["ID_USER"];
?>
	
<center>
   <div class="row">
    <div class="col-sm-2 card" style="display:flex;justify-content:center;align-items:center;">
        <center>
        	<h1><?=$count?>#</h1>
        </center>
    </div>
    <div class="col-sm-2">
      <div class="image-display">
        <center>
          <img src='<?=$row["IMAGE_URL"]?>' class="card-image"><br>
        </center>
      </div>
    </div>
    <div class="col-sm-8" align="center">
      <div class="image-caption" style="display:flex;align-items:center;">
      	<ul style="list-style-type:none">
      		<li><a href='<?=$post_link_detail?>'><h3><?=$row["NAMA"]?></h3></a></li>
      		<li><h2><?=$row["LIKE"]?> People Say YES</h2></li>
      		<li><h2><?=$row["DISLIKE"]?> People Say NO</h2></li>
      	</ul>
      </div>
    </div>
   </div>
   </center>
   <br>
   <br>
<?php
	$count = $count + 1;
    }
  } else {
    echo "No Result";
  }
}
else {
  $sql = "SELECT * FROM usertable WHERE UMUR >= $umur_min AND UMUR <= $umur_max AND KOTA = '$city' ORDER BY `LIKE` DESC, DISLIKE ASC";
  $result = $conn->query($sql);
  $count = 1;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $post_link_detail = 'detailsearch.php?id='.$row["ID_USER"];
?>
	
<center>
   <div class="row">
    <div class="col-sm-2 card" style="display:flex;justify-content:center;align-items:center;">
        <center>
        	<h1><?=$count?>#</h1>
        </center>
    </div>
    <div class="col-sm-2">
      <div class="image-display">
        <center>
          <img src='<?=$row["IMAGE_URL"]?>' class="card-image"><br>
        </center>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="image-caption" style="display:flex;align-items:center;">
      	<ul style="list-style-type:none">
      		<li><a href='<?=$post_link_detail?>'><h3><?=$row["NAMA"]?></h3></a></li>
      		<li><h2><?=$row["LIKE"]?> People Say YES</h2></li>
      		<li><h2><?=$row["DISLIKE"]?> People Say NO</h2></li>
      	</ul>
      </div>
    </div>
   </div>
   </center>
<?php
	$count = $count + 1;
    }
  } else {
    echo "No Result";
  }
}
?>

  
</body>
</html>