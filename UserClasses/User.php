<?php

abstract class User{
    protected $username;
    protected $firstName;
    protected $lastName;
    protected $sex;
    protected $DOB;
    protected $address;
    protected $email;
    protected $user_image;
    protected $phone;
    protected $bloodgroup;

    protected $db;
    //essential constructor
    public function __construct($username){
        $this->username=$username;
        $this->db=Database::getInstance();

    }

    abstract public function getUsername();

    //Can't set the user name.

    abstract public function getFirstName();
    abstract public function setFirstName($firstName);
    abstract public function getLastName();
    abstract public function setLastName($lastName);
    abstract public function getSex();
    abstract public function setSex($sex);
    abstract public function getDOB();
    abstract public function setDOB($DOB);
    abstract public function getAddress();
    abstract public function setAddress($address);
    abstract public function getEmail();
    abstract public function setEmail($email);
    abstract public function getUserImage();
    abstract public function setUserImage($user_image);
    abstract public function getPhone();
    abstract public function setPhone($phone);
    //abstract public function SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image);
    abstract public function loadotherProperties();
}
?>