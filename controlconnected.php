<?php
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	$output = '';  
	$sql = "SELECT * FROM connecteduser ORDER BY id ASC"; 
	$result = mysqli_query($db, $sql);  
	$output .= '  
		<div class="table-responsive">  
			<table class="table table-bordered">  
				<tr>  
                    <th width="12%">Id</th>
					<th width="22%">User One</th>
					<th width="22%">User One Name</th>
					<th width="22%">User Two</th>
					<th width="22%">User Two Name</th>  
                </tr>';  
	if(mysqli_num_rows($result) > 0)  
	{  
		while($row = mysqli_fetch_array($result))  
		{  
			$output .= '  
                <tr>                      
					<td>'.$row["id"].'</td>
					<td class="person" data-id1="'.$row["id"].'" >'.$row["person1"].'</td>
					<td class="person" data-id2="'.$row["id"].'" >'.$row["person_name1"].'</td>
					<td class="person" data-id3="'.$row["id"].'" >'.$row["person2"].'</td>
					<td class="person" data-id4="'.$row["id"].'" >'.$row["person_name2"].'</td> 
                </tr>  
			';  
		}
	}  
	else  
	{  
		$output .= '
			<tr>  
                <td colspan="4">No data Available</td>  
            </tr>';  
	}  
	$output .= '</table>  
		</div>';  
	echo $output;
?>