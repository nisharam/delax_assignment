<?php
include('conn.php');
$cast="";
if(isset($_POST['update'])){
	if(isset($_POST['m_id'])){
		$id = $_POST['m_id'];
	}
	if(isset($_POST['movie'])){
		$movie = $_POST['movie'];
	}
  if(isset($_POST['plot'])){
    $plot = $_POST['plot'];
  }
  if(isset($_POST['actor'])){
  $actor=$_POST['actor'];
  $cast="";
  foreach($actor as $cast1){
    $cast.=$cast1.",";
  }
}
$sql = "UPDATE movies set name='$movie',plot='$plot',cast ='$cast' WHERE no='$id' ";
print_r($sql);
if($conn->query($sql)==true){
	echo "data updated successfully";
}
else{
	echo "error".$sql ."<br>".$conn->error;
}
}
$conn->close();
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
<div class="container">
  <h2>Add movies</h2>
  <form class="form-horizontal" action="update.php" method="post" enctype="multipart/form-data">
   <div class="form-group">
      <label class="control-label col-sm-2" for="movie">ID</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="m_id" name="m_id" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="movie">Movie Name:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="movie" placeholder="Enter movie name" name="movie" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="plot">Plot</label>
      <div class="col-sm-6">          
        <textarea class="form-control" rows="5" id="plot" name ="plot" placeholder="Enter plot" ></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="image" name ="image">Poster</label>
      <div class="col-sm-6">          
        <input type="file" name="image" id="image>
      </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="addactor">Cast</label>
    <div class="col-sm-6">
    <?php 
    include 'conn.php';
    $sql = "SELECT * from actor";
    $query = $conn->query($sql);
    if($query->num_rows > 0){
      while($actor = $query->fetch_assoc()){
        ?>
        <input type="checkbox" name="actor[]" value='<?php echo $actor['name']; ?>' /><label for ="<?php $actor['name']?>"> <?php echo $actor['name'];?></label><br />
        <?php  
      }
    }
    ?>
  </div>

  <div class="col-sm-4">
  </div>
  <div class="col-sm-2">
  <a href="actor.php">Add Actor</a>
</div>

  </div>
   <input type="submit"  name="update" value="update">
  </div>
  </form>
  </div>
  <button type="submit" class="btn btn-default">Cancel</button>
  </body>
  </html>
