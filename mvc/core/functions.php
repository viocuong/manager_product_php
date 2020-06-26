<?php
    class Functions{
        public static function filter($str){
            $str=trim($str);
            $str=htmlspecialchars($str);
            $str=stripslashes($str);
            return $str;
        }
        
    }
?>