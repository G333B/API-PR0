<?php 
include_once "./repository/reservationRepository.php";

class reservService {

    private $repository;

    function __construct() {
        $this->repository = new reservRepository();
    }

    function getReservation($idReservation) {
        return $this->repository->getReservation($idReservation);
    }

}

?>
