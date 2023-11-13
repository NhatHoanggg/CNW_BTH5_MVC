<?php
include_once("E_Phongban.php");
// include_once("E_Phongban.php");

class Model_Phongban {
    public function __construct() {}
    public function getAllPhongban() {
        $link = mysqli_connect("localhost","root","") or  die("Couldn't connect to SQL") ;
        mysqli_select_db($link, "DULIEU1");
        $sql = "select * from phongban";
        $rs = mysqli_query($link, $sql);
        $i =0;

        while ($row = mysqli_fetch_array($rs)) { 
            $idpb = $row['idpb'];
            $tenpb = $row['tenpb'];
            $mota = $row['mota'];
    
            $i++;
            $phongbans[$i++] = new Entity_Phongban($idpb, $tenpb, $mota);
        }

        return $phongbans;
    }
    public function getNVByIDPB($idpb) {
        $link = mysqli_connect("localhost","root","") or die("Couldn't connect to SQLServer");
        mysqli_select_db($link,"dulieu1");
        $sql = "SELECT * FROM nhanvien where idpb = '$idpb'";
        $rs = mysqli_query($link,$sql);

        $results = array();

        while ($row = mysqli_fetch_assoc($rs)) {
            $results[] = $row;
        }

        mysqli_close($link);

        return $results;
    }

    public function chenPB($idpb, $tenpb, $mota) {
        $link = mysqli_connect("localhost", "root", "") or die("Couldn't connect to MySQL");
        mysqli_select_db($link, "dulieu1");
        
            
        $sql = "INSERT INTO phongban (idpb, tenpb, mota) VALUES ( ?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql);
            
        mysqli_stmt_bind_param($stmt, "sss",$idpb, $tenpb, $mota);
        try{
            (mysqli_stmt_execute($stmt)) ;
        }catch (Exception $e) {
            echo 'Có lỗi: ' . $e->getMessage();
        }

        mysqli_stmt_close($stmt);
        mysqli_close($link);
            
    }
    public function capnhatPB($idpb, $tenpb, $mota) { 
        $link = mysqli_connect("localhost", "root", "") or die("Couldn't connect to MySQL");
        mysqli_select_db($link, "dulieu1");

        $sql = "UPDATE phongban SET tenpb = ?, mota = ? WHERE idpb = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $tenpb, $mota, $idpb);
        try{
            (mysqli_stmt_execute($stmt)) ;
        }catch (Exception $e) {
            echo 'Có lỗi: ' . $e->getMessage();
        }

        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
}
?>