<?php

class Exemplaire {

     private $id_emprunt;
     private $date;
     private $delai;

    /**
     * @param $id_emprunt
     * @param $date
     * @param $delai
     */
    public function __construct($id_emprunt, $date, $delai)
    {
        $this->id_emprunt = $id_emprunt;
        $this->date = $date;
        $this->delai = $delai;
    }


}

?>