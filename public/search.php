<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "root", "footballdb");
$sql = "SELECT * FROM player WHERE FullName LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	<tr>
		          <td>".$row['PlayerID']."</td>
		          <td>".$row['FullName']."</td>
		          <td>".$row['Position']."</td>
		          <td>".$row['Nationality']."</td>
		          <td>".$row['Number']."</td>
		        </tr>";
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>