
<?php
class Entity_Phongban{
    public $idpb; 
    public $tenpb;
    public $mota;
    
    public function __construct($_idpb, $_tenpb, $_mota) { 
        $this->idpb = $_idpb;
        $this->tenpb = $_tenpb;
        $this->mota = $_mota;
    }
} 
?>
