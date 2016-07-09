<?php 

$serverName = "localhost";
$userName = "username";
$password = "password";
$databaseName = "userlist";

    function creating_database(){
        
        // Creating connection
        $connection = new mysqli_connect($serverName, $userName, $password);
        
        // Checking connection
        if(!$connection) {
            die("Connection Failed " . mysqli_connect_error());
        }
        
        
        // Create database
        $sql = "CREATE DATABASE userlist";
        $result = mysqli_query($connection, $sql);
        if(!$result) {
            die("Query Failed " . mysqli_error());
        }
        mysqli_close($connection);
    }


    function creating_table() {
        
        // Creating connection
        $connection = mysqli_connect($serverName, $userName, $password, $databaseName);
        
        // Checking connection
        if(!$connection) {
            die("Connection Failed: ". mysqli_connect_error());
        }
        
        // Creating table
        $sql = "CREATE TABLE users ( 
                id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                age INT(10),
                photo VARCHAR(10),
                height INT(10),
                location VARCHAR(30))";
        
        
        $result = mysqli_query($connection, $sql);
        if(!$result) {
            die("Query Failed " . mysqli_error());
        }
        mysqli_close($connection);
    }

    function inserting_data() {
        
        creating_database();
        creating_table();
        
        // Creating connection
        $connection = mysqli_connect($serverName, $userName, $password, $databaseName);
        
        // Checking connection
        if(!$connection) {
            die("Connection failed: " .mysqli_connect_error());
        }
        
        $names = array('Arjun','Pradeep','Rahul','Satyam','Shivam','Sundaram','Jai','Viru','Gabbar','Thakur');
        
        $age = array(20,15,22,17,17,17,21,24,26,26);
        $height = array(3,4,5,6,6,5,3,4,4,4);
        $location = array('Delhi','Mumbai','Kolkata','Chennai','Delhi','Mumbai','Kolkata','Chennai','Delhi','Mumbai');
        
        for($counter = 0; $counter < 10; $counter++) {
            $sql = "INSERT INTO users (name, age, photo, height, location) VALUES ('$names[$counter]',$age[$counter],'$counter."jpg"',$height[$counter],'$location[$counter]')";
            
            $result = mysqli_query($connection, $sql);
            if(!$result) {
                die("Query Failed " . mysqli_error());
            }
            
        }
        
        mysqli_close($connection);
        
        
    }

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
           
           <h4 id="userlist">User List</h4>
           
            
        </div>
        
        <div id="footer">
            <p>&copy;- 2016 <a href="http://github.com/arjun1321">Arjun Kumar</a></p>
        </div>
    </body>
</html>