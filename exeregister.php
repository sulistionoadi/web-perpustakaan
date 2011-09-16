<meta http-equiv="Page-Exit" content="BlendTrans(Duration:1.0)">
<link rev="stylesheet" rel="stylesheet" type="text/css" href="style1.css">
<?
include 'koneksi.php';
$user=$_POST['username'];
$md_username=md5($user);

$pass=$_POST['password'];
$md_password=md5($pass);

$name=$_POST['name'];
$sex=$_POST['sex'];
$tlp=$_POST['telp'];
$alamat=$_POST['alamat'];
$mail=$_POST['mail'];
$desc=$_POST['description'];
$tgl=$_POST['tglentry'];
$filename='';

if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 1000000)){
		
	if ($_FILES["file"]["error"] > 0){
		echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    } else {
		$sqladmin=mysql_query("insert into admin (id, username, password, type) values('$md_username','$user', '$md_password', 'ANG')");
		if($sqladmin){
			$filename=$_FILES["file"]["name"];
			$sqlanggota=mysql_query("insert into anggota values('','$md_username','$name', '$sex', '$tlp', '$alamat', '$mail', '$tgl', '$desc', '$filename')");
			if($sqlanggota){
				//echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				//echo "Type: " . $_FILES["file"]["type"] . "<br />";
				//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

				if (file_exists("foto_profile/" . $_FILES["file"]["name"])){
					//echo $_FILES["file"]["name"] . " already exists. ";
				} else {
					move_uploaded_file($_FILES["file"]["tmp_name"],"foto_profile/" . $_FILES["file"]["name"]);
					//echo "Stored in: " . "foto_profile/" . $_FILES["file"]["name"];
					//echo "<br>";
				}
				echo "Registrasi Berhasil";
			}
		} else
			echo "username yang anda gunakan sudah dipakai";
    }
}else{
  echo "Invalid file";
}

?>
