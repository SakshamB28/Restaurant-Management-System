<?php
  session_start();
 ?>
<?php
    // session_start();
    $con=mysqli_connect("localhost","root","","restaurant_system");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $msg='';
    if(isset($_POST['submit']))
    {
        $time=time()-30;
        $ip_address=getIpAddr();
        // Getting total count of hits on the basis of IP
        $query=mysqli_query($con,"select count(*) as total_count from loginlogs where TryTime > $time and IpAddress='$ip_address'");
        $check_login_row=mysqli_fetch_assoc($query);
        $total_count=$check_login_row['total_count'];
        //Checking if the attempt 3, or youcan set the no of attempt her. For now we taking only 3 fail attempted
        if($total_count==3)
        {
            $msg="To many failed login attempts. Please login after 30 sec";
        }
        else
        {

            $result1=mysqli_query($con,"SELECT * FROM user WHERE username='" . $_POST["userName"] . "' and password = '". md5($_POST["password"])."' and type = '1' ");

            $count1  = mysqli_num_rows($result1);

            $res=mysqli_query($con,"select * from user where username='" . $_POST["userName"] . "' and password = '". md5($_POST["password"])."'");
            if(mysqli_num_rows($res))
            {
                // $_SESSION['IS_LOGIN']='yes';    
                mysqli_query($con,"delete from loginlogs where IpAddress='$ip_address'");
                $_SESSION["userid"] = $_POST["userName"];

                if($count1==0)
                header("Location: /dbms_sec/user.html");
                else {
                header("Location: /dbms_sec/admin.html");
                }
                exit;
                // echo "<script>window.location.href='dashboard.php';</script>";
            }
            else
            {
                $total_count++;
                $rem_attm=3-$total_count;
                if($rem_attm==0)
                {
                    $msg="To many failed login attempts. Please login after 30 sec";
                    ?>
                    <script>
                      document.getElementById("username").disabled=true;
                      document.getElementById("password").disabled=true;
                      document.getElementById("form1").disabled=true;
                    </script>
                    <?php
                }
                else
                {
                    $msg="Please enter valid login details. $rem_attm attempts remaining.";
                }
                $try_time=time();
                mysqli_query($con,"insert into loginlogs(IpAddress,TryTime) values('$ip_address','$try_time')");
            }   
        }
    }
    // Getting IP Address
    function getIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ipAddr=$_SERVER['REMOTE_ADDR'];
        }
        return $ipAddr;
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Caveat' rel='stylesheet'>
  <style>
    
	body {
background-image: url("canteen_bg.jpg");
background-repeat: no-repeat;
background-position: left top;
background-attachment: fixed;
background-size: cover;
}

.main{
width: 350px;
height: 420px;
background-repeat: no-repeat;
background-position: left top;
background-attachment: fixed;
background-size: cover;
color: #000;
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
box-sizing: border-box;
padding: 70px 30px;
}

.logo{
width: 100px;
height: 100px;
border-radius: 50%;
position: absolute;
top: -50px;
left: calc(50% - 50px);
}

.main input{
width: 100%;
margin-bottom: 20px;
}

.main label{
margin: 0;
padding: 0;
font-size:25px;
font-weight: bold;
font-family: 'Caveat';
}

h1{
margin: 0;
/* padding: 0 0 20px; */
text-align: center;
font-size: 30px;
font-weight: bold;
font-family: 'Caveat';
}

.main input[type="text"], input[type="password"]
{
border: none;
border-bottom: 2px solid #f00;
background: transparent;
outline: none;
height: 50px;
color: #000;
font-size: 15px;
}

.main input[type="submit"]
{
border: none;
outline: none;
height: 40px;
background: #fb2525;
color: #fff;
font-size: 20px;
border-radius: 20px;
}
.form1{
  background-color:white;
  opacity: 0.7;
  border-radius:15px;
  padding: 16px;
  position: relative;
  top:-15%;
}

.main input[type="submit"]:hover
{
cursor: pointer;
background: yellow;
color: #000;
}

.main a{
text-decoration: none;
font-size: 14px;
line-height: 25px;
color: red;
}

.main a:hover
{
color: green;
}

	</style>
  </head>
  <body>
  <div id="result" style = "color:red; text-align: center; font-size: 20px; font-weight:bolder;"><?php echo $msg?></div>
    <div class="main">
      <!-- <img src="logo.jpg" class="logo"> -->
      <form class="form1" action="#" method="post">        
        <h1 style="color:black;" > Restaurant Management System</h1><br>

        <label for="username">Username </label><br>
        <input type="text" id="username" name="userName" placeholder="Enter Username" required>
        <br><br>

        <label for="password">Password </label><br>
        <input type="password" id="password" name="password" placeholder="********" required>
        <br><br>

        <input type="submit" value="Sign In" name="submit">
        
      </form>
    </div>



  </body>
</html>





<!-- Reference - https://phpgurukul.com/how-to-limit-login-attempt-using-php-and-mysql/  -->