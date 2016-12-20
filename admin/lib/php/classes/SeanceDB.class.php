<?php
class SeanceDB extends Seance{
     private $_db;
    private $_typeArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getSeance() {
        try {
            $query = "SELECT * FROM SEANCE";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();

            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_typeArray[] = new Seance($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_typeArray;
    }
    
    public function Read($id) {
        try {
            $query = "SELECT * FROM SEANCE where id_seance=:id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
            $resultset->execute();
            $data = $resultset->fetchAll();

            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_typeArray[] = new Seance($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_typeArray;
    }
    
    public function getDate($id) {
        try {
            $query = "SELECT dat FROM SEANCE where id_seance=:id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
            $resultset->execute();
            while($data = $resultset->fetch() )
            {
                $date=$this->transform($data['dat']);
                echo $date;
            } 
        }
        catch (PDOException $e) {
            print $e->getMessage();
        }
    }
       
    function transform($string) //fonction d'affichage de la date en format jour, mois, année
{
	$a=0;
	$a=substr($string,0,4);
	$b=0;
	$b=substr($string,5,2);
	$c=0;
	$c=substr($string,8,2);
	return $c."/".$b."/".$a;
}
    
    
}
