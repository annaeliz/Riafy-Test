
<?php
$db = new MySQLi("localhost", "root", "", "test");
foreach ($_GET as $key => $value) {
	$_GET[$key] = addslashes($value);
}

?><!DOCTYPE html>
<html>
<body style="font-family: arial; font-size: 12px;">
	<center>
	<h1>NSE Stocks</h1>

	<FORM METHOD = "GET" ACTION = "search2.php">
		<INPUT TYPE = "TEXT" NAME = "keywords" PLACEHOLDER = "Search Keywords" SIZE = "40">
		<INPUT TYPE = "SUBMIT" VALUE = "Go">
	</FORM>
	
    
	<?php
	


$sql = "SELECT * FROM `stock` where 1 ";


if(isset($_GET['keywords'])) {

	$arr = explode(" ", trim($_GET['keywords']) );
	foreach ($arr as $keyword) {
		
				$sql .= " AND (
							`Name`      LIKE '%$keyword%'
							OR  `Current Market Price` LIKE '%$keyword%' 
							OR  `Market Cap` LIKE '%$keyword%' 
							OR  `Stock P/E` LIKE '%$keyword%' 
							OR  `Dividend Yield` LIKE '%$keyword%' 
							OR  `ROCE %` LIKE '%$keyword%' 
							OR  `ROE Previous Annum` LIKE '%$keyword%' 
							OR  `Debt to Equity` LIKE '%$keyword%' 
							OR  `EPS` LIKE '%$keyword%'  
							OR  `Reserves` LIKE '%$keyword%' 
							OR  `Debt` LIKE '%$keyword%' 
							
					  ) ";
	}

}

$res = $db->query($sql);
$num = $res->num_rows;

print "<hr>Your search has $num results.<hr>";

	?>
	<table bgcolor = "red" cellpadding="6">
		<tr>

			<td>S.No.</td>
			<td>Name</td>
			<td>Current Market Price</td>
			<td>Market Cap</td>
			<td>Stock P/E</td>
			<td>Dividend Yield</td>
			<td>ROCE %</td>
			<td>ROE Previous Annum</td>
			<td>Debt to Equity</td>
			<td>EPS</td>
			<td>Reserves</td>
			<td>Debt</td>

		</tr>
		

<?php


$res = $db->query($sql);
while($row = $res->fetch_array()) :?>
	
	<script>
   $("$keyword").on('keyup', function(){
      var value = $(this).val().toLowerCase();
      $("$keyword").each(function () {
         if ($(this).text().toLowerCase().search(value) > -1) {
            $(this).show();
            $(this).prev('.Name').last().show();
         } else {
            $(this).hide();
         }
      });
   })
</script>
	
		<tr bgcolor = white>
			<td><?php echo $row[0];?></td>
			<td><?php echo $row[1];?></td>
			<td><?php echo $row[2];?></td>
			<td><?php echo$row[3];?></td>
			<td><?php echo$row[4];?></td>
			<td><?php echo$row[5];?></td>
			<td><?php echo$row[6];?></td>
			<td><?php echo$row[7];?></td>
			<td><?php echo$row[8];?></td>
			<td><?php echo$row[9];?></td>
			<td><?php echo$row[10];?></td>
			<td><?php echo$row[11];?></td>
		</tr>
		<?php endwhile;?> 

	<?php print '</table>';
?>
	</center>
</body>
</html>

