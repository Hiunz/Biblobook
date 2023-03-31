<?php

class Securite{
    public function securise($text){
        if ((   strpos($text, '"')+
                strpos($text, "'")+
                strpos($text, '\n')+
                strpos($text, '\r')+
                strpos($text, ' ')+
                strpos($text, '\t')+
                strpos($text, '(')+
                strpos($text, ')'))==-8){
            return true;
        } else{ return false;}
    }
}

?>