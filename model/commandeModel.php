<?php


include_once 'connection\conn.php';


class commande {

    private $id;
    private $id_client;
    private $statut;
    private $date;


    public function __construct($id, $id_client, $statut, $date){
        $this->id = $id;
        $this->id_client = $id_client;
        $this->statut = $statut;
        $this->date = $date;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of id_client
     */ 
    public function getId_client()
    {
        return $this->id_client;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }
}




?>