<?php 
session_start();
class database{

	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "icd";

	function __construct(){
		mysql_connect($this->host, $this->uname, $this->pass);
		mysql_select_db($this->db);
	}

    function tampil_buku(){
		$data = mysql_query("select * from t_buku");
		while($d = mysql_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
    }
    function tampil_icd(){
      $data = mysql_query("select * from icd");
      while($d = mysql_fetch_array($data)){
        $hasil[] = $d;
      }
      return $hasil;
      }
    function tampil_anggota(){
      $data = mysql_query("select * from t_anggota");
      while($d = mysql_fetch_array($data)){
        $hasil[] = $d;
      }
      return $hasil;
      }
    function login($username, $password){
      $data =mysql_query("select * from t_login where username='$username' and password='$password'");
      $cek = mysql_num_rows($data);
      if($cek > 0){
        while($d = mysql_fetch_array($data)){ 	
          if ($d['username'] == $username) {
            $_SESSION['username'] = $d['username'];
          header("location:beranda.php");
          }
        
        }		
        }
        
        else{
          ?>
                                          <script type="text/javascript">
                                            alert('Tidak bisa Login, username dan password salah')
                                            document.location.href = "index.php"; 
                                          </script>
                                          <?php 
        
        }
        
      }	
      function logout(){
 
// menghapus semua session
session_destroy();
 
// mengalihkan halaman sambil mengirim pesan logout
header("location:./index.php");

      }
      function input_icd($nama,$code){
        mysql_query("insert into icd values('','$nama','$code')");
        }	
        function hapus_icd($id){
            mysql_query("delete from icd where id_icd='$id'");
        }
        function edit_icd($id){
            $data = mysql_query("select * from icd where id_icd='$id'");
            while($d = mysql_fetch_array($data)){
            $hasil[] = $d;
            }
            return $hasil;
        }
        function update_icd($nama,$code){
          mysql_query("update icd set nama='$nama', icd='$icd' where id='$id'");
          } 
  
    function input_buku($judul,$pengarang,$penerbit,$tahun,$kategori){
		mysql_query("insert into t_buku values('','$judul','$pengarang','$penerbit','$tahun','$kategori')");
    }	
    function hapus_buku($id){
        mysql_query("delete from t_buku where id='$id'");
    }
    function edit_buku($id){
        $data = mysql_query("select * from t_buku where id='$id'");
        while($d = mysql_fetch_array($data)){
        $hasil[] = $d;
        }
        return $hasil;
    }
        
    function update_buku($id,$judul,$pengarang,$penerbit,$tahun,$kategori){
        mysql_query("update t_buku set judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun='$tahun', kategori='$kategori' where id='$id'");
        } 

  function input_anggota($ktp,$nama,$jk,$alamat,$telepon){
    mysql_query("insert into t_anggota values('','$ktp','$nama','$jk','$alamat','$telepon')");
    }	
    function hapus_anggota($id){
        mysql_query("delete from t_anggota where id='$id'");
    }
    function edit_anggota($id){
        $data = mysql_query("select * from t_anggota where id='$id'");
        while($d = mysql_fetch_array($data)){
        $hasil[] = $d;
        }
        return $hasil;
    }
        
    function update_anggota($id,$ktp,$nama,$jk,$alamat,$telepon){
        mysql_query("update t_anggota set ktp='$ktp', nama='$nama', jk='$jk', alamat='$alamat', telepon='$telepon' where id='$id'");
    }
  } 
?>