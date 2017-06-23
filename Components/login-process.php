<?php
/**
 * Created by PhpStorm.
 * User: -
 * Date: 4/12/2017
 * Time: 5:00 PM
 */
echo "dsdsd";

include "../Adaptor/mysql_crud.php";
class UserLogin
{
    private $username;
    private $password;
    private $postition;
    private $db;
    public function __construct($username,$password,$postition)
    {
        $this->username=$username;
        $this->password=$password;
        $this->postition=$postition;
        $this->db = Database::getInstance();

    }


    /*** for login process ***/
    public function check_login()
    {
        $quer='username="'.$this->username.'" AND password="'.$this->password.'"';
        print($quer);
        $this->db->connect();

        switch($this->postition) {
            case 'Admin':
                print ("now in admin if");
                $datafalg=$this->db->select('admin','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0) {

                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['username']=$this->username;
                    echo $_SESSION['username'];
                    header("location:../Admin/admindashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    header("location:../index.php?username=$this->username&request=login&status=success");
                }
                break;

            //header("location:../UserDashboards/admindashboard.php?username=$this->username&request=login&status=success");
            Case 'Patient' :
                $datafalg=$this->db->select('patient','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0){
                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['username']=$this->username;
                    header("location:../UserDashboards/patientdashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    header("location:../index.php?username=$this->username&request=login&status=success");
                }
                break;
            Case   'Doctor':
                $datafalg=$this->db->select('doctor','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0){
                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['username']=$this->username;
                    header("location:../UserDashboards/doctordashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    header("location:../index.php?username=$this->username&request=login&status=success");
                }
                break;

            Case  'Receptionist':
                $datafalg=$this->db->select('receptionist','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0){
                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['username']=$this->username;
                    header("location:../UserDashboards/receptionistdashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    header("location:../index.php?username=$this->username&request=login&status=success");
                }
                break;

            Case 'Pharmasist':
                $datafalg=$this->db->select('pharmasist','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0){
                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['username']=$this->username;
                    header("location:../UserDashboards/pharmasistdashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    header("location:../index.php?username=$this->username&request=login&status=success");
                }
                break;

            Case   'Nurse':
                $datafalg=$this->db->select('nurse','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0){
                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['username']=$this->username;
                    header("location:../UserDashboards/nursedashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    header("location:../index.php?username=$this->username&request=login&status=success");
                }
                break;

        }
    }

    public function get_session()
    {
        return $this->username;
    }
    /*** starting the session ***/
    public function get_username()
    {
        $_SESSION['username']=$this->username;
        return $_SESSION['username'];
    }

    public function user_logout()
    {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

}

echo "dsdsd";
session_start();
if (isset($_REQUEST['login'])){
    echo "dsdsd";
    echo "this is admin page";
    echo $_REQUEST['postition'];
    $userLogin=new UserLogin($_REQUEST['username'],$_REQUEST['password'],$_REQUEST['postition']);
    $userLogin->check_login();
}

?>