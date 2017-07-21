<?php

include("include/connection.php");
include("functions/function.php");
session_start();


?>




<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>welcome user</title>
</head>
<body>
	<h1>welcome <?php echo $_SESSION['user_email']; ?></h1>
	<ul>
		<li><a href="home.php">HOME</a></li>
		<li><a href="member.php">MEMBER</a></li>
		<strong>TOPICS:</strong>
		<?php

		$get_topics = "select * from topics";
		$run_topics = mysqli_query($con,$get_topics);

		while($row = mysqli_fetch_array($run_topics))
		{
			$topic_id = $row['topic_id'];
			$topic_title = $row['topic_title'];

			echo "<li><a href='home.php?topic='$topic_id'>$topic_title'</a></li>";
		}

		?>

		<form method="get" action="result.php">
			<input type ="text" name="user-query" placeholder="search a topic">
			<input type ="submit" name="search" value="search" />
		</form>

		<?php
			$user = $_SESSION['user_email'];
			$get_user = "select * from users where user_email='$user'";
			$run_user = mysqli_query($con,$get_user);
			$row = mysqli_fetch_array($run_user);

			$user_id = $row['user_id'];
			$user_name = $row['user_name'];
			$user_email = $row['user_email'];
			$user_image = $row['user_email'];
			$user_country = $row['user_country'];
			$register_date = $row['register_date'];
			$last_login = $row['last_login'];

			echo "
					<p><img src='user/user_images/$user_image' width='200' height='200'/></p>
					<p>Name:$user_name</p>
					<p>Email:$user_email</p>
					<p>Country:$user_country</p>
					<p>Last login:$last_login</p>
					<p>Member Since:$register_date</p>

					<p><a href = 'my_message.php'>Messages</a></p>
					<p><a href = 'my_posts.php'>My Posts</a></p>
					<p><a href = 'edit_profile.php'>Edit My Profile</a></p>
					<p><a href = 'logout.php'>Logout</a></p>
					";
		  ?>
		  <p>


		  </p>
		  <form action="home.php?id=<?php echo $user_id;?>" method="post">
		  	<h2> whats your question........lets discuss</h2>
		  	<input type="text" name="title" placeholder="write a title">
		  	<textarea cols="50" rows="5" name="content"></textarea>
		  	<select name="topic">
		  		<option>Select topic</option>
		  		<?php getTopics(); ?>
		  		</select>
		  		<input type="submit" name="sub" value="post to timeline">
		  </form>

		  <?php insertPost(); ?>
		  <h3>most recent discussions</h3>
		  <?php get_posts(); ?>
	
</body>
</html>
