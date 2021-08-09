<?php   
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','restaurant_system');
    // Establish database connection.
    try
    {
        $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
    catch (PDOException $e)
    {
        exit("Error: " . $e->getMessage());
    }
          
    if(isset($_POST['submit']))
    {   $sql = "select * from details where uid = '" .$_POST["uid"]. "'";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        
        
        if($query->rowCount() > 0)
        {                    
            foreach($results as $result)
                {
                $userid=$result->uid;
                $uname=$result->username;
                $ct=$result->city;
                $phn=$result->phone;

                echo "<br>";
                echo "User ID : $userid <br>";
                echo "Username : $uname <br>";
                echo "City : $ct <br>";
                echo "Phone Number : $phn <br>";
            }
        }
    }                
?>  

<html>
    <head></head>
    <body>
        <form method="POST" action="">            
            <label class="label">Enter your User ID : </label>
            <input class="input--style-4" type="text" name="uid" id="uid" required>

            <button type="submit" name="submit" value="Submit">Submit</button>
        </form>      
    </body>
</html>