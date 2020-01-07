<?php

/**
 * Created by PhpStorm.
 * User: -
 * Date: 7/13/2017
 * Time: 12:43 PM
 */
class changepasswordclass
{
    private $db;
    public function __construct(){
        $this->db=Database::getInstance();

    }
    public function changepw($current_pw,$new_pw,$type,$username){
        $this->db->connect();
        $quer = 'username="'.$username.'" AND password="'.$current_pw.'"';
        $this->db->select($type,'*',NULL,$quer,NULL);
        $results=$this->db->getResult();
        if (sizeof($results)>0){
            $this->db->update($type,array('password'=>$new_pw),'username="'.$username.'"'); // Table name, column names and values, WHERE conditions;
            return true;
        }
        else{
            return false;
        }
    }
}

