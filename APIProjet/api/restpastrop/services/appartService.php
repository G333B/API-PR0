<?php 
include_once "./repository/appartRepository.php";
include_once "./repository/repository.php";

class clientService {

    private $repository;

    function __construct() {
        $this->repository = new appartRepository();
    }

    function createReservation($reservation){
        $reservation
    }

    function seeReservation($Sreservation){

    }
}
?>