<?php

class ClientDB extends Client {
    private $_db;
    public function __construct($db) {
        $this->_db = $db;
    }
    
    function isAuthorized($login,$password) {
        try{
        $retour = array();
            $query="select OKCO(:login,:password) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':login',$login);
            $sql->bindValue(':password',md5($password));
            $sql->execute();
            $retour = $sql->fetchColumn(0);
        } catch (PDOException $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
    
    function create($nom, $prenom,$pseudo,$email,$mdp)
    {
        try{
            $retourcrea=array();
            $query="select CREACLI (:pseudo,:mdp,:nom,:prenom,:email) as retour";
             $sql = $this->_db->prepare($query);
            $sql->bindValue(':pseudo',$pseudo);
            $sql->bindValue(':mdp',md5($mdp));
            $sql->bindValue(':nom',$nom);
            $sql->bindValue(':prenom',$prenom);
            $sql->bindValue(':email',$email);
            $sql->execute();
            $retourcrea = $sql->fetchColumn(0);
        } catch (PDOException $ex) {
            print $ex->getMessage();
        }
        return $retourcrea;
    }
    
    function read($id)
    {
       try {
            $query = "SELECT * FROM CLIENT where id_client=:id_client";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
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
    
    function maj($nom, $prenom,$pseudo,$email,$id)
    {
       try{
            $retourupdate=array();
            $query="select updatecli (:pseudo,:nom,:prenom,:email,:id_client) as retour";
             $sql = $this->_db->prepare($query);
            $sql->bindValue(':pseudo',$pseudo);
            $sql->bindValue(':nom',$nom);
            $sql->bindValue(':prenom',$prenom);
            $sql->bindValue(':email',$email);
            $id = intval($id);
             $sql->bindValue(':id_client',$id);
            $sql->execute();
            $retourupdate = $sql->fetchColumn(0);
        } catch (PDOException $ex) {
            print $ex->getMessage();
        }
        return $retourupdate;
        
    }
    
    function delete($id)
    {
       try {
   	 $query="select deletecli (:id) as retour"; 
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
    
}

