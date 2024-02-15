<?php 
include_once "./services/clientServices.php";
include_once "./services/reservationServices.php";

class reservController {

    private $service;

    function __construct() {
        $this->service = new reservService();
    }

    function dispatch($req, $res) {
        switch ($req->method) {
            case "GET":
                if (isset($req->uri[3])) {
                    $this->get_client($req, $res);
                    break;
                }
                $this->get_todos($req, $res);
            break;

            case "PATCH":
               $res->content = $this->update_todo($req, $res); 
            break;
            
            case "DELETE":
                $this->delete_todo($req, $res);
            break;

            case "POST":
                $this->create_todo($req, $res);
            break;
        }


    }


    function createReservation($req, $res) {
        $clientObject = new reservation($req->body->dateDebut, $req->body->dateFin, $req->body->allPrix);


        $new_todo = $this->service->createRservation($clientObject);
    }


    function getReservation($req, $res) {
        $todo = $this->service->getReservation($req->uri[3]);
        
        $res->content = $todo;
    }

}

?>
