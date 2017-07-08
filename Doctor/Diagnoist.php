<?php
include 'DiagoiseAbsract.class';
/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 7/2/2017
 * Time: 12:02 AM
 */
class Diagnoist extends DiagnoistAbstract
{
    public function __construct($username){
        parent::__construct($username);
        $this->loadotherProperties();
    }

    public function getUsername()
    {
        return $this->UserName;
        // TODO: Implement getUsername() method.
    }

    public function getID()
    {  return $this->id;

        // TODO: Implement getID() method.
    }

    public function setID($id)
    {
        // TODO: Implement setID() method.
    }



    public function setUserName($UserName)
    {
        // TODO: Implement setUserName() method.
    }

    public function getDoctor()
    {
        return $this->Doctor;
        // TODO: Implement getDoctor() method.
    }

    public function setDoctor($Doctor)
    {
        // TODO: Implement setDoctor() method.
    }

    public function getDate()
    {
        return $this->Date;
        // TODO: Implement getDate() method.
    }

    public function setDate($Date)
    {
        // TODO: Implement setDate() method.
    }


    public function getReport()
    {
        return $this->Report;
        // TODO: Implement getCase() method.
    }

    public function setReport($Report_type)
    {
        // TODO: Implement setReport() method.
    }

    public function getDiscription()
    {
            return $this->Discription;
        // TODO: Implement getDiscription() method.
    }

    public function setDiscription($Discription)
    {
        // TODO: Implement setDiscription() method.
    }

    public function getNote()
    {
        return $this->Note;
        // TODO: Implement getNote() method.
    }

    public function loadotherProperties()
    {
        $quer='username="'.$this->username.'"';
        $this->db->connect();
        $this->db->select('diagnoists','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        $this->id=$res[0]['id'];
        $this->id=$res[0]['Date'];
        $this->UserName=$res[0]['UserName'];
        $this->Doctor=$res[0]['Doctor'];
        $this->Report=$res[0]['Report_type'];
        $this->Discription=$res[0]['Discription'];
        $this->Note=$res[0]['Note'];

    }
    public function getresults(){
        $que='username="'.$this->username.'"';
        $this->db->connect();
        $this->db->select('diagnoists','*',NULL,$que,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
}