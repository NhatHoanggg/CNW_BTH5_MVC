<?php

include_once("../Model/M_Nhanvien.php");
class Ctrl_Nhanvien {
    public function getNhanvien() { 
        if (isset($_GET["xem_thong_tin_NV"]) ) { 
            $modelNhanvien = new Model_Nhanvien();
            $listNhanvien = $modelNhanvien->getAllNhanvien();
            include_once("../View/NhanVien/xemthongtinNV.html");
        }

        // tim kiem nhan vien

        else if (isset($_POST["btnTimkiemNV"])){
            $input = @($_REQUEST['textBox']);
            $cb1Value = @($_REQUEST['checkbox1']);
            $cb2Value =@($_REQUEST['checkbox2']);
            $cb3Value = @($_REQUEST['checkbox3']);
            // echo "ID Nhân viên: " . $cb1Value."<br>";
            // echo "Họ tên: " . $cb2Value. "<br>";
            // echo "Địa chỉ: " . $cb3Value. "<br>";

            // echo $input;
            $modelNhanvien = new Model_Nhanvien();
            $listNhanvien = $modelNhanvien->timKiemNV($input, $cb1Value, $cb2Value, $cb3Value);
            // echo $listNhanvien;
            include_once("../View/NhanVien/xemthongtinNV.html");
        }

        else if (isset($_GET["tim_kiem"])) { 
            include_once("../View/NhanVien/formtimkiem.html");
        }        
        // end tim kiem nhan vien

        // dang nhap  
        else if (isset($_POST["btnDangNhap"])) { 
            $username = @($_REQUEST['username']);
            $password = @($_REQUEST['password']);
            $modelNhanvien = new Model_Nhanvien();
            $rs = $modelNhanvien->dangNhap($username, $password);
        }

        else if (isset($_GET["dang_nhap"])) { 
            include_once("../View/NhanVien/dangnhap.html");
        }
        // end dang nhap
        
        // chen nhan vien  
        else if (isset($_POST["btnChenNV"])) { 
            $idnv = $_POST['idnv'];
            $hoten = $_POST['hoten'];
            $idpb = $_POST['idpb'];
            $diachi = $_POST['diachi'];
            
            $modelNhanvien = new Model_Nhanvien();
            $rs = $modelNhanvien->chenNV($idnv, $hoten, $idpb ,$diachi);
            header("Location: C_Nhanvien.php?xem_thong_tin_NV");
        }

        else if (isset($_GET["chen_NV"])) { 
            include_once("../View/NhanVien/chenNV.html");
        }
        // end chen nhan vien 

        // xoa nv
        else if (isset($_GET['id_delete']) ) { 
            $id_delete = $_GET['id_delete'];
            // echo $id_delete;
            $modelNhanvien = new Model_Nhanvien();
            $rs = $modelNhanvien->xoaNV($id_delete);
            header("Location: C_Nhanvien.php?xem_thong_tin_NV");
        }

        else if (isset($_GET["xoa_NV"])) {
            $modelNhanvien = new Model_Nhanvien();
            $listNhanvien = $modelNhanvien->getAllNhanvien();
            include_once("../View/NhanVien/danhsachxoa1.html");
        }
        // end xoa nv
        

        // xoa nhieu nv
        else if (isset($_POST['btnDelete']) ) { 
            $danhsachxoa = $_POST['delete'];
            $modelNhanvien = new Model_Nhanvien();
            $rs = $modelNhanvien->xoanhieuNV($danhsachxoa);
            header("Location: C_Nhanvien.php?xem_thong_tin_NV");
        }

        else if (isset($_GET["xoa_nhieu_NV"])) {
            $modelNhanvien = new Model_Nhanvien();
            $listNhanvien = $modelNhanvien->getAllNhanvien();
            include_once("../View/NhanVien/danhsachxoa2.html");
        }
        // end xoa nhieu nv

        // dang xuat 
        else if (isset($_GET["dangxuat"])) {
            // echo "dang xuat";
            $modelNhanvien = new Model_Nhanvien();
            $rs = $modelNhanvien->dangxuat();
        }
        // end dang xuat
        else  {
            echo "loi duong dan";
        }
    }
}

$C_Nhanvien = new Ctrl_Nhanvien();
$C_Nhanvien->getNhanvien();   


?>