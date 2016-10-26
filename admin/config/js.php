<?php 
// JS file:

?>

<!-- jQuery -->
<script   src="https://code.jquery.com/jquery-3.1.1.slim.min.js"   integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="   crossorigin="anonymous"></script>
<!-- jQuery UI-->
<script   src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"   integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="   crossorigin="anonymous"></script>	

<!-- Bootstrap - Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script>
	
	$(document).ready(function() {
		
		$("#console-debug").hide();
		
		$("#btn-debug").click(function() {
			$("#console-debug").toggle();
		});
		
	});
	
</script>