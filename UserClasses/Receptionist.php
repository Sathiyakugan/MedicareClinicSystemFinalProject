<?php

/**
 * Created by PhpStorm.
 * User: -
 * Date: 6/22/2017
 * Time: 8:42 PM
 */
class Receptionist
{
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
        $this->db->update('receptionist',array('first_name'=>'"'.$firstName.'"'),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }


    public function getLastName()
    {
        return $this->lastName;

    }


    public function setLastName($lastName)
    {
        $this->db->connect();
        $this->lastName = $lastName;
        $this->db->update('receptionist',array('last_name'=>'"'.$lastName.'"'),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }


    public function getSex()
    {
        return $this->sex;

    }


    public function setSex($sex)
    {
        $this->db->connect();
        $this->sex = $sex;
        $this->db->update('receptionist',array('sex'=>'"'.$sex.'"'),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }


    public function getDOB()
    {
        return $this->DOB;

    }


    public function setDOB($DOB)
    {
        $this->db->connect();
        $this->DOB = $DOB;
        $this->db->update('receptionist',array('DOB'=>'"'.$DOB.'"'),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions

    }


    public function getAddress()
    {
        return $this->address;
    }


    public function setAddress($address)
    {
        $this->db->connect();
        $this->address = $address;
        $this->db->update('receptionist',array('address'=>'"'.$address.'"'),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->db->connect();
        $this->email = $email;
        $this->db->update('receptionist',array('email'=>'"'.$email.'"'),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }


    public function getUserImage()
    {
        return $this->user_image;
    }


    public function setUserImage($user_image)
    {
        $this->db->connect();
        $this->user_image = $user_image;
        $this->db->update('receptionist',array('user_image'=>'"'.$user_image.'"'),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions
    }

    public function SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image){
        $this->db->connect();
        $this->user_image = $user_image;
        $this->db->update('receptionist',array('first_name'=>'"'.$firstName.'"','last_name'=>'"'.$lastName.'"','sex'=>'"'.$sex.'"','DOB'=>'"'.$DOB.'"','address'=>'"'.$address.'"','email'=>'"'.$email.'"','user_image'=>'"'.$user_image.'"'),'username="'.$this->username.'"'); // Table name, column names and values, WHERE conditions


    }

    Public function loadotherProperties(){
        $quer='username="'.$this->username.'"';
        $this->db->connect();
        $this->db->select('receptionist','first_name,last_name,sex,DOB,address,email,user_image',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        $this->firstName=$res[0]['first_name'];
        $this->lastName=$res[0]['last_name'];
        $this->sex=$res[0]['sex'];
        $this->DOB=$res[0]['DOB'];
        $this->address=$res[0]['address'];
        $this->email=$res[0]['email'];
        $this->user_image=$res[0]['user_image'];

    }
}