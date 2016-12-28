<?php
class SeanceDB extends Seance{
     private $_db;
    private $_typeArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getSeance() {
        try {
            $query = "SELECT * FROM SEANCE where dat>CURRENT_DATE";
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
    
    function delete($id)
        {
           try {
             $query="delete from seance where id_seance=:id"; 
             $sql = $this->_db->prepare($query);
             $sql->bindValue(':id',$id);
             $sql->execute();
             
             $retour = $sql->rowCount();
        }
        catch(PDOException $e) {
              print "Erreur lors de la suppression ".$e->getMessage();
        }
        return $retour;

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
    
    public function RechSeance($id) {
        try{
            $retour=array();
            $query="select rechseance (:id) as retour";
             $sql = $this->_db->prepare($query);
            $sql->bindValue(':id',$id);
            $sql->execute();
            $retour = $sql->fetchColumn(0);
        } catch (PDOException $ex) {
            print $ex->getMessage();
        }
        return $retour;
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

    function create($film,$salle,$heure,$date)
    {
       try{
            $retour=array();
            $query="select creaseance (:film,:salle,:heure,:date) as retour";
             $sql = $this->_db->prepare($query);
            $sql->bindValue(':film',$film);
            $sql->bindValue(':salle',$salle);
            $sql->bindValue(':heure',$heure);
            $sql->bindValue(':date',$date);
            $sql->execute();
            $retour = $sql->fetchColumn(0);
        } catch (PDOException $ex) {
            print $ex->getMessage();
        }
        return $retour;
        
    }
    
    
}
