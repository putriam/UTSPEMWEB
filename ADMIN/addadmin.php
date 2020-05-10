<?php
//$conn = mysqli_connect("sql307.epizy.com","epiz_23629284","hnAWWtVnHe1","epiz_23629284_berita_kita");
$conn = mysqli_connect("localhost","root","","admin");

function query($query){
    global $conn;
    $result= mysqli_query($conn,$query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}
    /**
     * 
     */
    class tambah
    {
    	
    	public function tambah_admin($data){
        global $conn;
        $user_admin = strtolower(stripslashes ($data["user_admin"]));
        $pass_admin = mysqli_real_escape_string($conn,$data["pass_admin"]);
        $pass_admin2= mysqli_real_escape_string($conn,$data["pass_admin2"]); 

        //cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT user_admin FROM admin 
        WHERE user_admin = '$user_admin'");
        if (mysqli_fetch_assoc($result)){
            echo "<script>
                alert ('username sudah pernah terpakai, buat lagi!')
                </script>";
            return false;
        }
        //cek konfirmasi password
        if($pass_admin !== $pass_admin2){
            echo "<script>
                alert('konfirmasi password tidak sesuai');
                </script>";
            return false;
        }    
        //enkripsi password
        $pass_admin = password_hash($pass_admin, PASSWORD_DEFAULT);
        //tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO admin VALUES('','$user_admin','$pass_admin')");

        return mysqli_affected_rows($conn);
    }
    }
   
    /**
     * 
     */
    class hapus
    {
    	
    	public function hapus_admin($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM `admin` WHERE `id_admin` = $id");
        return mysqli_affected_rows($conn);
    	}   
     }
    
  ?>