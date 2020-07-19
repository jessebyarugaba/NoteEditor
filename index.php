<?php

$conn = mysqli_connect("localhost","root","","list");
if(!$conn){
	echo "Failed to connect to server. Talk to administratot of this website.";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>NoteBook</title>
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
	<h3>NOTE-BOOK</h3>
	<div class="card">
		<div id="form">
			<input type="text" id="data" onkeydown="addData(event)" placeholder="Enter text...">
		</div>
		
		<div class="lists">
		<?php
		$req = "SELECT * FROM notes ORDER BY id ASC";
		$query = mysqli_query($conn, $req);
		while($row = mysqli_fetch_array($query)){
			if($row['text'] == ""){
				echo '';
			}
			echo '<div id="added_text">' .$row['text']. ' <span id="close" onclick="del(' .$row['id']. ')">&times;</span></div>';
		}
		?>
		</div>
	</div>
	
	<div class="alert-box">
		<span id="response-txt">Hello</span>
	</div>

	<script type="text/javascript" src="scripts/jquery-3.3.1.min.js"></script>
	<script>
		function del(id){
			$.ajax({
				url:"controller.php",
				type:"POST",
				data: { deleteData: id },
				success:function(res){
					$('#response-txt').text(res);
					$('.alert-box').css("background-color","#4CAF50");
					$('.alert-box').css("left","20px");
					setTimeout('hideAlert()', 2000);
					$('#data').val("");
					getData();
				}
			});
		}
	
		function addData(event){
			if(event.keyCode == 13){
				var txt = $('#data').val();
				if(txt == ""){
					$('#response-txt').text("Enter some data.");
					$('.alert-box').css("background-color","#000");
					$('.alert-box').css("left","20px");
					setTimeout('hideAlert()', 2000);
				}else{
				$.ajax({
					url:"controller.php",
					type:"POST",
					data: { data: txt },
					success:function(res){
						$('#response-txt').text(res);
						$('.alert-box').css("background-color","#4CAF50");
						$('.alert-box').css("left","20px");
						setTimeout('hideAlert()', 2000);
						$('#data').val("");
						getData();
					}
				});
				}
			}
		}
		
		
		
		function hideAlert(){
			$('.alert-box').css("left","-200px");
		}
		
		
		function getData(){
			$.ajax({
				url:"controller.php",
				type:"POST",
				data: { getdata: true },
				success:function(res){
					$('.lists').html(res);
				}
			});
		}
		
		
		
	</script>
</body>
</html>