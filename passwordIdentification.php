
<?php
echo "Php called";
$link = mysqli_connect('localhost', 'root', '')
    or die('Could not connect: ' . mysql_error());
echo '<br>Connected successfully<br>';
$query = 'SELECT * FROM register_table';
mysqli_select_db($link,'ucproject') or die('Could not select database');
$array_pass=[];
$array_name=[""];
$i=0;
$pass=[123456789,987654321,147258369,321654987,369258147,963852741,789456123,741852963];
$results = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
if ( mysqli_num_rows($results) > 0 ) {
		

		while($row = mysqli_fetch_assoc($results)):
		{
			array_push($array_name,$row['company_name']);
			array_push($array_pass,$row['password']);

		}
		endwhile;
}
echo "<br>".$array_name[0]." || ".count($pass)."<br>";
echo "<table>";
while($i<count($array_name)):
{
	echo "<tr>";
	echo "<td> || ".$array_name[$i]." ||  </td>";
	echo "<td> || ".$array_pass[$i]." ||  </td>";
	//echo join(" ",$array_name);
	echo "<td> || ".$pass[$i]." ||  </td>";
	$passwordv=md5($pass[$i]);
	echo "<td> || ".$passwordv." ||  </td>";
	echo "</tr>";
	$i++;
}
endwhile;
echo "</table>";
echo "<br>".join(" || ",$array_name);
echo "<br>".join(" || ",$array_pass);
mysqli_free_result($results);
mysqli_close($link);

?>