<?
	include 'koneksi.php';
	
	session_start();
	$admin=$_GET['admin'];
	if($admin!=''){
		$select_admin=mysql_query("select * from admin where id = '$admin'");
		$count=mysql_num_rows($select_admin);
		if($count>0){
			$row=mysql_fetch_array($select_admin);
			if(session_is_registered($row[1]) && session_is_registered($row[2]) && $row[3]="ANG"){
				$idPinjam = $_GET['idPinjam'];
				list($y, $m, $d) = explode("-", $_GET['tglKembali']);
				$tglKembaliSeharusnya = mktime(0,0,0, $m, $d, $y);
				$timeKembaliSebenarnya = mktime(0,0,0, date("m"), date("d"), date("Y") );
				$tglKembaliSebenarnya = date("Y-m-d");
				
				//untuk menghitung denda hitung dulu telat harinya
				//kalau lebih dari 0 kalikan dengan nilai denda yang ada di table config
				$selectConfig = mysql_query("select dendaPerHari from config");
				$value = mysql_fetch_array($selectConfig);
				$denda = 0;
				$telat = 0;
				if($timeKembaliSebenarnya > $tglKembaliSeharusnya){
					$telat = round(abs($timeKembaliSebenarnya - $tglKembaliSeharusnya) / 86400);	
				}
				$denda = $value[0] * $telat;
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
<title>Form Pengembalian</title>
</head>
<body>

<table width="550" align="left" border="0" cellpadding="5" cellspacing="0" style="font-family:arial;color:black;font-size:12px;">
<form method="post" action="savePengembalian.php" target="thetarget">
<tr valign="center">
<td align="left" width="80">ID PINJAM</td>
<td align="center" width="6">:</td>
<td ><? echo $idPinjam;?>
	<input type="hidden" name="idPinjam" value="<? echo $idPinjam;?>"></td>
</tr>

<tr valign="center">
<td align="left" width="80">TGL KEMBALI</td>
<td align="center" width="6">:</td>
<td ><? echo $tglKembaliSebenarnya;?>
<input type="hidden" name="tglKembali" value="<? echo $tglKembaliSebenarnya;?>"></td>
</tr>

<tr valign="center">
<td align="left" width="80">DENDA</td>
<td align="center" width="6">:</td>
<td ><? echo $denda;?>
	<input type="hidden" name="denda" value="<? echo $denda;?>"></td>
</tr>

<tr valign="top">
<td align="left" colspan="3">
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
