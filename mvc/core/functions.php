<?php
    class Functions{
        public static function filter($str){
            $str=trim($str);
            $str=htmlspecialchars($str);
            $str=stripslashes($str);
            return $str;
        }
        public static function parse($money){
            $s=(string)$money;
            $res="";
            $n=strlen($money);
            $d=floor($n-1)/3;
            $c=0;
            for($i=$n-1;$i>=0;$i--){
                $res.=$s[$i];
                $c++;
                if($c==3 && $i!=0){
                    $res.=",";
                    $c=0;
                }
            }
            return strrev($res)." ₫";
        }
    }
?>