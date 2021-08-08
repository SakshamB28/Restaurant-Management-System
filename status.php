<?php
$conn = mysqli_connect("localhost", "root", "", "restaurant_system") or die("Connection Error: " . mysqli_error($conn));
$result = mysqli_query($conn, "SELECT * FROM order_details where Status='0' ORDER BY timestamp DESC ");
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
<form action="confirmed.php" method='post'>
<fieldset style="border:solid 5px;">
  <legend>Item Orders</legend>
	<table style="border:solid">
    <tr>
      <th style="text-align:right">Address</th>
    </tr>
		<tr>
			<td>
      
          <?php
          $i=0;
          $result = mysqli_query($conn, "SELECT * FROM order_details where Status='0'and d_address LIKE '%' ORDER BY timestamp DESC ");?>
          <td style="border:none;border-right: solid; border-left: solid;"> Name</td> <td style="border:none;border-right: solid;">Item Name</td> <td style="border-right:solid;">Quantity</td> <td style="border:none;border-right: solid;">Location</td>
          <?php
          while($row = mysqli_fetch_array($result)) {
          ?>
          <tr style="border:none; border-right:solid;">
            
            <td style="border:none;border-right: solid;"><input type="checkbox" name="<?=$row["Order_id"];?>"  > </td><td style="border:none;border-right: solid;"><?=$row["username"];?></td style="border:none;border-right: solid;"> <td style="border:none;border-right: solid;"> <?=$row["item_name"];?></td> <td style="border-right:solid;"><?=$row["item_qty"];?></td> <td style="border:none;border-right: solid;"><?=$row["d_address"]?></td>

          </tr>
          <?php
          $i++;
          }
          ?>
      </td>
    </tr>
  </table>
<br>
<br>
<button type="submit" class="button"> Confirm </submit>
</fieldset>

</form>
</div>
<br>


<?php
mysqli_close($conn);
?>
</body>
</html>