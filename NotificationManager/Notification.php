<?php

class Notification
{
    protected $db;

    //essential constructor

    public function __construct(){
        $this->db=Database::getInstance();
    }


    public function getfullresults(){
        $this->db->connect();
        $this->db->select('notifications','*',NULL,NULL,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }


    public function getresultsbyRecep($reci_username,$sender_username,$type,$recep_read){
        $quer='reci_username="'.$reci_username.'" AND sender_username="'.$sender_username.'"AND type="'.$type.'"AND recep_read="'.$recep_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getresultsbyPati($reci_username,$sender_username,$type,$patient_read){
        $quer='reci_username="'.$reci_username.'" AND sender_username="'.$sender_username.'"AND type="'.$type.'"AND patient_read="'.$patient_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getresultsbyDoct($reci_username,$sender_username,$type,$doctor_read){
        $quer='reci_username="'.$reci_username.'" AND sender_username="'.$sender_username.'"AND type="'.$type.'"AND doctor_read="'.$doctor_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getresultsbyNurs($reci_username,$sender_username,$type,$nurse_read){
        $quer='reci_username="'.$reci_username.'" AND sender_username="'.$sender_username.'"AND type="'.$type.'"AND nurse_read="'.$nurse_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getresultsbyPhar($reci_username,$sender_username,$type,$pharm_read){
        $quer='reci_username="'.$reci_username.'" AND sender_username="'.$sender_username.'"AND type="'.$type.'"AND pharm_read="'.$pharm_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getresultsbyAdmin($reci_username,$sender_username,$type,$admin_read	){
        $quer='reci_username="'.$reci_username.'" AND sender_username="'.$sender_username.'"AND type="'.$type.'"AND admin_read="'.$admin_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    //get results by type
    public function getrtypeAdmin($type,$admin_read){
        $quer='type="'.$type.'"AND unread="'.$admin_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }



    //get all by the person
    public function getrdoctor($reci_username,$type,$doctor_read){
        $quer='reci_username="'.$reci_username.'" AND type="'.$type.'"AND doctor_read="'.$doctor_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getradmin($reci_username,$type,$admin_read){
        $quer='reci_username="'.$reci_username.'" AND type="'.$type.'"AND admin_read="'.$admin_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getrpharm($reci_username,$type,$pharm_read){
        $quer='reci_username="'.$reci_username.'" AND type="'.$type.'"AND pharm_read="'.$pharm_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getrnurse($reci_username,$type,$nurse_read){
        $quer='reci_username="'.$reci_username.'" AND type="'.$type.'"AND nurse_read="'.$nurse_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getrrecep($reci_username,$type,$recep_read){
        $quer='reci_username="'.$reci_username.'" AND type="'.$type.'"AND recep_read="'.$recep_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getrpatient($reci_username,$type,$patient_read){
        $quer='reci_username="'.$reci_username.'" AND type="'.$type.'"AND patient_read="'.$patient_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getrfullAdmin($type,$admin_read){
        $quer='type="'.$type.'"AND admin_read="'.$admin_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function Insert($reci_username,$sender_username,$type,$parameters){

        $this->db->connect();
        $this->db->insert('notifications',array('reci_username'=>$reci_username,'sender_username'=>$sender_username,'type'=>$type,'parameters'=>$parameters));  // Table name, column names and respective values

    }
    public function InserttoReceptionApproved($referenceNo,$rusername){
        $this->db->connect();
        $this->db->insert('NotificationApprovedRecep',array('referenceNo'=>$referenceNo,'rusername'=>$rusername));  // Table name, column names and respective values

    }
    public function reset_notificationDoctor($reci_username,$type){
        $doctor_read=1;
        $this->db->connect();
        $quer='reci_username="'.$reci_username.'"AND type="'.$type.'"';
        $this->db->update('notifications',array('doctor_read'=>$doctor_read),$quer); // Table name, column names and values, WHERE conditions
        echo $type."sssss".$reci_username ;
    }

    public function reset_notificationAdmin($type){
        $admin_read=1;
        $quer='type="'.$type.'"';
        $this->db->connect();
        $this->db->update('notifications',array('admin_read'=>$admin_read),$quer); // Table name, column names and values, WHERE conditions
    }
    public function reset_notificationPatient($reci_username,$type){
        $patient_read=1;
        $this->db->connect();
        $quer='reci_username="'.$reci_username.'"AND type="'.$type.'"';
        $this->db->update('notifications',array('patient_read'=>$patient_read),$quer); // Table name, column names and values, WHERE conditions
    }
    public function reset_notificationReceptionist($type){
        $recep_read=1;
        $this->db->connect();
        $quer='type="'.$type.'"';
        $this->db->update('notifications',array('recep_read'=>$recep_read),$quer); // Table name, column names and values, WHERE conditions
    }
    public function getapprovedrecep($rusername){
        $read=0;
        $quer='NotificationApprovedRecep.rusername="'.$rusername.'"AND NotificationApprovedRecep.read="'.$read.'"';
        $this->db->connect();
        $this->db->select('notifications','*','NotificationApprovedRecep ON notifications.id = NotificationApprovedRecep.referenceNo',$quer,NUll); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function getrfull_Approved_recep($type,$recep_read){
        $quer='type="'.$type.'"AND recep_read="'.$recep_read.'"';
        $this->db->connect();
        $this->db->select('notifications','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

}
