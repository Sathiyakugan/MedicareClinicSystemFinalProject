<?php
include 'paidpatiaintAbs.php';

/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 7/7/2017
 * Time: 11:50 AM
 */
class Paidpatiant extends paidpatiaintAbs
{
    public function __construct($dusername)
    {

        parent::__construct($dusername);
        $this->loadotherProperties();


    }

    public function getID()
    {
        return $this->id;

    }

    public function setID($id)
    {
        // TODO: Implement setID() method.
    }

    public function getDUsername()
    {
        return $this->dusername;
    }

    public function setDUserName($dusername)
    {
        // TODO: Implement setDUserName() method.
    }

    public function getPUsername()
    {
        return $this->pusername;

    }

    public function setPUserName($pusername)
    {
        // TODO: Implement setPUserName() method.
    }



    public function getconsulancyFees()
    {
        return $this->consulancyFees;
    }

    public function setconsulancyFees($consulancyFees)
    {
        // TODO: Implement setconsulancyFees() method.
    }

    public function getAppoinmentDate()
    {
        return $this->appoinmentDate;
    }

    public function setAppoinmentDate($appoinmentDate)
    {
        // TODO: Implement setAppoinmentDate() method.
    }

    public function getAppoinmentTime()
    {
        return $this->appoinmentTime;
    }

    public function setAppoinmentTime($appoinmentTime)
    {
        // TODO: Implement setAppoinmentTime() method.
    }

    public function getPostingDate()
    {
        return $this->postingDate;

    }

    public function setPostingDate($postingDate)
    {
        // TODO: Implement setPostingDate() method.
    }

    public function loadotherProperties()
    {

        $quer='dusername="'.$this->dusername.'"';
        $this->db->connect();
        $this->db->select('paidpatients','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        $this->id=$res[0]['id'];
        $this->dusername=$res[0]['dusername'];
        $this->pusername=$res[0]['pusername'];
        $this->consulancyFees=$res[0]['consulancyFees'];
        $this->appoinmentDate=$res[0]['appoinmentDate'];
        $this->appoinmentTime=$res[0]['appoinmentTime'];
        $this->postingDate=$res[0]['postingDate'];
    }
    public function getresults(){
        $que='dusername="'.$this->dusername.'"';
        $this->db->connect();
        $this->db->select('paidpatients','*',NULL,$que,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
}