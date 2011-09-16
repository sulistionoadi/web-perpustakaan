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
				$select_config=mysql_query("select * from config limit 1");
				$dt_config=mysql_fetch_array($select_config);
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
<title>Form Konfigurasi</title>
</head>
<body>

<table width="400" align="left" border="0" cellpadding="5" cellspacing="0" style="font-family:arial;color:black;font-size:12px;">
<form method="post" action="updateConfig.php" target="thetarget">
<tr valign="center">
<td align="left">MAX LAMA PINJAM</td>
<td align="center">:</td>
<td ><input type="text" name="maxLamaPinjam" maxlength="3" value="<?echo $dt_config[1];?>">&nbsp;(hari)</td>
</tr>

<tr valign="center">
<td align="left">DENDA PER HARI</td>
<td align="center">:</td>
<td ><input type="text" name="dendaPerHari" value="<?echo $dt_config[2];?>">&nbsp;(Rupiah)</td>
</tr>

<tr valign="top">
<td align="center" colspan="3">
	<input type="submit" name="submit" value="submit">
	<input type="reset" name="reset" value="reset">
	<input type="hidden" name="admin" value=<? echo $admin;?>>
	<input type="hidden" name="id" value=<? echo $dt_config[0];?>>
</td>

</tr>
<tr>
<td colspan="3"><iframe width="100%" name="thetarget" height="100" frameborder="0" scrolling="auto"></iframe></td>
</tr>
</form>

</body>
</html>
