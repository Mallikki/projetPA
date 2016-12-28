<?php
class ReservationDB extends Reservation{
     private $_db;
    private $_typeArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getAllReservations() {
        try {
            $query = "SELECT * FROM Reservation";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();

            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_typeArray[] = new Reservation($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_typeArray;
    }
   
    
    public function getAllReservationsParClient($id) {
        try {
            $query = "SELECT * FROM Reservation where id_client=:id_client";
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
                $_typeArray[] = new Reservation($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_typeArray;
    }
    
    public function VueReservSelonClient($id) {
        $ok=0;
        try {
            $query = "SELECT * FROM reserv where id_client=:id_client";
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
                $_typeArray[] = new Reservation($data);
                $ok=1;
            } catch (PDOException $e) {
                print $e->getMessage();
                
            }
            
        }
        if ($ok==1)
        {
            return $_typeArray;
        }
        else
        {
            return 0;
        }
    }
    
      function create($adulte,$enfant,$etudiant,$seance,$client)
    {
       try{
            $retourupdate=array();
            $query="select creaRes (:adulte,:enfant,:etudiant,:seance,:client) as retour";
             $sql = $this->_db->prepare($query);
            $sql->bindValue(':adulte',$adulte);
            $sql->bindValue(':enfant',$enfant);
            $sql->bindValue(':etudiant',$etudiant);
            $sql->bindValue(':seance',$seance);
             $sql->bindValue(':client',$client);
            $sql->execute();
            $retourupdate = $sql->fetchColumn(0);
        } catch (PDOException $ex) {
            print $ex->getMessage();
        }
        return $retourupdate;
        
    }
    
     function RechRes($seance,$client)
    {
       try{
            $retourupdate=array();
            $query="select rechSiRes (:seance,:client) as retour";
             $sql = $this->_db->prepare($query);
            $sql->bindValue(':seance',$seance);
             $sql->bindValue(':client',$client);
            $sql->execute();
            $retourupdate = $sql->fetchColumn(0);
        } catch (PDOException $ex) {
            print $ex->getMessage();
        }
        return $retourupdate;
        
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
        
        function delete($id)
        {
           try {
             $query="select delete_res (:id) as retour"; 
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
        
        function read($id)
        {
            try {
            $query = "SELECT * FROM reservation where num_res=:id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
            $resultset->execute();
         } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_typeArray[] = new Client($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_typeArray;
        
        }
        
        //adulte, enfants,etudiant,reservation,client
    function maj($ad,$enf,$et,$res,$cli)
    {
       try{
            $retourupdate=array();
            $query="select majres (:ad,:enf,:et,:res,:cli) as retour";
             $sql = $this->_db->prepare($query);
            $sql->bindValue(':ad',$ad);
            $sql->bindValue(':enf',$enf);
            $sql->bindValue(':et',$et);
            $sql->bindValue(':res',$res);
             $sql->bindValue(':cli',$cli);
            $sql->execute();
            $retourupdate = $sql->fetchColumn(0);
        } catch (PDOException $ex) {
            print $ex->getMessage();
        }
        return $retourupdate;
        
    }
        
}
