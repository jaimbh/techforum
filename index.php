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

<div class="container mt-3" style="max-width:100%">
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col">
					<h3>Top Questions</h3>
				</div>
			</div>
			
			<?php	
				$sql = "SELECT * FROM threads ORDER BY timestamp DESC";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_assoc($result)){
					echo '<div class="m-2">
					<a title="Click to reply/view replies" style="text-decoration:none" href="thread.php?threadid='.$row['thread_id'].'">
							<div class="card bg-light" style="width: 60rem;">
								<div class="card-body">
									<h6>'.$row['thread_title'].'</h6>
									<p class="text-dark">'.substr($row['thread_desc'], 0, 130).'....</p>
									<h6 class="text-dark" style="text-align:right">'.$row['thread_user'].' at '.$row['timestamp'].'</h6>
								</div>
							</div>
						</a>
					</div>';
				}
			?>
		</div>
		<div class="bg-light col-md-3">
			<h3>Tech News</h3>
			<?php
				$url = 'http://api.mediastack.com/v1/news?access_key=bff20e7b5b798bb4e5777bead9f87ab4&categories=technology';
				$response = file_get_contents($url);
				$data = json_decode($response, true);

				if(!empty($data)){
					echo '<ul>';
					foreach ($data['data'] as $article) {
						echo '<li><a style="text-decoration:none" href='.$article['url'].' target="_blank">'.$article['title'].'</a></li>';
					}
					echo '</ul>';
				}
			?>
		</div>
	</div>
</div>
<?php include 'partials/_footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

</body>
</html>