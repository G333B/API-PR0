<?php
include_once "./common/exceptions/repository_exceptions.php";

class clientRepository {

    private $connection = null;

    public function __construct() {
        try {
            $this->connection = pg_connect("host=database port=5432 dbname=APIdb user=metroid password=password");
            if (  $this->connection == null ) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception("Database connection failed :".$e->getMessage());
        }
    }

    public function get_client(): array {
            $result = pg_query($this->connection, "SELECT * FROM client");
            $clients = [];

            if (!$result) {
                throw new Exception(pg_last_error());
            }

            while ($row = pg_fetch_assoc($result)) {
                $client[] = $row;
            }

            return $client;
    }

    public function getReservationClient(): array {
            $result = pg_query($this->connection, "SELECT * FROM reservation INNER JOIN client ON client.idClient = reservation.idReservation");
            $clients = [];

            if (!$result) {
                throw new Exception(pg_last_error());
            }

            while ($row = pg_fetch_assoc($result)) {
                $client[] = $row;
            }

            return $client;
    }

    public function getClient($id): mixed {
        $result = pg_query($this->connection, "SELECT * FROM client where idClient = $idClient");

        if (!$result) {
            throw new Exception(pg_last_error());
        }

        $clients = pg_fetch_assoc($result); 

        if (!$clients) {
            throw new BddNotFoundException("Requested client does not exist");        
        }

        return $clients;

    }

}
