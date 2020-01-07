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

    public function update($UserName,$Doctor,$Case_Histroy, $medication,$Note,$ref_number)
    {
        $this->db->connect();
        $this->db->update('prescription',array('UserName'=>$UserName,'Doctor'=>$Doctor,'Case_Histroy'=>$Case_Histroy,'medication'=>$medication,'Note'=>$Note),'ref_number="'.$ref_number.'"'); // Table name, column names and values, WHERE conditions

    }
    public function getresults(){
        $que='username="'.$this->username.'"';
        $this->db->connect();
        $this->db->select('prescription','*',NULL,$que,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function insert($UserName,$Doctor,$Case_Histroy, $medication,$Note,$ref_number){
        $this->db->connect();
        $this->db->insert('prescription',array('UserName'=>$UserName,'Doctor'=>$Doctor,'Case_Histroy'=>$Case_Histroy,'medication'=>$medication,'Note'=>$Note,'ref_number'=>$ref_number));  // Table name, column names and respective values
    }
    public function getresultsbydoctor($pname,$dname,$id){
        $que = 'UserName="' . $pname . '" AND Doctor="' . $dname . '"AND NOT ref_number="' . $id . '"';
        $this->db->connect();
        $this->db->select('prescription','*',NULL,$que,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        print_r($res);
        return $res;
    }
    public function getresultsbyothers($pname,$dname){
        $que = 'UserName="' . $pname . '" AND NOT Doctor="' . $dname . '"';
        $this->db->connect();
        $this->db->select('prescription','*',NULL,$que,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function getresultsbyID($id){
        $que='ref_number="'.$id.'"';
        $this->db->connect();
        $this->db->select('prescription','*',NULL,$que,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function checkentry($id){
        $que='ref_number="'.$id.'"';
        $this->db->connect();
        $this->db->select('prescription','*',NULL,$que,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        if(sizeof($res)>0)
        return true;
    }


}
