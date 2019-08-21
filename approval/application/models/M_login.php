<?php
class M_login extends CI_Model{

	//cek nip dan password dosen
    function auth($username,$password){
        //$query=$this->db->query("SELECT * FROM tbl_user WHERE nik='$username' AND password='$password' LIMIT 1");
        $query=$this->db->query("SELECT * from tbl_user a left join tbl_jabatan b on a.jabatan=b.id_jabatan
        left join tbl_dept c on a.departemen=c.id_dept WHERE a.nik='$username' AND a.password='$password' LIMIT 1");
        return $query;
    }
 
    //cek nim dan password mahasiswa
    // function auth_mahasiswa($username,$password){
    //     $query=$this->db->query("SELECT * FROM mahasiswa WHERE nim='$username' AND pass=MD5('$password') LIMIT 1");
    //     return $query;
    // }
 
}
?>