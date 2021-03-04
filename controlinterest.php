<?php
	session_start();
	
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	$output = '';
	$id = $_SESSION['id'];
	$result = mysqli_query($db, "SELECT profile.id, profile.username, profile.image FROM interested JOIN profile ON interested.interested_in = profile.id AND interested.interested_by = '$id'");
	$output .= '  
		<div class="table-responsive">  
			<table>  
                ';  
	if(mysqli_num_rows($result) > 0)  
	{  
		while($rownew = mysqli_fetch_array($result))  
		{  
			$output .= '  
                <td>   
                    <tr><button type="button" name="interest_btn" id="interest_btn" class="btn btn_interest" data-id1="'.$rownew["id"].'"><img src="./profileimage/'.$rownew['image'].'" /></button></tr> 
                </td>  
			';  
		}
	}  
	else  
	{  
		$output .= '
			<td>  
                <tr colspan="4">Not interested in anyone</tr>  
            </td>';  
	}  
	$output .= '</table>  
		</div>';  
	echo $output;
?>