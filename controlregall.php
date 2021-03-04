<?php
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	$output = '';  
	$sql = "SELECT * FROM registration WHERE username != 'ADMIN' ORDER BY id ASC ";  
	$result = mysqli_query($db, $sql);  
	$output .= '  
		<div class="table-responsive">  
			<table class="table table-bordered">  
				<tr>  
                    <th width="20%">Id</th>  
                    <th width="40%">Username</th>  
                    <th width="40%">Email</th>
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