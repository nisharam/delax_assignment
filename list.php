
<?php
$msg="";
$cast="";
$iderr=$movieerr=$yearerr=$ploterr=$casterr="";
include_once('conn.php');

if(isset($_POST['save'])){
  if(isset($_POST['movie'])){
    $movie = $_POST['movie'];
  }
  if(isset($_POST['year'])){
    $year = $_POST['year'];
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
$target = "images/".basename($_FILES['image']['name']);
$filename = $_FILES['image']['name'];
  $file_tmp = file_get_contents($_FILES['image']['tmp_name']) ;
  $array = array('jpg','jpeg','png');
  $ext = pathinfo($filename,PATHINFO_EXTENSION);
  if(!empty($filename)){
    if(in_array($ext, $array)){


$sql = "INSERT INTO movies (no,name,year,plot,image,cast) values ('$id','$movie','$year','$plot','$target','$cast')";
if($conn->query($sql)==true){
  echo "data added successfully";
}
else{
  echo "error".$sql ."<br>".$conn->error;
}
}
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
<style>
.panel{
  padding:30px;
  background-color:#cce6ff;
}
.cast{
  width:;
}
</style>
</head>
<body>
<!---code for navigation bar-->
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
<!---code for adding movie list-->
<div class="container">
  <h2>Add movies</h2>
  <div class="panel panel-default">
  <div class="panel body">
  <form class="form-horizontal"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <div class="form-group">
      <label class="control-label col-sm-2" for="movie">ID</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="m_id" name="m_id" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="movie">Movie Name:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="movie" placeholder="Enter movie name" name="movie" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Release">Year of Release</label>
      <div class="col-sm-6">          
        <input type="text" class="form-control" id="year" placeholder="Enter year of Release" name="year" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="plot">Plot</label>
      <div class="col-sm-6">          
        <textarea class="form-control" rows="5" id="plot" name ="plot" placeholder="Enter plot"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="image" name ="image">Poster</label>
      <div class="col-sm-6">          
        <input type="file" name="image" id="image">
      </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="addactor">Cast</label>
    <div class="col-sm-6 castlist">
    <?php 
    include 'conn.php';
    $sql = "SELECT * from actor";
    $query = $conn->query($sql);
    if($query->num_rows > 0){
      while($actor = $query->fetch_assoc()){
        ?>
        <input type="checkbox"  name="actor[]" value='<?php echo $actor['name']; ?>' /><label for ="<?php $actor['name']?>"> <?php echo $actor['name'];?></label><br />
        <?php  
      }
    }
    ?>
  </div>
  <div class="col-sm-2">
  <a href="actor.php"><button type="submit">Add Actor</button></a>
</div>

  </div>
  <div class="col-sm-4">
   <input type="submit"  name="save" value="save" style="margin-left:80px">
   </div>
  </div>
  </form>
  <div class="col-sm-4">
  </div>
  </div>
  </div>
  <button type="submit" class="btn btn-default">Cancel</button>
  <!--end -->   
</body>
</html>
