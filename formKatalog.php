<?
	include 'koneksi.php';
	
	session_start();
	$admin=$_GET['admin'];
	if($admin!=''){
		$select_admin=mysql_query("select * from admin where id = '$admin'");
		$count=mysql_num_rows($select_admin);
		if($count>0){
			$row=mysql_fetch_array($select_admin);
			if(session_is_registered($row[1]) && session_is_registered($row[2]) && $row[3]="ADM"){
				$idKatalog = $_GET['idKatalog'];
				$select_katalog=mysql_query("select * from katalog where id_katalog='$idKatalog'");
				$dtKatalog=mysql_fetch_array($select_katalog);
			}else {
				header('location:index.php?pg=notadmin');
			}
		} else {
			header('location:index.php?pg=sessionFailed');
		}
	}
	
	
?>
<html>
<head>
<title>Form Katalog</title>
</head>
<body>

<table width="400" align="left" border="0" cellpadding="5" cellspacing="0" style="font-family:arial;color:black;font-size:12px;">
<form method="post" action="saveKatalog.php" target="thetarget">
<tr valign="center">
<td align="left">KODE</td>
<td align="center">:</td>
<td ><input type="text" name="kode" maxlength="3" <? if(mysql_num_rows($select_katalog)==1) echo "value=$dtKatalog[0]";?>></td>
</tr>

<tr valign="center">
<td align="left">NAMA</td>
<td align="center">:</td>
<td ><input type="text" name="nama" value="<? if(mysql_num_rows($select_katalog)==1) echo $dtKatalog[1];?>"></td>
</tr>

<tr valign="top">
<td align="center" colspan="3">
	<input type="submit" name="submit" value="submit">
	<input type="reset" name="reset" value="reset">
	<input type="hidden" name="admin" value=<? echo $admin;?>>
</td>

</tr>
<tr>
<td colspan="3"><iframe width="100%" name="thetarget" height="100" frameborder="0" scrolling="auto"></iframe></td>
</tr>
</form>

</body>
</html>
