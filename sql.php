<?php
	$q = $_RQUEST["q"];
	if($q == "1"){
		echo "
		<thead>
			<tr>
				<th>c1</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>one</td>
			</tr>
		</tbody>
		";
	}
	else if($q == "2"){
		echo "
		<thead>
			<tr>
				<th>c1</th>
				<th>c2</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>one</td>
				<td>two</td>
			</tr>
		</tbody>
		";
	}
	else if($q == "3"){
		echo "
		<thead>
			<tr>
				<th>c1</th>
				<th>c2</th>
				<th>c3</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>one</td>
				<td>two</td>
				<td>three</td>
			</tr>
		</tbody>
		";
	}
?>