<?php
include_once "./common/exceptions/repository_exceptions.php";

class appartRepository {

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

    public function getAppart(): array {
            $result = pg_query($this->connection, "SELECT * FROM appartement");
            $apparts = [];

            if (!$result) {
                throw new Exception(pg_last_error());
            }

            while ($row = pg_fetch_assoc($result)) {
                $appart[] = $row;
            }

            return $appart;
    }

}
