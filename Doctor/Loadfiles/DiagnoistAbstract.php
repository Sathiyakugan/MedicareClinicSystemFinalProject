<?php

/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 7/2/2017
 * Time: 12:04 AM
 */
abstract class DiagnoistAbstract
{



    protected $id;
    protected $UserName;
    protected $Doctor;
    protected $Date;
    protected $Report_type;
    protected $Discription;
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
    abstract public function getReport();
    abstract public function setReport($Report_type);
    abstract public function getDiscription();
    abstract public function setDiscription($Discription);
    abstract public function getNote();

    abstract public function loadotherProperties();
}
?>