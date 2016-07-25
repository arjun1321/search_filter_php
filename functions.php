<?php 


$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "userlist";

    function creating_database(){
        global $serverName;
        global $userName;
        global $userName;
        global $password;
        // Creating connection
        $connection = mysqli_connect($serverName, $userName, $password);
        
        // Checking connection
        if(!$connection) {
            die("Connection Failed " . mysqli_connect_error());
        }
        
        
        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS userlist";
        $result = mysqli_query($connection, $sql);
        if(!$result) {
            die("Query Failed " . mysqli_error($connection));
        }
        mysqli_close($connection);
    }


    function creating_table() {
        
        global $serverName;
        global $userName;
        global $password;
        global $databaseName;
        
        
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
            die("Query Failed " . mysqli_error($connection));
        }
        mysqli_close($connection);
    }

    function inserting_data() {
        global $serverName;
        global $userName;
        global $password;
        global $databaseName;
        
        
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
            $sql = "INSERT INTO users (name, age, photo, height, location) VALUES ('$names[$counter]',$age[$counter],'$counter',$height[$counter],'$location[$counter]')";
            
            $result = mysqli_query($connection, $sql);
            if(!$result) {
                die("Query Failed " . mysqli_error($connection));
            }
            
        }
        
        mysqli_close($connection);


        
        
    }




?>