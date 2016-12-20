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
    
    public function Read($id) {
        try {
            $query = "SELECT * from reservation where num_res=:id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
            $resultset->execute();
            while($data = $resultset->fetch() )
            {
                echo $date;
            } 
        }
        catch (PDOException $e) {
            print $e->getMessage();
        }
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
