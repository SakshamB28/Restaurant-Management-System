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
            // while($row = mysqli_fetch_assoc($retval))
            foreach($results as $result)
                {
                $userid=$result->uid;
                $uname=$result->username;
                $ct=$result->city;
                $phn=$result->phone;
                // echo "$userid <br>$uname <br>$ct <br> $phn<br>";
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
            <!-- <button type="submit" value="Submit" onclick="disp()">Submit</button> -->
            <!-- <p id="p1"></p> -->
        </form>      
        <!-- <script>
            function disp()
            {
                var uid = document.getElementById('uid').values;
                document.getElementById('p1').innerHTML = uid;
            }
        </script> -->
    </body>
</html>