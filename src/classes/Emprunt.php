<?php

class Emprunt {

    private $date;
    private $delai;

    public function __construct($date,$delai) {
        $this->date = $date;
        $this->delai = $delai;
    }


    /**
     * @return mixed
     */
    public function getDate() { return $this->date; }

    /**
     * @param mixed $date
     */
    public function setDate($date) { $this->date = $date; }

    /**
     * @return mixed
     */
    public function getDelai() { return $this->delai; }

    /**
     * @param mixed $delai
     */
    public function setDelai($delai) { $this->delai = $delai; }


}
