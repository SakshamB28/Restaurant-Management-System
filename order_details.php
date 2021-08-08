<?php
session_start();
?>

<html>
<title></title>
<style>

.button:hover{
			background: rgb(47, 146, 55);
		}
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body style="background: -webkit-gradient(linear, left bottom, left top, from(#b0ceff), to(#b0ceff));
  background: -webkit-linear-gradient(bottom, #b0ceff 0%, #b0ceff 100%);
  background: -moz-linear-gradient(bottom, #b0ceff 0%, #b0ceff 100%);
  background: -o-linear-gradient(bottom, #b0ceff 0%, #b0ceff 100%);
  background: linear-gradient(to top, #b0ceff 0%, #b0ceff 100%);
   background: -webkit-gradient(linear, left bottom, right top, from(#b0ceff), to(#b0ceff));
  background: -webkit-linear-gradient(bottom left, #b0ceff 0%, #b0ceff 100%);
  background: -moz-linear-gradient(bottom left, #b0ceff 0%, #b0ceff 100%);
  background: -o-linear-gradient(bottom left, #b0ceff 0%, #b0ceff 100%);
  background: linear-gradient(to top right, #b0ceff 0%, #b0ceff 100%);">
  <div style="background-color:white;">
<div id="div1" >
<table border="1">
<caption> Orders </caption>
<tr>
<th>Item_name</th>
<th>QTY</th>
<th>Time</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "restaurant_system");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT *  FROM order_details where Status='0' and username= '" . $_SESSION["userid"] . "' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  $temp1 = substr($row["timestamp"],11,9);
echo "<tr><td>" . $row["item_name"]. "</td><td>".$row["item_qty"]."</td><td>".$temp1."</td>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</div>

<div id="div2" style="display: none;">
<table border="1">
<caption> Orders </caption>
<tr>
<th>Item_name</th>
<th>QTY</th>
<th>Time</th>
<th>Date </th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "restaurant_system");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT *  FROM order_details where username= '" . $_SESSION["userid"] . "' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  $temp1 = substr($row["timestamp"],11,9);
  $temp2= substr($row["timestamp"],0,10);
echo "<tr><td>" . $row["item_name"]. "</td><td>".$row["item_qty"]."</td><td>".$temp1."</td><td>".$temp2."</td>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>



</table>


<br>
<br>

</div>
  <button onclick="fun1()" id="but1" style="	display: inline-block;align:center;
line-height: 50px;
padding: 0 50px;
-webkit-transition: all 0.4s ease;
-o-transition: all 0.4s ease;
-moz-transition: all 0.4s ease;
transition: all 0.4s ease;
cursor: pointer;
font-size: 18px;
color: white;
font-family: Poppins, Arial, Helvetica Neue, sans-serif;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
background: rgb(55, 214, 82);" > All order details</button>

  <button onclick="fun2()" id="but2" style="display: none;
line-height: 50px;
padding: 0 50px;
-webkit-transition: all 0.4s ease;
-o-transition: all 0.4s ease;
-moz-transition: all 0.4s ease;
transition: all 0.4s ease;
cursor: pointer;
font-size: 18px;
color: white;
font-family: Poppins, Arial, Helvetica Neue, sans-serif;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
background: rgb(55, 214, 82);"> Ongoing order details</button>
</div>
  <script>
    function fun1()
    {
      document.getElementById("div1").style.display = "none";
      document.getElementById("div2").style.display = "inline";
      document.getElementById("but1").style.display = "none";
      document.getElementById("but2").style.display = "inline";
    }
    function fun2()
    {
      document.getElementById("div2").style.display = "none";
      document.getElementById("div1").style.display = "inline";
      document.getElementById("but2").style.display = "none";
      document.getElementById("but1").style.display = "inline";
    }
  </script>
</body>
</html
