<?php

class Appointment_cl
{
    protected $db;

    //essential constructor

    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    public function getfullresults()
    {
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, NULL, NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }


    public function getresultsbyDoctor($dusername)
    {
        $quer = 'dusername="' . $dusername . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyPati($pusername)
    {
        $quer = 'pusername="' . $pusername . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyDocApproved($dusername)
    {
        $doctorStatus = 2;
        $quer = 'dusername="' . $dusername . '" AND doctorStatus="' . $doctorStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyDocPending($dusername)
    {
        $doctorStatus = 1;
        $quer = 'dusername="' . $dusername . '" AND doctorStatus="' . $doctorStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyDocCanceled($dusername)
    {
        $doctorStatus = 0;
        $quer = 'dusername="' . $dusername . '" AND doctorStatus="' . $doctorStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyPatiApproved($pusername)
    {
        $doctorStatus = 2;
        $quer = 'pusername="' . $pusername . '" AND doctorStatus="' . $doctorStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyPatiPending($pusername)
    {
        $doctorStatus = 1;
        $quer = 'pusername="' . $pusername . '" AND doctorStatus="' . $doctorStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyPatiCanceled($pusername)
    {
        $doctorStatus = 0;
        $quer = 'pusername="' . $pusername . '" AND doctorStatus="' . $doctorStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyPatiPaid($pusername)
    {
        $patientStatus = 2;
        $quer = 'pusername="' . $pusername . '" AND patientStatus="' . $patientStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyPatiNotpaid($pusername)
    {
        $patientStatus = 1;
        $quer = 'pusername="' . $pusername . '" AND patientStatus="' . $patientStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function approve($id)
    {
        $doctorStatus = 2;
        echo($id);
        $quer = 'id="'.$id.'"';
        $this->db->connect();
        $this->db->update('appointment',array('doctorStatus'=>$doctorStatus),$quer); // Table name, column names and values, WHERE conditions
        $res = $this->db->getResult();
        return $res;
    }
    public function cancel($id)
    {
        $doctorStatus = 0;
        $quer = 'id="'.$id.'"';
        $this->db->connect();
        $this->db-> update('appointment',array('doctorStatus'=>$doctorStatus),$quer); // Table name, column names and values, WHERE conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyAdminApproved()
    {
        $doctorStatus = 2;
        $quer = 'doctorStatus="' . $doctorStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyAdminPending()
    {
        $doctorStatus = 1;
        $quer = 'doctorStatus="' . $doctorStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyAdminCanceled()
    {
        $doctorStatus = 0;
        $quer = 'doctorStatus="' . $doctorStatus . '"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, 'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsbyID($id)
    {
        $quer = 'id="'.$id.'"';
        $this->db->connect();
        $this->db->select('appointment', '*', NULL, $quer, NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

}