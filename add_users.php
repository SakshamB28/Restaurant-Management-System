<?php


$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","","restaurant_system");
		if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
		// $result = mysqli_query($conn," insert into user values ('" . $_POST["userName"] . "','" . $_POST["password"] . "','" . $_POST["privilage"] . "','0')");


        $sql = "select * from user where username = '" .$_POST["userName"]."'";
        $retval = mysqli_query($conn,$sql);
        if(! $retval){
            printf("Error: %s\n", mysqli_error($conn));
            exit();
            // $result = mysqli_query($conn," insert into user values ('" . $_POST["userName"] . "','" . $_POST["password"] . "','" . $_POST["privilage"] . "','0')");
            // $message = "Username added successfully!!";
        }
        $row = mysqli_fetch_array($retval);
        if($row !== null && $row['username']==isset($_POST["userName"]))
        {        
            $message = "Username exists!!";
        }
        else{
            $rndm = rand(1,10000);
            $hashpass = $_POST["password"];
            $hash = md5($hashpass);
            // $result = mysqli_query($conn," insert into user values ('" . $_POST["userName"] . "','" . $_POST["password"] . "','" . $_POST["privilage"] . "','0')");
            // echo $hash;
            $un = $_POST["userName"];
            $pn = $_POST["phn"];
            $pr = $_POST["privilage"];
            $ct = $_POST["city"];
            $result = mysqli_query($conn," insert into user values ('$un','$hash','$pr','0')");
            $result1 = mysqli_query($conn," insert into details values ('$rndm','$un','$ct','$pn')");
            $message = "Username added successfully!!  User ID for '$un'  is $rndm" ;                        
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Enter User Details</h2>
                    <form name="frmUser" method="post" action="">
					<div class="message"><?php if($message!="") { echo $message; } ?></div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">User Name</label>
                                    <input class="input--style-4" type="text" name="userName" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <input class="input--style-4" type="text" name="city" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone No.</label>
                                    <input class="input--style-4" type="integer" name="phn" required pattern="[0-9]{10}">
                                </div>
                            </div>
                        </div>
						 <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">User Type</label>
                                    <input class="input--style-4" type="text" name="privilage" placeholder="privilage_type 1 for admin 0 for normal" required pattern="[0 | 1]{1}">
                                </div>
                            </div>

                        </div>

                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" value="Submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>



</html>
<!-- end document-->