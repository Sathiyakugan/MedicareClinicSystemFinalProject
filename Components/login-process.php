<?php
/**
 * Created by PhpStorm.
 * User: -
 * Date: 4/12/2017
 * Time: 5:00 PM
 */

include "../Adaptor/mysql_crud.php";
class UserLogin
{
    private $username;
    private $password;
    private $postition;
    private $db;
    private $uip;
    private $session_id;
    public function __construct($username,$password,$postition)
    {
        $this->username=$username;
        $this->password=$password;
        $this->postition=$postition;
        $this->db = Database::getInstance();
        $this->userip=$_SERVER['REMOTE_ADDR'];

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
                    $_SESSION['current_user']=$this->username;

                    echo $_SESSION['current_user'];
                    $this->add_loginlog($this->username,$this->userip,1,'Admin');
                    $_SESSION['session_id']=$this->session_id;
                    header("location:../Admin/admindashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    $this->add_loginlog($this->username,$this->userip,0,'Admin');
                    header("location:../index.php?username=$this->username&request=login&status=Failed");
                }
                break;

            //header("location:../UserDashboards/admindashboard.php?username=$this->username&request=login&status=success");
            Case 'Patient' :
                $datafalg=$this->db->select('patient','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0){
                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['current_user']=$this->username;
                    $this->add_loginlog($this->username,$this->userip,1,'Patient');
                    $_SESSION['session_id']=$this->session_id;
                    header("location:../Patient/patientdashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    $this->add_loginlog($this->username,$this->userip,0,'Patient');
                    header("location:../index.php?username=$this->username&request=login&status=Failed");
                }
                break;
            Case   'Doctor':
                $datafalg=$this->db->select('doctor','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0){
                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['current_user']=$this->username;
                    $this->add_loginlog($this->username,$this->userip,1,'Doctor');
                    $_SESSION['session_id']=$this->session_id;
                    header("location:../Doctor/doctordashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    $this->add_loginlog($this->username,$this->userip,0,'Doctor');
                    header("location:../index.php?username=$this->username&request=login&status=Failed");
                }
                break;

            Case  'Receptionist':
                $datafalg=$this->db->select('receptionist','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0){
                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['current_user']=$this->username;
                    $this->add_loginlog($this->username,$this->userip,1,'Receptionist');
                    $_SESSION['session_id']=$this->session_id;
                    header("location:../Receptionist/receptionistdashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    $this->add_loginlog($this->username,$this->userip,0,'Receptionist');
                    header("location:../index.php?username=$this->username&request=login&status=Failed");
                }
                break;

            Case 'Pharmasist':
                $datafalg=$this->db->select('pharmasist','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0){
                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['current_user']=$this->username;
                    $this->add_loginlog($this->username,$this->userip,1,'Pharmacist');
                    $_SESSION['session_id']=$this->session_id;
                    header("location:../UserDashboards/pharmasistdashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    $this->add_loginlog($this->username,$this->userip,0,'Pharmacist');
                    header("location:../index.php?username=$this->username&request=login&status=Failed");
                }
                break;

            Case   'Nurse':
                $datafalg=$this->db->select('nurse','username,password',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                $res = $this->db->getResult();
                if(sizeof($res)>0){
                    $_SESSION['login'] = true; // this login var will use for the session thing
                    $_SESSION['current_user']=$this->username;
                    $this->add_loginlog($this->username,$this->userip,1,'Nurse');
                    $_SESSION['session_id']=$this->session_id;
                    header("location:../Nurse/nursedashboard.php?username=$this->username&request=login&status=success");
                }
                else{
                    $_SESSION['message']="<font color=red>Invalid login Try Again</font>";
                    $this->add_loginlog($this->username,$this->userip,0,'Nurse');
                    header("location:../index.php?username=$this->username&request=login&status=Failed");
                }
                break;

        }
    }

    public function add_loginlog($username,$userip,$status,$type){
        $this->db->insert('userlog',array('username'=>$username,'userip'=>$userip,'status'=>$status,'type'=>$type));  // Table name, column names and respective values
        $quer='username="'.$username.'" AND type="'.$type.'"';
        $this->db->select('userlog','*',NULL,$quer,NULL);
        $res = $this->db->getResult();
        echo $res[0];
        $this->session_id=$res[0];
    }


    public function get_session()
    {
        return $this->username;
    }
    /*** starting the session ***/
    public function get_username()
    {
        $_SESSION['current_user']=$this->username;
        return $_SESSION['current_user'];
    }

    public function user_logout()
    {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

}


session_start();
if (isset($_REQUEST['login'])){
    echo "this is admin page";
    echo $_REQUEST['postition'];
    $userLogin=new UserLogin($_REQUEST['username'],$_REQUEST['password'],$_REQUEST['postition']);
    $userLogin->check_login();
}

?>