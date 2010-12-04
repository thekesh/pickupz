<!DOCTYPE html>
 <html lang="en">
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php  require_once 'src/css_js.php'; ?>  
	<script>
	$(document).ready(function() {
		bindEvents();
	});
	
	function bindEvents(){
	
		$("a").bind('click', function() {
			$(this).parents('div.event-box').slideToggle("fast");
		});
		
		$("div.event-box").bind('mouseover', function() {
			$(this).css('background-color', 'rgb(230,230,230)');
		});

		$("div.event-box").bind('mouseout', function(){
			$(this).css('background-color', 'rgb(240,240,240)');
		});
	
	}
	
	</script>

</head>
<body>
Testing wtf
<?php  require 'src/header.php'; ?>

<div class="container_12">
	<div class="grid_12">
		<?php  require 'src/sort.php'; ?>  
		<div id="main">  
			<div id="response"><?php  require 'src/getEvents.php'; ?></div> 	
		</div><!-- end main-->  
	</div><!-- end .grid_12 -->
	<div class="clear"></div>
</div>

</body>
</html>