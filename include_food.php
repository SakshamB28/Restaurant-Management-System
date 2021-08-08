<?php
$conn = mysqli_connect("localhost", "root", "", "restaurant_system") or die("Connection Error: " . mysqli_error($conn));
$result = mysqli_query($conn, "SELECT * FROM food_items ");
?>
<html>
<head>
<style type="text/css">
.button{
				display: inline-block;
  line-height: 50px;
  padding: 0 50px;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
  cursor: pointer;
  font-size: 18px;
  color: #fff;
  font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  background: rgb(55, 214, 82);
		}
		.button:hover{
			background: rgb(47, 146, 55);
		}
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
<form action="include.php" method='post'>
<fieldset style="border:solid 5px ; ">

  <legend style="align:center">Items Available</legend>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>

  <div style="float:bottom;  margin-top:50px; margin-left:50px"><input type="checkbox" name="<?=$row["item_name"];?>"  > <?=$row["item_name"];?> <br></div>
<?php
$i++;
}
?>
<br>
<br>
<center><button type="submit" class="button"> submit  </submit>
</fieldset>
</div>
</form>
<br>


<?php
mysqli_close($conn);
?>
