<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = strtolower(trim($_POST['username']));
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    // Check whether this username exists
    $existSql = "select * from `users` where username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
	
	if(preg_match('/[^A-Za-z0-9\-]/', $username)){
		$showError = 'Error: Special characters not allowed for Username';
				
	}elseif(!empty($username) && !empty($pass) && !empty($cpass)){
		if($numRows > 0){
			$showError = "Error: Username already in use";
			
		}else{
			if($pass == $cpass){
				$hash = password_hash($pass, PASSWORD_DEFAULT);
				$sql = "INSERT INTO `users` (`username`, `user_pass`, `timestamp`) VALUES ( '$username', '$hash', current_timestamp())";

				if(mysqli_query($conn, $sql)){
					header("Location: /forum/index.php?signupsuccess=true");
					exit;
				}
				
			}else{
				$showError = "Error: Passwords do not match";
			}
		}
		
	}else{
		$showError = "Error: Username and Password fields cannot be blank";
	}
	
    header("Location: /forum/index.php?signupsuccess=false&error=$showError");
}