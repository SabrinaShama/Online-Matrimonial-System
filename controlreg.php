<?php
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	$output = '';  
	$sql = "SELECT * FROM permission ORDER BY id ASC";  
	$result = mysqli_query($db, $sql);  
	$output .= '  
		<div class="table-responsive">  
			<table class="table table-bordered">  
				<tr>  
                    <th width="20%">Id</th>  
                    <th width="20%">Username</th>  
                    <th width="20%">Email</th>
					<th width="20%">Password</th>
                    <th width="20%">Permit</th>  
                </tr>';  
	if(mysqli_num_rows($result) > 0)  
	{  
		while($row = mysqli_fetch_array($result))  
		{  
			$output .= '  
                <tr>  
                    <td>'.$row["id"].'</td>  
                    <td class="username" data-id1="'.$row["id"].'">'.$row["username"].'</td>  
                    <td class="name" data-id2="'.$row["id"].'">'.$row["email"].'</td>
					<td class="gender" data-id3="'.$row["id"].'">'.$row["password"].'</td>  
                    <td><button type="button" name="permit_btn" data-id4="'.$row["id"].'" class="btn btn-xm btn-success btn_permit">Okay</button></td>  
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