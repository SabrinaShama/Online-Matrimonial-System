<?php
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	$output = '';  
	$sql = "SELECT a.id AS id, b.id AS id2, a.interested_by AS Person1, a.interested_in AS Person2, a.interested_by_user AS User1, a.interested_in_user AS User2 
			FROM interested as a INNER JOIN interested as b 
			ON a.interested_by = b.interested_in AND a.interested_in = b.interested_by AND a.interested_by < b.interested_by"; 
	$result = mysqli_query($db, $sql);  
	$output .= '  
		<div class="table-responsive">  
			<table class="table table-bordered">  
				<tr>  
                    <th width="12.5%">User One</th>
					<th width="25%">User One Name</th>
					<th width="12.5%">User Two</th>
					<th width="25%">User Two Name</th>
                    <th width="25%">Let Them Connect?</th>  
                </tr>';  
	if(mysqli_num_rows($result) > 0)  
	{  
		while($row = mysqli_fetch_array($result))  
		{  
			$output .= '  
                <tr>                      
					<td class="person" data-id1="'.$row["id"].'" >'.$row["Person1"].'</td>
					<td class="person" data-id2="'.$row["id"].'" >'.$row["User1"].'</td>
					<td class="person" data-id3="'.$row["id"].'" >'.$row["Person2"].'</td>
					<td class="person" data-id4="'.$row["id"].'" >'.$row["User2"].'</td>
                    <td><button type="button" name="contact_btn" data-id3="'.$row["id"].'" class="btn btn-xm btn-success btn_contact">Okay</button></td>  
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