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
        .likes {
          background-color: #3A97FF;
        }
        .likes, .dislikes {
          width: 100%;
          height: 50px;
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
$itung = 1;
while ($itung == $_SESSION["id_user"]) {
  $sql= "SELECT count(*) as jumlah from usertable";
  $result = $conn->query($sql);
  $count = $result->fetch_array();
  $itung = rand(1, $count[0]);
  echo $itung;
}
$sql = "SELECT * from usertable where ID_USER = $itung";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
?>

<div id="home">
  <div id="container-fluid">
    <center><h1 style="margin-top: 150px;"><b>WOULD YOU DATE</b></h1></center>
    <center>
      <!-- img url -->
      <img src="<?=$row['IMAGE_URL']?>" id="pics">
    </center>
  </div>
  <div id="container-fluid">
    <center>
      <!-- name -->
      <h2 id="name"><?=$row['NAMA']?></h2>
    </center>
  </div>
  <div id="container-fluid">
    <center>
    <div class="col-sm-4"></div>
    <div class="col-sm-2">
     <form>
      <!-- php untuk nambah LIKE -->
      <!-- supaya jquerynya jalan juga. bersamaan dgn UPDATE like -->
      <a href="home2.php?id=<?php echo $itung; ?>&like=1" style="color:white"><input name="like" value="YES" class="likes btn btn-success"></a>
     </form> 
    </div>
    <div class="col-sm-2">
      <form>
       <!-- php utk dislike -->
       <a href="home2.php?id=<?php echo $itung; ?>&dislike=1" style="color:white"><input name="dislike" value="NO" class="dislikes btn btn-danger"></a>
      </form>
    </div>
    <div class="col-sm-4"></div>
    </center>
  </div>
</div>
<?php
  }
?>

</body>
</html>