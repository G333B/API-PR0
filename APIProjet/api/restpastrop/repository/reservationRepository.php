<?php
include_once "./common/exceptions/repository_exceptions.php";

class reservRepository {

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

    public function getReservation(): array {
            $result = pg_query($this->connection, "SELECT * FROM reservation");
            $reservs = [];

            if (!$result) {
                throw new Exception(pg_last_error());
            }

            while ($row = pg_fetch_assoc($result)) {
                $client[] = $row;
            }

            return $client;
    }

    public function updateReserv($idReservation , $objReserv ): void {
        $query = "UPDATE reservation set ";

        if (isset($objReserv->done)) {
            if ($objReserv->done == "true") {
                $query .= " done = TRUE ";
            } else if ($objReserv->done == "false") {
                $query = " done = FALSE ";
            }
        }

        
        if (isset($objReserv->dateDebut) && isset($objReserv->dateDebut)) {
            $query .= " , ";
        }
        
        if (isset($objReserv->dateFin) && isset($objReserv->dateFin)) {
            $query .= " , ";
        }
        
        if (isset($objReserv->description)) {
            $query .= " description = '".$objReserv->description."' ";
        }

        $query .= " where id = $idReservation; ";
        $result = pg_query($this->connection,$query); 

        if (!$result) {
           throw new Exception(pg_last_error());
        }
    }

}
