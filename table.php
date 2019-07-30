<?php
include_once('conn.php');
$query = "SELECT * FROM movies";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Movie Production house</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
  <table class="table table bordered">
  	<tr>
  	<th>Serial no</th>
  	<th>Poster</th>
  	<th>Movie Name</th>
  	<th>Year of release</th>
  	<th>plot</th>
  	<th>cast</th>
  	<th>Edit</th>
  	</tr>
  	</thead>
    <thead>
  <a href="list.php" style="margin-right:auto;"><button type="submit" name="submit">Add Movies</button></a>
  	<tbody>
  	<?php
  	while($rows = mysqli_fetch_assoc($result)){
  	echo "<tr>
    <td>".$rows['no']."</td>
    <td><img src='".$rows['image']."' height ='100px' width='100px'/></td>
    <td>".$rows['name']."</td>
    <td>".$rows['year']."</td>
    <td>".$rows['plot']."</td>
    <td>".$rows['cast']."</td>
    <td><a href='update.php?id1=$rows[no]'>Edit</a></td>
    </tr>";
  }
    ?>
  	</tbody>

  </body>
  </html>