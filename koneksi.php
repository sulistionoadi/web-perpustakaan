<?
$cnc=mysql_connect("localhost","root","admin");
$cncdb=mysql_select_db("perpustakaan", $cnc);
	if(!($cnc && $cncdb)) {
	echo "Not connected to MySQL";
	exit();
	}
?>
