<?php
    class sinhvien{
        private $hoten;
        private $tuoi;
        function echo(){
            echo $this->hoten.'<br>'.$this->tuoi;
        }
    }
    $a="/hello/cuonh";
    echo trim($a,"/");
?>