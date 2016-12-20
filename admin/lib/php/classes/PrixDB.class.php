<?php
class PrixDB extends Prix
{
    
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getPrixEnfant() {
        try {
            $query = "Select prix from prix where nom_cat='enfant'";
            $resultset = $this->_db->prepare($query);   
            $resultset->execute();
            while($data = $resultset->fetch() ){
            print $data['prix'];
            }
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
    }
    
    public function getPrixAdulte() {
        try {
            $query = "Select prix from prix where nom_cat='adulte'";
            $resultset = $this->_db->prepare($query);   
            $resultset->execute();
            while($data = $resultset->fetch() ){
            print $data['prix'];
            }
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
    }
    public function getPrixEtudiant() {
        try {
            $query = "Select prix from prix where nom_cat='etudiant'";
           $resultset = $this->_db->prepare($query);   
            $resultset->execute();
            while($data = $resultset->fetch() ){
            print $data['prix'];
            }
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
            
    }
    
}
