<?PHP
$sumrate = mysql_query("select sum(rating) as ratingx from products group by status");
$resum = mysql_fetch_array($sumrate);

$qproduct = mysql_query("select prodname ,rating from products order by rating DESC");
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
	<tr bgcolor="#b7acac" height="30">
		<td align="center" width="10%">ลำดับ</td>
		<td align="center" width="40%">ชื่อสินค้า</td>
		<td align="center" width="25%">วิว</td>
		<td align="center" width="25%">คิดเป็นเปอร์เซ็น</td>
	</tr>
<?php
while($reproduct = mysql_fetch_array($qproduct)){
	$m++;
	(int)$sumrat =  $resum[ratingx];
	$sumrating = $reproduct[rating]*100/$sumrat;
	$persent = number_format($sumrating,2);
	print "<tr>";
		print "<td align='center'>$m</td>";
		print "<td>$reproduct[prodname]</td>";
		print "<td align='center'>$reproduct[rating]</td>";
		print "<td align='center'>$persent %</td>";
	print "</tr>";
	
}
?>
</table>
