<?php
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	$output = '';  
	$sql = "SELECT * FROM profile ORDER BY id ASC";  
	$result = mysqli_query($db, $sql);  
	$output .= '  
		<div class="table-responsive">  
			<table class="table table-bordered">  
				<tr>  
                    <th width="12%">Id</th>  
                    <th width="22%">Username</th>
					<th width="22%">Reports</th>
					<th width="22%">User Wants to be Removed?</th>
                    <th width="22%">Delete</th>  
                </tr>';  
	if(mysqli_num_rows($result) > 0)  
	{  
		while($row = mysqli_fetch_array($result))  
		{  
			$output .= '  
                <tr>  
                    <td>'.$row["id"].'</td>  
                    <td><button type="button" name="user_btn" id="user_btn" class="btn btn_user" data-id1="'.$row["id"].'">'.$row["username"].'</button></td>
					<td class="reported" data-id2="'.$row["id"].'">'.$row["reported"].'</td>
					<td class="deletepro" data-id3="'.$row["id"].'">';																	
																	if ($row["deletepro"]=="0"){ $del='No';}
																	else { $del='Yes'; } 
					$output .= ' 
					'.$del.' </td>
                    <td><button type="button" name="delete_btn" data-id4="'.$row["id"].'" class="btn btn-xm btn-danger btn_delete">x</button></td>  
                </tr>  
			';  
		}
	}  
	else  
	{  
		$output .= '
			<tr>  
                <td colspan="4">Data not Found</td>  
            </tr>';  
	}  
	$output .= '</table>  
		</div>';  
	echo $output;
?>