<?php

class JsonClientDB
{

    private $_db;
    private $_client = array();

    public function __construct($cnx)
    {
        $this->_db = $cnx;
    }

    public function getClient($id)
    {
        $query = "select * from client where id_client=:id_client";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id, PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_client[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_client;
    }


}
