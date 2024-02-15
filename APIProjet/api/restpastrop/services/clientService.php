<?php 
include_once "./repository/repository.php";

class clientService {

    private $repository;

    function __construct() {
        $this->repository = new clientRepository();
    }

    function geClient($idClient) {
        return $this->repository->getClient($idClient);
    }

    function createReservation($reservation){
        $reservation
    }

    function seeReservation($Sreservation){

    }
}


?>
