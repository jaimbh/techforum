<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>TechForum</title>
</head>
<body>
<?php include 'partials/_dbconnect.php'; ?>
<?php include 'partials/_header.php'; ?>
<?php
$id = $_GET['threadid'];

$sql = "select * from threads where thread_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(empty($row)){
	echo '<h1 class="text-center p-5">Invalid Page</h1>';
	return false;
}

$title = $row['thread_title'];
$desc = $row['thread_desc'];
$thread_user = $row['thread_user'];
$posted_at = $row['timestamp'];

$sql2 = "select username from `users` where username='$thread_user'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$posted_by = $row2['username'];

$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST'){
	$comment = htmlspecialchars(trim($_POST['comment']));
	$comment_by = $_SESSION['username'];
	
	$sql = "insert into `comments` (`comment_content`, `thread_id`, `comment_by`) values ('$comment', '$id', '$comment_by')";
	$result = mysqli_query($conn, $sql);

	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success! </strong> Your comment has been added.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';
}
?>

<div class="container bg-light mb-4" style="overflow-wrap: break-word;">
	<div class="container p-5">
		<?php
		if(empty($_GET['edit'])){
			echo '
			<h4>
				'.$title;
				
				if(isset($_SESSION['username']) && $_SESSION['username'] == $posted_by && empty($_GET['edit'])){
					echo '<a href="'.$_SERVER['REQUEST_URI'].'&edit=1"><input class="btn btn-success mx-2" type="button" value="Edit"></a>';
				}
			
			echo '
			</h4><hr>
			<p>'.nl2br($desc).'</p>';
			
		}else{
			echo '<form method="post" action="/forum/partials/_handleask.php">
			<div class="mb-3">
				<label for="qtitle" class="form-label">Question Title</label>
				<input type="text" class="form-control" name="title" value="'.$title.'">
			</div>
			<div class="mb-3">
				<label for="message" class="form-label">Body</label>
				<textarea class="form-control" rows="14" name="body">'.$desc.'</textarea>
			 </div>
			<input type="hidden" value="'.$id.'" name="threadid">
			<input type="submit" name="edit" class="btn btn-primary" value="Save">
		</form>';
		}
		?>
		
	</div><hr>
	<p style="text-align:right">Posted by: <b><?php echo $thread_user; ?></b> at <?php echo $posted_at; ?></p>
</div>

<?php
if(!empty($_SESSION['username'])){
	echo '<div class="container">
		<h3>Post a comment</h3>		
		<div class="accordion-item">
			<h2 class="accordion-header" id="commentSection">
			<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#commentForm" aria-expanded="false" aria-controls="commentForm">
			    Click to add a comment
			</button>
			</h2>
			<div id="commentForm" class="accordion-collapse collapse" aria-labelledby="commentSection" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<form action="'.$_SERVER["REQUEST_URI"].'" method="post">
						<div class="mb-3">
						    <textarea class="form-control" id="comment" name="comment" rows="9" placeholder="Type your comment here..." required></textarea>
						</div>
						<button type="submit" class="btn btn-success">Post comment</button>
					</form>
				</div>
			</div>
		</div>
		
	</div>';
	
}else{
	echo '<div class="container">
			<p><b>You are not logged in. Please login to be able to post a comment.</b></p>
		</div>';
}
?>

<div class="container" id="ques" style="min-height:200px">
	<hr>
	<h3>Discussions:</h3>
	<?php
	$id = $_GET['threadid'];
	$sql = "select * from comments where thread_id = $id";
	$result = mysqli_query($conn, $sql);
	$noResult = true;
	while($row = mysqli_fetch_assoc($result)){
		$noResult = false;
		$id = $row['comment_id'];
		$content = $row['comment_content'];
		$comment_time = $row['timestamp'];
		$comment_by = $row['comment_by'];

		$sql2 = "select * from `users` where username='$comment_by'";
		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($result2);

		echo '<div class="container my-3 bg-light">
				<div class="d-flex p-1">
					<img src="https://cdn.pixabay.com/photo/2016/11/18/23/38/child-1837375_960_720.png" alt="John Doe" class="flex-shrink-0 me-3 mt-3 rounded-circle" style="width:60px;height:60px;">
					<div>
						<h6 class="mt-0">'.$row2['username'].' at '.$comment_time.'</h6>
						'.nl2br($content).'
					</div>
				</div>
			  </div><hr>';
	}
	
	if($noResult){
		echo '<h4 class="mb-5">No comments found</h4>';
	}
	?>
</div>

<?php include 'partials/_footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>