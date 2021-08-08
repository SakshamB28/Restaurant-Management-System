<?php
$conn = mysqli_connect("localhost", "root", "", "restaurant_system") or die("Connection Error: " . mysqli_error($conn));
$result = mysqli_query($conn, "SELECT * FROM food_items where include='1'");
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
  <form action="confirmation.php" method='post'>
  <fieldset>
  <legend>Items Available</legend>
  <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
  ?>
  <div style="float:bottom;  margin-top:50px;">
  Cost of <?=$row["item_name"];?> is <?=$row["price"];?> <br>
  Enter quantity - <input type="number" name="<?=$row["item_name"];?>" value="0" min="0" > 
    
  </div>
  <?php
    $i++;
    }
  ?>

  <br><br>

  Delivery Location: <input type="text" id="delivery" name="delivery" required><br>
  <p id="demo"></p>
	<br><br>
  <center><button type="submit" class="button"> submit  </submit>
<!-- <center><button type="submit" class="button"><a href="confirmation.php">submit</a>   </submit> -->
<center><button type="button" class="button" onclick="checkFunc()"> Preview  </submit>
</fieldset>
</div>
</form>
<br>
<script>
  function checkFunc()
  {
    var loc = document.getElementById('delivery').value;
    document.getElementById("demo").innerHTML = "Your delivery location is "+loc;
  }
</script>
<center><a href="list_items.php"> <button class="button"> Menu </button> </a>

<?php
mysqli_close($conn);
?>
