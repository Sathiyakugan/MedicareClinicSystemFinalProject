<?php

abstract class preAbstract{
    protected $id;
    protected $UserName;
    protected $Doctor;
    protected $Date;
    protected $Case_Histroy;
    protected $medication;
    protected $note;

    protected $db;
    //essential constructor
    public function __construct($username){
        $this->username=$username;
        $this->db=Database::getInstance();

    }

    abstract public function getUsername();

    //Can't set the user name.

    abstract public function getID();
    abstract public function setID($id);
    abstract public function setUserName($UserName);
    abstract public function getDoctor();
    abstract public function setDoctor($Doctor);
    abstract public function getDate();
    abstract public function setDate($Date);
    abstract public function getCase();
    abstract public function setCase($Case_Histroy);
    abstract public function getmedication();
    abstract public function setmedication($medication);
    abstract public function getNote();

    abstract public function loadotherProperties();
    abstract public function setbulk( $Doctor,$UserName, $Date,$Case_Histroy, $medication, $note);
}
?>