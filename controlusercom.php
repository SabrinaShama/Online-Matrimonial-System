<?php
	session_start();
	
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	$output = '';
	$id = $_SESSION['id'];
	$result = mysqli_query($db, "SELECT profile.id, profile.username, profile.image, profile.name, profile.mobile, profile.reg_id, registration.email 
								FROM connecteduser 
								JOIN profile 
								ON (connecteduser.person1 = profile.id AND connecteduser.person2 = '$id') OR (connecteduser.person2 = profile.id AND connecteduser.person1 = '$id')
								JOIN registration
								ON profile.reg_id = registration.id");
	$output .= '  
		<div class="table-responsive">  
			<table class="table table-bordered" id="contable">  
                <tr> 
                    <th width="25%">Name</th>  
                    <th width="25%">Profile Image</th>
					<th width="25%">Mobile</th>
					<th width="25%">Email</th> 
                </tr>';  
	if(mysqli_num_rows($result) > 0)  
	{  
		while($rownew = mysqli_fetch_array($result))  
		{  
			$output .= '  
                <tr>
                    <td class="name" data-id1="'.$rownew["id"].'">'.$rownew["name"].'</td>  
                    <td class="image" data-id2="'.$rownew["id"].'"><img src="./profileimage/'.$rownew['image'].'" /></td>
					<td class="mobile" data-id3="'.$rownew["id"].'">'.$rownew["mobile"].'</td>
					<td class="email" data-id3="'.$rownew["id"].'">'.$rownew["email"].'</td>
                </tr>  
			';  
		}
	}  
	else  
	{  
		$output .= '
			<td>  
                <tr colspan="4">Noone interested in you</tr>  
            </td>';  
	}  
	$output .= '</table>  
		</div>';  
	echo $output;
?>