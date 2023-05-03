<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>TechForum - Ask Question</title>
</head>
<body>
<?php include 'partials/_header.php'; ?>
<?php include 'partials/_dbconnect.php'; ?>

<div class="container bg-light my-1">
	<div class="row">
		<div class="col-md-12">
		<form method="post" action="/forum/partials/_handleask.php">
			<div class="mb-3">
				<label for="qtitle" class="form-label">Question Title</label>
				<input type="text" class="form-control" id="qtitle" name="title" placeholder="e.g. How to find the index number in an array?">
			</div>
			<div class="mb-3">
				<label for="message" class="form-label">Body</label>
				<textarea class="form-control" id="message" rows="14" name="body" placeholder="Elaborate your issue in brief"></textarea>
			 </div>
			<input type="submit" name="ask" class="btn btn-primary" value="Submit">
		</form>
		</div>
	</div>
</div>

<?php include 'partials/_footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>