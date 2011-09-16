<?
	include 'koneksi.php';
	session_start();
	$admin=$_GET['admin'];
	if($admin!=''){
		$select_admin=mysql_query("select * from admin where id = '$admin'");
		$count=mysql_num_rows($select_admin);
		if($count>0){
			$row=mysql_fetch_array($select_admin);
			if(session_is_registered($row[1]) && session_is_registered($row[2])){
				$type=$row[3];
			} else {
				header('location:index.php?pg=sessionFailed');
			}
		} 
	}
?>
<html>
<head>
<title>Pustaka Smekda</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="Content-Language" content="en-us" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	<meta name="description" content="LGBlue Free Css Template" />
	<meta name="keywords" content="free,css,template,business" />
	<meta name="author" content="David Herreman (http://www.free-css-templates.com)" />
	<style type="text/css" media="all">@import "images/style.css";</style>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss/" />
    <style type="text/css">
<!--
.style3 {color: #FF9933}
.style6 {
	font-size: 200%;
	font-weight: bold;
	color: #FF9933;
}
.style7 {font-size: 140%}
-->
    </style>
</head>

<body>
	<!--Table Utama-->
	<div class="content">
	<table align="center" width="791" height="800" border="0" cellspacing="0" cellpadding="0">
		<tr height="1%"><!--baris table untuk header-->
			<td colspan="2" width="100%"> 
					<div id="toph"></div>
					<div id="header">
						<div class="rside">
							<div class="citation">
								<h2 class="style7">PERPUSTAKAAN SMK NEGERI 2 SURABAYA </h2>
								<?php
									$tgl=date('Y-m-d');
									echo "Tanggal  " ;echo date('d-m-Y');
									echo "<br>";?>
							</div> 
						</div> 
						<div class="lside" align="center">
							<p>&nbsp;</p>
							<p><img src="images/book3.gif" width="132" height="86" /></p>
						</div> 
	  
					</div> 
			</td>
		</tr>
		
		<tr rowspan="2" height="95%">
		<div class="leftmenu">
			<td width="20%" valign="top">
			<div class="padding">
			<form align="left" method="GET" action="index.php">
			Cari Buku <br>
			<input type="text" name="keyword" /><input type="hidden" name="pg" value="cari" />
			<input type="submit" name="btnCari" value="Go"/>
			</form>
			</div>
			<div class="nav">
			<ul>
				<? if($type=="ADM"){
						echo "<li><a href=index.php?pg=profile&admin=$admin>Profile</a></li>";
						echo "<li><a href=index.php?pg=penerbit&admin=$admin>Penerbit</a></li>";
						echo "<li><a href=index.php?pg=pengarang&admin=$admin>Pengarang</a></li>";
						echo "<li><a href=index.php?pg=katalog&admin=$admin>Katalog</a></li>";
						echo "<li><a href=index.php?pg=buku&admin=$admin>Buku</a></li>";
						echo "<li><a href=index.php?pg=stokBuku&admin=$admin>Input Stok Buku</a></li>";
						echo "<li><a href=index.php?pg=config&admin=$admin>Konfigurasi</a></li>";
						echo "<li><a href=index.php?pg=logout&admin=$admin>Logout</a></li>";
					} else if($type=="ANG"){
						echo "<li><a href=index.php?pg=profile&admin=$admin>Profile</a></li>";
						echo "<li><a href=index.php?pg=viewbook&admin=$admin>Lihat Data Buku</a></li>";
						echo "<li><a href=index.php?pg=peminjaman&admin=$admin>Transaksi Peminjaman</a></li>";
						echo "<li><a href=index.php?pg=pengembalian&admin=$admin>Transaksi Pengembalian</a></li>";
						echo "<li><a href=index.php?pg=logout&admin=$admin>Logout</a></li>";
					} else {
						echo "<li><a href=index.php?pg=beranda&admin=$admin>Beranda</a></li>";
						echo "<li><a href=index.php?pg=profil&admin=$admin>Profil</a></li>";
						echo "<li><a href=index.php?pg=viewbook&admin=$admin>Lihat Data Buku</a></li>";
						echo "<li><a href=index.php?pg=login&admin=$admin>Login</a></li>";
						echo "<li><a href=index.php?pg=register&admin=$admin>Register</a></li>";
					}?>
			</ul><br>
			</div>
			
			</td>
		</div>
			<td width="80%" valign="top">
			<div id="main">
				<div class="center">
				<!--Table untuk menu tengah (content)-->
				<table align="center" width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
					<tr height="97%">
						<td valign="top" width="100%">
						<?
						$pg=$_GET['pg'];
						switch($pg){
							case 'home':
								include 'home.php';
								break;
							case 'register':
								include 'register.php';
								break;
							case 'viewbook':
								include 'viewbook.php';
								break;
							case 'login':
								include 'login.php';
								break;
							case 'cari':
								include 'searching.php';
								break;
							case 'logout':
								include 'logout.php';
								break;
							case 'profile':
								include 'profile.php';
								break;
							case 'sessionFailed';
								include 'sessionFailed.php';
								break;
							case 'pengarang';
								include 'listPengarang.php';
								break;
							case 'penerbit';
								include 'listPenerbit.php';
								break;
							case 'katalog';
								include 'listKatalog.php';
								break;
							case 'buku';
								include 'listBuku.php';
								break;
							case 'notadmin';
								include 'notadmin.php';
								break;
							case 'notmember';
								include 'notmember.php';
								break;
							case 'formPenerbit';
								include 'formPenerbit.php';
								break;
							case 'deletePenerbit';
								include 'deletePenerbit.php';
								break;
							case 'formKatalog';
								include 'formKatalog.php';
								break;
							case 'deleteKatalog';
								include 'deleteKatalog.php';
								break;
							case 'formPengarang';
								include 'formPengarang.php';
								break;
							case 'deletePengarang';
								include 'deletePengarang.php';
								break;
							case 'formBuku';
								include 'formBuku.php';
								break;
							case 'deleteBuku';
								include 'deleteBuku.php';
								break;
							case 'beranda';
								include 'beranda.php';
								break;
							case 'profil';
								include 'profil.php';
								break;
							case 'config';
								include 'config.php';
								break;
							case 'stokBuku';
								include 'listStok.php';
								break;
							case 'formUpdateStok';
								include 'formUpdateStok.php';
								break;
							case 'peminjaman';
								include 'formPeminjaman.php';
								break;
							case 'pengembalian';
								include 'listPeminjaman.php';
								break;
							case 'formPengembalian';
								include 'formPengembalian.php';
								break;
							default:
								include 'beranda.php';
								break;
						}
						?>
						<!--<iframe name="content" src="content.php" width="100%" height="100%" scrolling="auto" />-->
						</td>
					</tr>
					<tr>
						<td colspan="5">
							<p class="date"><br /></p>
							<div class="boxads">
							<div align="center">
								<p><span class="style6">Support By :</span></p>
								<p align="center"><marquee><img src="images/spport.gif" width="586" height="129"></marquee></p>
							</div>
							</div>
							<h3><br /><br /></h3>
							<div align="center"></div>
						</td>
					</tr>
			</div>
		</div>
				</table>
				
			</td>
			
		</tr>
		
		<tr height="1%"><!--baris table untuk header-->
			<td colspan="2" width="100%">  </td>
		</tr>
		
		
	</table>
	<div id="footer">Copyright @ 3 RPL / 2011 Perpus Smekda Surabaya | Design : Eni Lidiani | Email :Lidiani.eni@gmail.com</div>
	</div>
</body>
</html>
