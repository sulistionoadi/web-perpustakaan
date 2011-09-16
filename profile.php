<?
	include 'koneksi.php';
	session_start();
	$admin=$_GET['admin'];
	
	if($admin!=''){
		$select_admin=mysql_query("select * from admin where id = '$admin'");
		$count=mysql_num_rows($select_admin);
		if($count==1){
			$row=mysql_fetch_array($select_admin);
			if(session_is_registered($row[1]) && session_is_registered($row[2])){
				$getAnggota=mysql_query("select * from anggota where id_admin = '$admin'");
				$data=mysql_fetch_array($getAnggota);
				if(mysql_num_rows($getAnggota)==1){
				?>
					<table border="0" >
						<tr>
							<td><img width="200" height="200" src="foto_profile/<? echo $data[9];?>" /></td>
							<td>
								<table style="font-family:arial;color:black;font-size:14px;" >
									<tr rowspan="7"><td>Nama</td><td>&nbsp;:&nbsp;</td><td><? echo $data[2];?></td></tr>
									<tr rowspan="7"><td>Jenis Kelamin</td><td>&nbsp;:&nbsp;</td><td><? echo $data[3];?></td></tr>
									<tr rowspan="7"><td>Telepon</td><td>&nbsp;:&nbsp;</td><td><? echo $data[4];?></td></tr>
									<tr rowspan="7"><td>Alamat</td><td>&nbsp;:&nbsp;</td><td><? echo $data[5];?></td></tr>
									<tr rowspan="7"><td>Email</td><td>&nbsp;:&nbsp;</td><td><? echo $data[6];?></td></tr>
									<tr rowspan="7"><td>Tgl Register</td><td>&nbsp;:&nbsp;</td><td><? echo $data[7];?></td></tr>
									<tr rowspan="7"><td>Keterangan</td><td>&nbsp;:&nbsp;</td><td><? echo $data[8];?></td></tr>
								</table>
							</td>
						</tr>
					</table>
				<?
				}
			}
		}
	}
?>
