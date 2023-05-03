<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="/forum">TechForum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="ask.php">Ask Question</a>
            </li>
        </ul>';
		
if(empty($_SESSION['username'])){
    echo  '<form class="d-flex" action="search.php" method="get">
    <input class="form-control me-1" type="search" name="search" placeholder="Search" aria-label="Search">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button type="button" class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
		
}else{
    echo '<form class="d-flex" action="search.php" method="get">
	<input class="form-control me-2" style="width:150px" type="search" name="search" placeholder="Search" aria-label="Search">
	<p class="text-light my-0"><b>Welcome '.$_SESSION['username'].'</b></p>
    <a href="partials/_logout.php" class="btn btn-success mx-1">Logout</a>';
}

echo '</form>
    </div>
</div>
</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

if(isset($_GET['signupsuccess'])){
	if($_GET['signupsuccess'] == 'true'){
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<center><strong>Success! </strong> You can now log in.</center>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			
	}else{
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<center><strong>'.$_GET['error'].'</center>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
	}
}

if(isset($_GET['asksuccess'])){
	if($_GET['asksuccess'] == 'true'){
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<center><strong>Success! </strong>Your question has been posted.</center>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			
	}else{
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<center><strong>'.$_GET['error'].'</center>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
	}
}