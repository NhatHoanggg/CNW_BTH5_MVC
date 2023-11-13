<?php
include_once("E_Nhanvien.php");
class Model_Nhanvien {
    public function __construct() {}
    public function getAllNhanvien() {
        $link = mysqli_connect("localhost","root","") or  die("Couldn't connect to SQL") ;
        mysqli_select_db($link, "DULIEU1");
        $sql = "select * from nhanvien";
        $rs = mysqli_query($link, $sql);
        $i = 0;

        while ($row = mysqli_fetch_array($rs)) { 
            $idnv = $row['idnv'];
            $hoten = $row['hoten'];
            $idpb = $row['idpb'];
            $diachi = $row['diachi'];
    
            $i++;
            

            $nhanviens[$i++] = new Entity_Nhanvien($idnv, $hoten, $idpb, $diachi);
        }

        return $nhanviens;
    }


    // tim kiem
    public function timkiemNV($input, $cb1Value, $cb2Value, $cb3Value) {
        // if ($input == NULL){
        //     return NULL;
        // }

        $link = mysqli_connect("localhost","root","") or die("Couldn't connect to SQLServer");
        mysqli_select_db($link,"dulieu1");

        
        $sql = "SELECT * FROM nhanvien ";

        if ($cb1Value != NULL || $cb2Value != NULL || $cb3Value != NULL) {
            $sql .= " WHERE ";
        }

        if ($cb1Value != NULL) {
            $sql .= " $cb1Value LIKE  '%$input%' ";
            if ($cb2Value != NULL) {
                $sql .= " OR ";
            }
        }

        if ($cb2Value != NULL ) {
            $sql .= " $cb2Value LIKE  '%$input%' ";
            if ($cb3Value != NULL) {
                $sql .= " OR ";
            }
        }

        if ($cb3Value != NULL) { 
            $sql .= " $cb3Value LIKE '%$input%' ";
        }

        $rs = mysqli_query($link, $sql);

        $numrow = @(mysqli_num_rows($rs));
        if ($numrow == 0){
            return NULL;
        }

        $i = 0;

        while ($row = mysqli_fetch_array($rs)) { 
            $idnv = $row['idnv'];
            $hoten = $row['hoten'];
            $idpb = $row['idpb'];
            $diachi = $row['diachi'];
    
            $i++;
            
            $nhanviens[$i++] = new Entity_Nhanvien($idnv, $hoten, $idpb, $diachi);
        }

        return $nhanviens;
    }

    public function dangNhap($username, $password){
        $link = mysqli_connect("localhost", "root", "") or die("Couldn't connect to SQLServer");
        mysqli_select_db($link, "dulieu1");

        $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $num_rows = @(mysqli_num_rows($result));

        if ($num_rows == 1) {
            // echo __DIR__.'/../../View/Frame/t2.php';
            // echo dirname(__FILE__, 2).'/View/Frame/t2.php';
            echo '
            <script>
                parent.frames["t2"].location.href = "../View/Frame/t2_login.html";
            </script>';
            echo '
            <script>
                parent.frames["t3"].location.href = "../View/Frame/t3.html";
            </script>';


        } else {
            header("Location: C_Nhanvien.php?dang_nhap");
        }

        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }

    public function chenNV($idnv, $hoten, $idpb ,$diachi) { 
        $link = mysqli_connect("localhost", "root", "") or die("Couldn't connect to MySQL");
        mysqli_select_db($link, "dulieu1");
        
            
        $sql = "INSERT INTO nhanvien (idnv, hoten, idpb, diachi) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql);
        
        mysqli_stmt_bind_param($stmt, "ssss",$idnv, $hoten, $idpb, $diachi);
        
        try{

            mysqli_stmt_execute($stmt);
                

        }catch (Exception $e) {
            echo 'Có lỗi: ' . $e->getMessage();
        }
    
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }

    public function xoaNV($id_delete) {
        $link = mysqli_connect("localhost", "root", "") or die("Couldn't connect to MySQL");
        mysqli_select_db($link, "dulieu1");

        $sql = "DELETE FROM nhanvien WHERE idnv = ?  ";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $id_delete);
        

        if (mysqli_stmt_execute($stmt)) {
            echo "Xóa nhân viên thành công!";
        } else {
            echo "Xóa nhân viên thất bại!";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }

    // 
    public function xoanhieuNV($danhsachxoa){
        $link = mysqli_connect("localhost", "root", "") or die("Couldn't connect to MySQL");
        mysqli_select_db($link, "dulieu1");

        foreach ( $danhsachxoa as $key => $value ){ 
            // echo $key, "=", $value, "\n"; 

            $sql = "DELETE FROM nhanvien WHERE idnv = '$value'";

            if (mysqli_query($link, $sql)) {
            } else {
                echo "Xóa nhân viên ".$value." đã chọn thất bại!";
            }
        }

        mysqli_close($link);

    }

    public function dangxuat(){
        echo '
            <script>
                parent.frames["t2"].location.href = "../View/Frame/t2.html";
            </script>';
        echo '
            <script>
                parent.frames["t3"].location.href = "../View/Frame/t3.html";
            </script>';
    }
}
?>