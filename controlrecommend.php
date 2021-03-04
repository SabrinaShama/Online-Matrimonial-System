<?php
	error_reporting(E_ALL ^ E_WARNING);
	session_start();
	
	$db = mysqli_connect('localhost', 'root', '', 'matrimonyinfo');
	$output = '';
	$gender = $_SESSION['gender'];
	$religion = $_SESSION['religion'];
	$age = $_SESSION['age'];
	$living = $_SESSION['living'];
	if( $gender == 'Male'){
		$result = mysqli_query($db, "SELECT * FROM profile WHERE gender='Female' AND religion = '$religion' AND (age = '$age' OR living = '$living')");
	}
	else if(  $gender == 'Female'){
		$result = mysqli_query($db, "SELECT * FROM profile WHERE gender='Male' AND religion = '$religion' AND (age = '$age' OR living = '$living')");
	}
	else{
		$result = mysqli_query($db, "SELECT TOP 0 0");
	}
	$output .= '  
		<div class="table-responsive">  
			<table>  
                ';  
	if($result || mysqli_num_rows($result) > 0)  
	{  
		while($rownew = mysqli_fetch_array($result))  
		{  
			$output .= '  
                <td>   
                    <tr><button type="button" name="recommend_btn" id="recommend_btn" class="btn btn_recommend" data-id1="'.$rownew["id"].'"><img src="./profileimage/'.$rownew['image'].'" /></button></tr> 
                </td>  
			';  
		}
	}  
	else  
	{  
		$output .= '
			<td>  
                <tr colspan="4">No one recommended</tr>  
            </td>';  
	}  
	$output .= '</table>  
		</div>';  
	echo $output;
?>