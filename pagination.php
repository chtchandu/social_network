<?php
	
	$query = "select * from posts";

	$result = mysqli_query($con,$query);

	$total_posts = mysqli_num_rows($result);

	$total_pages = ceil($total_posts/$per_page);

	echo "<center><a href='home.php?page=1'>First page</a>";

	for($i=1;$i<=$total_pages;$i++)
	{
		echo "<a href='home.php?page=$i'>$i</a>";
	}

	echo "<a href='home.php?page=$total_pages'>Last page</a></center>"

?>