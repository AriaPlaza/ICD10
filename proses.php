<?php 
include 'database.php';
$db = new database();
$aksi = $_GET['aksi'];
//buku 
if($aksi == "login"){
    $db->login($_POST['username'],$_POST['password']);
}elseif($aksi == "logout"){
    $db->logout();
}elseif($aksi == "tambah_icd"){
    $db->input_icd($_POST['nama'],$_POST['code']);
    header("location:dataicd.php");
}elseif($aksi == "hapus_icd"){ 	
    $db->hapus_icd($_GET['id']);
   header("location:dataicd.php");
}elseif($aksi == "update_icd"){
    $db->update_icd($_POST['nama'],$_POST['code']);
    header("location:dataicd.php");
}
elseif($aksi == "tambah_buku"){
 	$db->input_buku($_POST['judul'],$_POST['pengarang'],$_POST['penerbit'],$_POST['tahun'],$_POST['kategori']);
 	header("location:databuku.php");
 }elseif($aksi == "hapus_buku"){ 	
 	$db->hapus_buku($_GET['id']);
	header("location:databuku.php");
 }elseif($aksi == "update_buku"){
 	$db->update_buku($_POST['id'],$_POST['judul'],$_POST['pengarang'],$_POST['penerbit'],$_POST['tahun'],$_POST['kategori']);
 	header("location:databuku.php");
 }
 //anggota
 elseif($aksi == "tambah_anggota"){
    $db->input_anggota($_POST['ktp'],$_POST['nama'],$_POST['jk'],$_POST['alamat'],$_POST['telepon']);
    header("location:dataanggota.php");
}elseif($aksi == "hapus_anggota"){ 	
    $db->hapus_anggota($_GET['id']);
   header("location:dataanggota.php");
}elseif($aksi == "update_anggota"){
    $db->update_anggota($_POST['id'],$_POST['ktp'],$_POST['nama'],$_POST['jk'],$_POST['alamat'],$_POST['telepon']);
    header("location:dataanggota.php");
}

?>