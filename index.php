<?php 
    
include('functions.php');

$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "userlist";


if(isset($_POST['create_database'])) {
    inserting_data();
}

$connection = mysqli_connect($serverName, $userName, $password);






?>










  <!Doctype html>
   <html>
    <head>
        <title>Search Filter</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    
    <body>
       
        <div id="header">
            <h1>Hireshort Internship Test</h1>
        </div>
        
        <div id="main-content">
           
           <div id="search-box">
               <h1>Search Filter</h1>
               <p>Note: Enter both or either one of the following field</p>
               
               <form action="index.php" method="post">
               <label for="height">Height</label>
               <div class="form-group">
                   <input type="number" class="form-control" name="height">
               </div> 
               
               <label for="location">location</label>
               <div class="form-group">
                   <input type="text" class="form-control" name="location">
               </div>
               
               <input type="submit" name="submit" class="btn btn-primary" value="submit">
               
           </form>
           </div>
           <br><br>
           <hr>
           
           <div>
               <h4 id="userlist">User List</h4>
               
               <?php 
                if(!mysqli_select_db($connection,$databaseName)) {
                    echo ' 
                    <form action="index.php" method="post">
                    <input class="btn btn-primary createbutton" name="create_database" value="Create Database" type="submit"> 
                    </form>';
                }
               
               ?>
           </div>
           
           <div class="clearfix"></div>
           
           <?php 
            
if(isset($_POST['submit'])) {
                

    // Creating connection
$connection = mysqli_connect($serverName, $userName, $password, $databaseName);

// Checking connection
if(!$connection) {
 die("Connection failed: " .mysqli_connect_error());
}
                    
              
    $height = $_POST['height'];
    $location = $_POST['location'];
    
    if(!$height && !$location) {
        echo '<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Please enter atleast one of the field!</div>';
    }
    
    if($height && $location) {
    
          $query = "SELECT * FROM users WHERE height = $height AND location = '$location'";
             
          $result = mysqli_query($connection, $query);
    
          if(!$result){
             die('Query FAILED '. mysqli_error($connection));
          }
             
          while($row = mysqli_fetch_assoc($result)) {
              echo '<div class="user">
                
                <div class="image">
                    <img src="images/' .$row['id'].'.jpg" height="190px" width="190px">
                </div>
                
                <div class="details">
                    
                    <h2 class="usertitle">' .$row['name']. '</h2>
                    
                    <p class="userdetail">Age: ' .$row['age']. ' </p>
                    <p class="userdetail">Height: ' .$row['height']. '</p>
                    <p class="userdetail">Location: ' .$row['location']. '</p>
                </div>
                
            </div>';
          }
                        
        } else if($height) {
        
        $query = "SELECT * FROM users WHERE height = $height";
             
          $result = mysqli_query($connection, $query);
    
          if(!$result){
             die('Query FAILED '. mysqli_error());
          }
             
          while($row = mysqli_fetch_assoc($result)) {
              echo '<div class="user">
                
                <div class="image">
                    <img src="images/' .$row['id'].'.jpg" height="190px" width="190px">
                </div>
                
                <div class="details">
                    
                    <h2 class="usertitle">' .$row['name']. '</h2>
                    
                    <p class="userdetail">Age: ' .$row['age']. ' </p>
                    <p class="userdetail">Height: ' .$row['height']. '</p>
                    <p class="userdetail">Location: ' .$row['location']. '</p>
                </div>
                
            </div>';
          }
        
    } else if($location) {
        
        $query = "SELECT * FROM users WHERE location = '$location'";
             
          $result = mysqli_query($connection, $query);
    
          if(!$result){
             die('Query FAILED '. mysqli_error());
          }
             
          while($row = mysqli_fetch_assoc($result)) {
              echo '<div class="user">
                
                <div class="image">
                    <img src="images/' .$row['id'].'.jpg" height="190px" width="190px">
                </div>
                
                <div class="details">
                    
                    <h2 class="usertitle">' .$row['name']. '</h2>
                    
                    <p class="userdetail">Age: ' .$row['age']. ' </p>
                    <p class="userdetail">Height: ' .$row['height']. '</p>
                    <p class="userdetail">Location: ' .$row['location']. '</p>
                </div>
                
            </div>';
          }
    }
    
    mysqli_close($connection);
    } else {
    
    if(mysqli_select_db($connection,$databaseName)) {
      // Creating connection
$connection = mysqli_connect($serverName, $userName, $password, $databaseName);

// Checking connection
if(!$connection) {
 die("Connection failed: " .mysqli_connect_error());
}
    
    $query = "SELECT * FROM users";
             
          $result = mysqli_query($connection, $query);
    
          if(!$result){
             die('Query FAILED '. mysqli_error());
          }
             
          while($row = mysqli_fetch_assoc($result)) {
              echo '<div class="user">
                
                <div class="image">
                    <img src="images/' .$row['id'].'.jpg" height="190px" width="190px">
                </div>
                
                <div class="details">
                    
                    <h2 class="usertitle">' .$row['name']. '</h2>
                    
                    <p class="userdetail">Age: ' .$row['age']. ' </p>
                    <p class="userdetail">Height: ' .$row['height']. '</p>
                    <p class="userdetail">Location: ' .$row['location']. '</p>
                </div>
                
            </div>';
          }
    }
    
}
            
            
            
                
                
            
            ?>
            
            
           
           
            
        </div>
        
        <div id="footer">
            <p>&copy;- 2016 <a href="http://github.com/arjun1321">Arjun Kumar</a></p>
        </div>
    </body>
</html>