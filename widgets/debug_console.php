<div id="console-debug">

	<?php
		$all_vars = get_defined_vars();
	?>

	<h1>Get array</h1>
	<pre>
		<?php print_r($_GET); ?>
	</pre>

	<h1>Post array</h1>
	<pre>
		<?php print_r($_POST); ?>
	</pre>
		
	<h1>Page arrray</h1>		
	<pre>
		<?php print_r($page); ?> 
	</pre>
	
</div>