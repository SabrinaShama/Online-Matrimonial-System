<?php
	session_start();
	
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	$output = '';
	$id = $_SESSION['id'];
	$result = mysqli_query($db, "SELECT profile.id, profile.username, profile.image FROM interested JOIN profile ON interested.interested_by = profile.id AND interested.interested_in = '$id'");
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
                    <tr><button type="button" name="interest_btn2" id="interest_btn2" class="btn btn_interest2" data-id1="'.$rownew["id"].'"><img src="./profileimage/'.$rownew['image'].'" /></button></tr> 
                </td>  
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