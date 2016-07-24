<!DOCTYPE html>
<html>
<head>
	<title>Review a Book</title>
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
			display:inline-block;
			vertical-align:top;
		}
		p, h4{
			margin:10px;
		}
		.review{
			border-top:1px solid black;
		}
		button{
			background-color:white;
			padding:5px;
			float:right;
			margin-right:40px;
		}
		button:hover{
			background-color:green;
		}
		textarea{
			height:75px;
			width:250px;
			padding:5px;
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
		<div id="header">
			<ul>
				<li><a href="/welcomeUser/">Home</a></li>
				<li><a href="/books/addpage/">Add Book and Review</a></li>
				<li><a href="/logout/">Logout</a></li>
			</ul>
		</div>
	<div id="container">
		<h4><?=$bookInfo['title']?></h4>
		<p>Author: <?= $bookInfo['name']?></p>
		<div class="column">
		<h4>Reviews</h4>

		<?php foreach($reviewInfo as $review){
			echo "<div class='review'><p>Rating:".$review['stars']."</p><p><a href='/userprofile/".$review['user_id']."/'>".$review['alias']."</a> says: " .$review['content']."</p><p>Posted on ".$review['date']."</p></div>";
		}?>
		</div>
		<div class="column">
			<h4>Add a Review</h4>
			<form action = "/books/addReviewWithId/<?=$bookInfo['id']?>" method="post">
				<textarea></textarea>
				<p>Rating:
					<select>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select> stars.</p>
				<button>Submit Review</button>
			</form>
		</div>
	</div>
</body>
</html>