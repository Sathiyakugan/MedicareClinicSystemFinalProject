<?php

/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 7/5/2017
 * Time: 3:21 PM
 */
 abstract class paidpatiaintAbs
{

     protected $id;
     protected $dusername;
     protected $pusername;
     protected $consulancyFees;
     protected $appoinmentDate;
     protected $appoinmentTime;
     protected $postingDate;

     protected $db;
     //essential constructor
     public function __construct($dusername){
         $this->dusername=$dusername;
         $this->db=Database::getInstance();

     }
     abstract public function getID();
     abstract public function setID($id);
     abstract public function getDUsername();
     abstract public function setDUserName($dusername);
     abstract public function getPUsername();
     abstract public function setPUserName($pusername);
     abstract public function getconsulancyFees();
     abstract public function setconsulancyFees($consulancyFees);
     abstract public function getAppoinmentDate();
     abstract public function setAppoinmentDate($appoinmentDate);
     abstract public function getAppoinmentTime();
     abstract public function setAppoinmentTime($appoinmentTime);
     abstract public function getPostingDate();
     abstract public function setPostingDate($postingDate);



     abstract public function loadotherProperties();


}