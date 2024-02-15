<?php 
include_once "./services/clientServices.php";

class userController {

    private $service;

    function __construct() {
        $this->service = new clientService();
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

    function create_reservation($req, $res) {
        $todo_object = new reservation($req->body->nom, $req->body->date, $req->body->done);


        $new_todo = $this->service->create_reservation($todo_object);
    }


    function get_todo($req, $res) {
        $todo = $this->service->get_todo($req->uri[3]);
        
        $res->content = $todo;
    }

    function get_todos($req, $res) {
        $todos = $this->service->get_todos();

        $res->content = $todos;
    }

    function delete_todo($req, $res) {
        if (!isset($req->uri[3])) {
            $res->status = 400;
            $res->content = '{"message":"Cannot delete without ID"}';
        }

        $this->service->delete_todo($req->uri[3]);
    }

    function update_todo($req, $res) {
        if (!isset($req->uri[3])) {
            $res->status = 400;
            $res->content = '{"message":"Cannot delete without ID"}';
        }

        $todo = new Todo($req->body->description, $req->body->date, $req->body->done);

        $this->service->delete_todo($req->uri[3], $todo);
    }

}

?>
