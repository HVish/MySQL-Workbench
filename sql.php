<?php
	$q = $_POST["Query"];
	// Create connection
	$conn = new mysqli("localhost", "root", "","test");
	
	// Check connection
	if ($conn->connect_error) {
		echo "Mysql Connection Failed! Check Mysql service is running or not!";
	} 
	else{
		$result = $conn->query($q);
		if($result === TRUE){
			echo "Query executed successfully";
		}else if($result === FALSE){
			echo $conn->error;
		}
		else if($result->num_rows > 0){
			$rc = 0;
			$cc = 0;
			if($row = $result->fetch_assoc()){
				echo "<thead><tr>";
				foreach($row as $keys => $value){
					echo "<th>{$keys}</th>";
				}
				echo "</tr></thead><tbody>";
				
				echo "<tr>";
				foreach($row as $keys => $value){
					echo "<td>{$value}</td>";
				}
				echo "</tr>";
				while($row = $result->fetch_assoc()){
					echo "<tr>";
					foreach($row as $keys => $value){
						echo "<td>{$value}</td>";
					}
					echo "</tr>";
				}
				echo "</tbody>";	
			}
		}
	}
?>