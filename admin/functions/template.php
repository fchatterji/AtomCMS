<?php

function nav_main($connection, $page_id) {
  	$query = "SELECT * FROM pages";
	$result = mysqli_query($connection, $query);

	while($nav = mysqli_fetch_assoc($result)) { ?>
		
		<li <?php if($page_id == $nav['id']) { echo'class="active"'; } ?>><a href="?page=<?php echo $nav['id']; ?>"><?php echo $nav['label']; ?></a></li>
	
	
	<?php }

}


?>