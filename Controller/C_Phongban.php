<?php
include_once("../Model/M_Phongban.php");
class Ctrl_Phongban {
    public function getPhongban() { 
        if (isset($_GET["xem_thong_tin_PB"]) ) { 
            $modelPhongban = new Model_Phongban();
            $listPhongban = $modelPhongban->getAllPhongBan();
            include_once("../View/PhongBan/xemthongtinPB.html");
        } 
        else if (isset($_GET["idpb"])){
            $idpb = $_GET["idpb"];
            $modelPhongban = new Model_Phongban();
            $listNV = $modelPhongban->getNVByIDPB($idpb);
            include_once("../View/PhongBan/xemthongtinNVPB.html");
        }   
        // chen pb
        else if (isset($_POST["btnChenPB"])){
            $idpb = $_POST["idpb"];
            $tenpb = $_POST["tenpb"];
            $mota = $_POST["mota"];
            $modelPhongban = new Model_Phongban();
            $modelPhongban->chenPB($idpb, $tenpb, $mota);
            header("Location: C_Phongban.php?xem_thong_tin_PB");
        }


        else if (isset($_GET["chen_PB"])){
            include_once("../View/PhongBan/chenPB.html");
        }
        // end chen pb

        // cap nhat pb
        else if (isset($_POST["btnUpdate"])) { 
            $idpb = $_POST["idpb"];
            $tenpb = $_POST["tenpb"];
            $mota = $_POST["mota"];
            $modelPhongban = new Model_Phongban();
            $modelPhongban->capnhatPB($idpb, $tenpb, $mota);
            header("Location: C_Phongban.php?capnhat_PB");
        }

        else if (isset($_GET["id_update"])) { 
            // echo $_GET["id_update"];
            $idpb = $_GET["id_update"];
            include_once("../View/PhongBan/formcapnhatPB.html");
        }

        else if (isset($_GET["capnhat_PB"])){
            $modelPhongban = new Model_Phongban();
            $listPhongban = $modelPhongban->getAllPhongBan();
            include_once("../View/PhongBan/danhsachPB.html");
        }

        // end cap nhat pb
        else  {
            echo "lỗi đường dẫn phòng ban";
        }
    }
}

$C_Phongban = new Ctrl_Phongban();
$C_Phongban->getPhongban();   


?>