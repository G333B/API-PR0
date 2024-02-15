<?php 
include_once "./repository/clientRepository.php";
include_once "./repository/reservationRepository.php";

class clientService {

    private $repository;

    function __construct() {
        $this->repository = new clientRepository();
    }

    function getClient($idClient) {
        return $this->repository->getClient($idClient);
    }

}

?>
