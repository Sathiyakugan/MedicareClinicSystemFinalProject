<?php
include 'preAbstract.php';
/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 7/1/2017
 * Time: 5:01 PM
 */
class Prescription extends preAbstract
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

    public function getCase()
    {
        return $this->Case_Histroy;
        // TODO: Implement getCase() method.
    }

    public function setCase($Case_Histroy)
    {
        // TODO: Implement setCase() method.
    }

    public function getmedication()
    {
        return $this->medication;
        // TODO: Implement getmedication() method.
    }

    public function setmedication($medication)
    {
        // TODO: Implement setmedication() method.
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
        $this->db->select('prescription','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        $this->id=$res[0]['id'];
        $this->Date=$res[0]['Date'];
        $this->UserName=$res[0]['UserName'];
        $this->Doctor=$res[0]['Doctor'];
        $this->Case_Histroy=$res[0]['Case_Histroy'];
        $this->medication=$res[0]['medication'];
        $this->Note=$res[0]['Note'];

    }

    public function setbulk($Doctor, $Date, $Case_Histroy, $medication, $note)
    {
        $this->db->connect();
        $this->db->update('prescription',array('Doctor'=>$Doctor,'Date'=>$Date,'Case_Histroy'=>$Case_Histroy,'medication'=>$medication,'note'=>$note),'UserName="'.$this->UserName.'"'); // Table name, column names and values, WHERE conditions

        // TODO: Implement setbulk() method.
    }
    public function getresults(){
        $que='username="'.$this->username.'"';
        $this->db->connect();
        $this->db->select('prescription','*',NULL,$que,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
}
