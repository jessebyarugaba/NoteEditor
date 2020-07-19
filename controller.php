<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "list";

$conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
if(!$conn){
	echo "Failed to connect to server. Talk to administratot of this website.";
}

if(isset($_POST['data'])){
	$msg = trim($_POST['data']);
	$msg = mysqli_real_escape_string($conn, $_POST['data']);
	$req = "INSERT INTO notes(text) VALUES('$msg')";
	$res = mysqli_query($conn, $req);
	if($res){
		echo "Data added";
	}else{
		echo "Data failed";
	}
}

if(isset($_POST['getdata'])){
	$req = "SELECT * FROM notes ORDER BY id ASC";
	$query = mysqli_query($conn, $req);
	while($row = mysqli_fetch_array($query)){
		echo '<div id="added_text">' .$row['text']. ' <span id="close" onclick="del(' .$row['id']. ')">&times;</span></div>';
	}
}

if(isset($_POST['deleteData'])){
	$id = mysqli_real_escape_string($conn, $_POST['deleteData']);
	$qry = "DELETE FROM notes WHERE id = '$id'";
	$res = mysqli_query($conn, $qry);
	if($res){
		echo "Data deleted";
	}else{
		echo "Failed to delete data";
	}
}

?>