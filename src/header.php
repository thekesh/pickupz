<script type="text/javascript">
     $(document).ready(function(){

		$('#form1').submit(function() {
		 
			getResults();
		 
		  return false;
		  
		});
		
     });
     
    function getResults() {
     
     	$.post('src/searchEvents.php', $("#form1").serialize(), function(data) {
			$('#response').empty();
			$('#response').css("display","none");
			$('#response').fadeIn("slow");
     		$('#response').html(data);
			bindEvents();
     	});
     
     };
</script>


<div id="header">
	<div id="login-container"><div id="global-nav" class="container_12"><?php  require_once 'login.php'; ?></div></div><div class="clear"></div>
	<div class="container_12">
		<div id="search-container">
			<form method="post" class="form" id="form1" name="myform" action="src/searchEvents.php">  
				<div class="form-input-box">
					<input class="text" id="search" name="search" type="text" maxlength="64" autocomplete="off" value="Enter ZIP/Postal Code or City" />
				</div>
				<div id="search-btn">
				<input id="send" type="image" src="img/search.png" />
				</div>
			</form>  
		</div>
	</div>
	<div class="clear"></div>
</div>