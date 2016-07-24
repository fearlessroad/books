<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<style type="text/css">
		#container{
			margin: 0 auto;
			width:700px;
			padding:10px;
		}
		.column{
			height:400px;
			width:300px;
			padding:10px;
			margin:0;
			display:inline-block;
			vertical-align:top;
		}
		p, h4, h5{
			margin:5px;
			font-weight:normal;
		}
		.review{
			border-top:1px solid black;
		}
		br{
			margin:10px;
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

	<div id="container">
		<div id="header">
			<ul>
				<li><a href="/welcomeUser/">Home</a></li>
				<li><a href="/books/addpage/">Add Book and Review</a></li>
				<li><a href="/logout/">Logout</a></li>
			</ul>
		</div>
		<h4>User Alias:<?= $thisData['alias']?></h4><br>
		<h5>Name:<?= $thisData['name']?> </h5>
		<h5>Email: <?=  $thisData['email']?></h5>
		<h5>Total Reviews: <?= $number['number']?></h5><br>
		<h4>Posted Reviews on the following books</h4>
		<ul>
		<?php foreach($reviewData as $Book){ echo "<li><a href='/bookprofile/".$Book['id']."'>".$Book['title']."</a></li>";
		}?>
		</ul>
	</div>
</body>
</html>