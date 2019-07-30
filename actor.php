<?php
$conn = mysqli_connect('localhost','root','','delta');
if(isset($_POST['save'])){
	if(isset($_POST['name'])){
		$name = $_POST['name'];
	}
	if(isset($_POST['optradio'])){
		$optradio = $_POST['optradio'];
	}
	if(isset($_POST['dob'])){
		$dob= $_POST['dob'];
	}
	if(isset($_POST['bio'])){
		$bio = $_POST['bio'];
	}
	$sql = "INSERT INTO actor(name,sex,dob,bio) values ('$name','$optradio','$dob','$bio')";
	if($conn->query($sql)==true){
		echo "data submitted";
	}
	else{
		echo "error".$sql."<br>".$conn->error;
	}
}
$conn->close();
?>
<!doctype html>
<html>
<head>
<title>Movie Production house</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  .panel{
  padding:30px;
  background-color:#cce6ff;
}
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">MovieHouse</a>
    </div> 
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="table.php">Movies</a></li>
        <li><a href="#">TV Shows</a></li>
        <li><a href="actor.php">Celebrities</a></li>
        <li><a href="#">Watch list</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<div class="panel panel-default">
  <div class="panel body">
<form class="form-horizontal" action="actor.php" method="post">
    <div class="form-group">
      <div class="col-sm-6">
        <input type="text" class="form-control" id="movie" placeholder="Enter actor name" name="name" required>
      </div>
    </div>
    <div class="form-group">
    <div class="col-sm-6">
    <label class="radio-inline">
    <input type="radio" name="optradio" value="Male" checked>Male
    </label>
    <label class="radio-inline">
    <input type="radio" name="optradio" value="Female">Female
    </label>
    <label class="radio-inline">
    <input type="radio" name="optradio" value="Others">Others
    </label>
   </div>
   </div>
   <div class="form-group">
   <div class="col-sm-6">
<input type ="date" name="dob">
</div>
</div>
<div class="form-group">
<div class="col-sm-6">
<textarea class="form-control" rows="5" id="bio" name ="bio" placeholder="Enter Bio"></textarea>
</div>
</div>
<input type="submit" name="save" value="save">
</form>
</div>
</div>
</div>
</body>
</html>