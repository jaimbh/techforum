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

<div class="container my-3" id="main" style="min-height:500px">
	<h3>Search results for "<?php echo $_GET['search']; ?>"</h3>
	<?php
	$noresults = true;
	$query = $_GET['search'];
	$where = "WHERE thread_title LIKE '%$query%' OR thread_desc LIKE '%$query%'";
	$sql = 'SELECT * FROM threads '.$where.'  ORDER BY timestamp DESC';

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){
		$title = $row['thread_title'];
		$desc = $row['thread_desc'];
		$thread_id = $row['thread_id'];
		$url = "thread.php?threadid=".$thread_id;

		// display the search results
		echo '<div class="my-1">
		<a title="Click to reply/view replies" style="text-decoration:none" href="'.$url.'">
				<div class="card bg-light" style="width: 70rem;">
					<div class="card-body">
						<h6>'.$title.'</h6>
						<p class="text-dark">'.substr($desc, 0, 150).'.....</p>
						<h6 class="text-dark" style="text-align:right">'.$row['thread_user'].' at '.$row['timestamp'].'</h6>
					</div>
				</div>
			</a>
		</div>';
		
		$noresults = false;
	}
	
	if($noresults){
		echo '<div class="container">
				<h1>No results found</h1>
				<p>Suggestions:</p>
				<ul>
					<li>Check the spellings</li>
					<li>Try different keywords</li>
					<li>Try more general keywords</li>
				</ul>
			</div>';
	}
	?>
</div>

<?php include 'partials/_footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>