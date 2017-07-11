<?php
/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 7/1/2017
 * Time: 5:01 PM
 */
class Prescription
{
    protected $db;
    public function __construct(){
        $this->db=Database::getInstance();

    }

    public function update($UserName,$Doctor, $Date, $Case_Histroy, $medication,$Note,$ref_number)
    {
        $this->db->connect();
        $this->db->update('prescription',array('Doctor'=>$Doctor,'Date'=>$Date,'Case_Histroy'=>$Case_Histroy,'medication'=>$medication,'Note'=>$Note,'ref_number'=>$ref_number),'UserName="'.$UserName.'"'); // Table name, column names and values, WHERE conditions

        // TODO: Implement setbulk() method.
    }
    public function getresults(){
        $que='username="'.$this->username.'"';
        $this->db->connect();
        $this->db->select('prescription','*',NULL,$que,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function insert($UserName,$Doctor,$Case_Histroy, $medication,$Note,$ref_number){
        $this->db->connect();
        $this->db->insert('prescription',array('UserName'=>$UserName,'Doctor'=>$Doctor,'Case_Histroy'=>$Case_Histroy,'medication'=>$medication,'Note'=>$Note,'ref_number'=>$ref_number));  // Table name, column names and respective values
    }
    public function getresultsbydoctor(){
        $que='username="'.$this->username.'"';
        $this->db->connect();
        $this->db->select('prescription','*',NULL,$que,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getresultsbyothers(){
        $que='username="'.$this->username.'"';
        $this->db->connect();
        $this->db->select('prescription','*',NULL,$que,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
}
