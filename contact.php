<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Contact Us</title>
		<!-- <link rel="stylesheet" href="contactus.css"> -->
        <style>
            input[type=text], select, textarea {
                width: 40%; /* Full width */
                padding: 12px; /* Some padding */ 
                border: 1px solid #ccc; /* Gray border */
                border-radius: 4px; /* Rounded borders */
                box-sizing: border-box; /* Make sure that padding and width stays in place */
                margin-top: 6px; /* Add a top margin */
                margin-bottom: 16px; /* Bottom margin */
                resize: vertical; /* Allow the user to vertically resize the textarea (not horizontally) */
            }
            input[type=submit] {
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type=submit]:hover {
                background-color: #45a049;
            }
            .contactus {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }           

            h1{
                background-color: aquamarine;
                padding: 0 20px;
            } 
            ul
            {
            margin: 0px;
            padding:0px;
            list-style: none;
            text-decoration-color: #0033cc;
            }
            ul li
            {
            float: right;
            width: 150px;
            height: 40px;
            background-color: black;
            opacity: .8;
            line-height: 40px;
            text-align: center;
            font-size: 20px;
            margin-right: 2px;
            border:2px solid green;
            border-radius:8px;
            }
            ul li a
            {
            text-decoration: none;
            color: white;
            display: block;
            }
            ul li a:hover
            {
            background-color: green;
            border-radius:4px;
            }
        </style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
    <body>
        <h1>Contact Us</h1>        
        <div class="contactus">            
            <form class = >
                <label style = "margin-right:30px;" for="fullname">Name</label>
                <input type="text" id="fullname" name="firstname" placeholder="Your name..">
                <br>
                <!-- <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                <br> -->
                <label style = "margin-right:40px;" for="city">City</label>
                <input type="text" id="city" name="city" placeholder="Your city..">                
                <br>                
                <label for="city">Phone No.</label>
                <input type="text" id="phn" name="phn" placeholder="Your phone no..">                
                <br>
                <label for="subject">Subject</label><br>
                <textarea style = "margin-left:70px;" id="subject" name="subject" placeholder="Write something.." style="height:100px"></textarea>
                <br>
                <input type="submit" value="Submit" onclick="disp()">
                
            </form>
        </div>
        <div>
            <p id="p1"></p>
            <!-- <p id="p1"></p>
            <p id="p1"></p> -->
        </div>        
        <script>
            function disp()
            {
                var nm = document.getElementById('fullname').value;
                var ct = document.getElementById('city').value;
                var sub = document.getElementById('subject').value;
                // document.getElementById('p1').innerHTML = nm;            
                document.write(nm+"</br>");
                document.write(ct+"</br>");
                document.write(sub+"</br>");
            }
        </script>
    </body>