<!DOCTYPE html>
<html>
<head>
	<title>Books Home</title>
	<style type="text/css">
		#container{
			margin: 0 auto;
			width:700px;
		}
		.column{
			height:400px;
			width:300px;
			padding:10px;
			margin:0;
			border:1px solid black;
			display:inline-block;
			vertical-align:top;
		}
		p{
			margin:0;
		}
		.books{
			overflow:scroll;
			border:1px solid black;
			height:150px;
			width:250px;
			padding:10px;
		}
		#header{
			float:right;
		}
		#header ul li{
			display:inline;
			text-align:right;
			float:left;
			margin:5px;
		}
		#header ul{
			margin:0;
			padding:0;
			list-style-type: none
		}
	</style>
</head>
<body>
<?php echo validation_errors();?>

	<div id="container">
			<div id="header">
			<ul>
				<li><a href="/welcomeUser/">Home</a></li>
				<li><a href="/books/addpage/">Add Book and Review</a></li>
				<li><a href="/logout/">Logout</a></li>
			</ul>
		</div>
		<h2>Welcome, <?=$userdata['alias']?>!</h2>
		<div class="column">
				<h4>Recent Book Reviews</h4>
				<?php foreach($recent as $recentReview){
					echo "<div class='recentReview'><a href='/books/bookprofile/"
					.$recentReview['book_id'].
					"/'>"
					.$recentReview['title'].
					"</a><p>Rating: "
					.$recentReview['stars'].
					" stars.</p><p><a href='/userprofile/"
					.$recentReview['id'].
					"/'>"
					.$recentReview['alias'].
					"</a>says: "
					.$recentReview['content'].
					"</p><p>Posted on:"
					.$recentReview['date'].
					"</p><br></div>";
					} ?>
		</div>
		<div class="column">
			<h4>Other Books with Reviews</h4>
			<div class="books">
				<?php foreach($allReviews as $review){
					echo "<div class='review'><a href='/books/bookprofile/"
					.$review['book_id'].
					"/'>"
					.$review['title'].
					"</a><p>Rating: "
					.$review['stars'].
					" stars.</p><p><a href='/userprofile/"
					.$review['id'].
					"/'>"
					.$review['alias'].
					"</a>says: "
					.$review['content'].
					"</p><p>Posted on:"
					.$review['date'].
					"</p><br></div>";
					} ?>
			</div>
		</div>
	</div>
</body>
</html>