<?php

class Doctor extends User
{
    private $field;
    private $description;
    private $fees;
    private $timeslots;

    public function __construct($username){
        parent::__construct($username);
        $this->loadotherProperties();
    }
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }


    public function setFirstName($firstName)
    {
        $this->db->connect();
        $this->firstName = $firstName;
        $this->db->update('doctor',array('first_name'=>$firstName),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }


    public function getLastName()
    {
        return $this->lastName;

    }


    public function setLastName($lastName)
    {
        $this->db->connect();
        $this->lastName = $lastName;
        $this->db->update('doctor',array('last_name'=>$lastName),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }


    public function getSex()
    {
        return $this->sex;

    }


    public function setSex($sex)
    {
        $this->db->connect();
        $this->sex = $sex;
        $this->db->update('doctor',array('sex'=>$sex),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }


    public function getDOB()
    {
        return $this->DOB;

    }


    public function setDOB($DOB)
    {
        $this->db->connect();
        $this->DOB = $DOB;
        $this->db->update('doctor',array('DOB'=>$DOB),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions

    }


    public function getAddress()
    {
        return $this->address;
    }


    public function setAddress($address)
    {
        $this->db->connect();
        $this->address = $address;
        $this->db->update('doctor',array('address'=>'"'.$address.'"'),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->db->connect();
        $this->email = $email;
        $this->db->update('doctor',array('email'=>$email),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }


    public function getUserImage()
    {
        return $this->user_image;
    }


    public function setUserImage($user_image)
    {
        $this->db->connect();
        $this->user_image = $user_image;
        $this->db->update('doctor',array('user_image'=>$user_image),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param mixed $field
     */
    public function setField($field)
    {
        $this->db->connect();
        $this->field = $field;
        $this->db->update('doctor',array('user_image'=>$field),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->db->connect();
        $this->description = $description;
        $this->db->update('doctor',array('description'=>$description),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @param mixed $fees
     */
    public function setFees($fees)
    {
        $this->db->connect();
        $this->fees = $fees;
        $this->db->update('doctor',array('fees'=>$fees),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->db->connect();
        $this->user_image = $phone;
        $this->db->update('doctor',array('phone'=>$phone),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions;
    }

    /**
     * @return mixed
     */
    public function getTimeslots()
    {
        $quer='username="'.$this->username.'"';
        $this->db->connect();
        $this->db->select('doctor_appointment_time','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        return $this->db->getResult();
    }

    /**
     * @param mixed $timeslots
     */
    public function setTimeslots($timeslots)
    {
        $this->db->connect();
        $this->deleteCurrentSlots();
        foreach ($timeslots as $value){
            $this->db->insert('doctor_appointment_time',array('username'=>$this->username,'timeslot'=>$value));  // Table name, column names and respective values
        }

    }
    Public function deleteCurrentSlots(){
        $this->db->connect();
        $this->db->delete('doctor_appointment_time','username="'.$this->username.'"');  // Table name, WHERE conditions
    }

    public function SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$field,$description,$phone,$fees,$timeslots){
        $this->db->connect();
        $this->db->update('doctor',array('first_name'=>$firstName,'last_name'=>$lastName,'sex'=>$sex,'DOB'=>$DOB,'address'=>$address,'email'=>$email,'user_image'=>$user_image,'field'=>$field,'description'=>$description,'phone'=>$phone,'fees'=>$fees),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
        $this->setTimeslots($timeslots);

    }

    Public function loadotherProperties(){
        $quer='username="'.$this->username.'"';
        $this->db->connect();
        $datafalg =$this->db->select('doctor','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        $this->firstName=$res[0]['first_name'];
        $this->lastName=$res[0]['last_name'];
        $this->sex=$res[0]['sex'];
        $this->DOB=$res[0]['DOB'];
        $this->address=$res[0]['address'];
        $this->email=$res[0]['email'];
        $this->user_image=$res[0]['user_image'];
        $this->field=$res[0]['field'];
        $this->description=$res[0]['description'];
        $this->phone=$res[0]['phone'];
        $this->fees=$res[0]['fees'];
        $this->timeslots= $this->getTimeslots();

    }
    public function loadBulk($username){
        $quer='username="'.$username.'"';
        $this->db->connect();
        $this->db->select('doctor','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        array_push($res,$this->getTimeslots());
        return $res;
    }

}