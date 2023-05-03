<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>TechForum - Contact Us</title>
</head>
<body>
<?php include 'partials/_header.php'; ?>
<div class="container bg-light" style="min-height:512px">
	<div class="row">
		<div class="col-md-12">
			<h1>Contact Us</h1>
			<p>Feel free to reach out to us with any questions or feedback you have about our website.</p>
			<div class="mb-3">
				<label for="name" class="form-label">Name</label>
				<input type="text" class="form-control" id="name" placeholder="Enter your name">
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email address</label>
				<input type="email" class="form-control" id="email" placeholder="Enter your email">
			</div>
			<div class="mb-3">
				<label for="message" class="form-label">Message</label>
				<textarea class="form-control" id="message" rows="5"></textarea>
			 </div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</div>
<?php include 'partials/_footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>