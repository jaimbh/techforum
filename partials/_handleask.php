<?php
$showError = 'false';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
	session_start();
    $title = htmlspecialchars(trim($_POST['title']));
    $body = htmlspecialchars(trim($_POST['body']));
	$user = $_SESSION['username'];
	
    // Check whether user logged in
	if(!empty($_SESSION['username'])){
		if(empty($title) || empty($body)){
			$showError = 'Error: Question Title and Body cannot be blank';
			
		}else{
			if(!empty($_POST['ask'])){
				mysqli_query($conn, "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_user`) VALUES ('$title', '$body', '$user');");
				header("Location: /forum/index.php?asksuccess=true");
				
			}elseif(!empty($_POST['edit'])){
				$threadid = $_POST['threadid'];
				mysqli_query($conn, "UPDATE `threads` SET `thread_title` = '$title', `thread_desc` = '$body' WHERE `threads`.`thread_id` = '$threadid';");
				header("Location: /forum/thread.php?threadid=$threadid");
			}
			
			exit;
		}
		
	}else{
		$showError = 'Error: User not logged in';
	}
	
    header("Location: /forum/ask.php?asksuccess=false&error=$showError");
}