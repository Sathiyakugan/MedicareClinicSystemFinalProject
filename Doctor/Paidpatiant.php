<<<<<<< HEAD
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
        $this->consulancyFees=$res[0]['consultancyFees'];
        $this->appoinmentDate=$res[0]['appointmentDate'];
        $this->appoinmentTime=$res[0]['appointmentTime'];
        $this->postingDate=$res[0]['postingDate'];
    }
    public function getresults(){
        $que='dusername="'.$this->dusername.'"';
        $this->db->connect();
        $this->db->select('paidpatients','*',NULL,$que,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function  getresultstofday($dusername){
        $appointmentDate=date("Y-m-d");
        $viewed=0;
//        $new_time = DateTime::createFromFormat('h:i A', date("h:i:sa"));
//        $appointmentTime=$new_time->format('H:i:s');
        $quer = 'dusername="'.$dusername.'" AND appointmentDate="' .$appointmentDate.'"AND viewed="'.$viewed.'"';
        $this->db->connect();
        $this->db->select('paidpatients','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;

    }

    public function  getresultsnotviewed($dusername){
        $viewed=0;
        $quer = 'dusername="'.$dusername.'" AND viewed="'.$viewed.'"';
        $this->db->connect();
        $this->db->select('paidpatients','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;

    }

    public function  getresultsviewed($dusername){
        $appointmentDate=date("Y-m-d");
        $viewed=1;
        $quer = 'dusername="'.$dusername.'" AND viewed="'.$viewed.'"';
        $this->db->connect();
        $this->db->select('paidpatients','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;

    }
=======
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
        $this->consulancyFees=$res[0]['consultancyFees'];
        $this->appoinmentDate=$res[0]['appointmentDate'];
        $this->appoinmentTime=$res[0]['appointmentTime'];
        $this->postingDate=$res[0]['postingDate'];
    }
    public function getresults(){
        $que='dusername="'.$this->dusername.'"';
        $this->db->connect();
        $this->db->select('paidpatients','*',NULL,$que,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function  getresultstofday($dusername){
        $appointmentDate=date("Y-m-d");
        $viewed=0;
//        $new_time = DateTime::createFromFormat('h:i A', date("h:i:sa"));
//        $appointmentTime=$new_time->format('H:i:s');
        $quer = 'dusername="'.$dusername.'" AND appointmentDate="' .$appointmentDate.'"AND viewed="'.$viewed.'"';
        $this->db->connect();
        $this->db->select('paidpatients','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;

    }

    public function  getresultsnotviewed($dusername){
        $viewed=0;
        $quer = 'dusername="'.$dusername.'" AND viewed="'.$viewed.'"';
        $this->db->connect();
        $this->db->select('paidpatients','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;

    }

    public function  getresultsviewed($dusername){
        $appointmentDate=date("Y-m-d");
        $viewed=1;
        $quer = 'dusername="'.$dusername.'" AND viewed="'.$viewed.'"';
        $this->db->connect();
        $this->db->select('paidpatients','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;

    }
    public function setResultbyViewed($id)
    {
        $viewed = 1;
        echo($id);
        $quer = 'id="' . $id . '"';
        $this->db->connect();
        $this->db->update('paidpatients', array('viewed' => $viewed), $quer); // Table name, column names and values, WHERE conditions

    }
>>>>>>> 67d08a6c063055685503fcdd53b5b9b9317562ad
}