<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    $username = $_POST['username'];
    $pass = $_POST['loginPass'];
    $sql = "select * from users where username = '$username'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
	
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['username'] = $username;
			header("location: /forum");
			
        }else{
			echo "<script>
			alert('Invalid credentials!');
			window.location = '/forum';
			</script>";
		}
		
    }else{
		echo "<script>
		alert('Invalid credentials!');
		window.location = '/forum';
		</script>";
	}	
}