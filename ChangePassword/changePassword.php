<?php

include "../Adaptor/mysql_crud.php";
include "changepasswordclass.php";
$changpassword=new changepasswordclass();
switch ($_REQUEST['type']) {
    case 'admin':
        if($changpassword->changepw($_REQUEST['current_pass'],$_REQUEST['new_pass'],$_REQUEST['type'],$_REQUEST['username'])){
            ?>
            <div class="alert alert-success" id="alert"><strong><?php echo "Changed succesfully"; ?></strong></div>
            <?php
        }
        else{
            ?>

            <div class="alert alert-danger" id="alert"><strong><?php echo "Check Currrent password"; ?></strong></div>
            <?php
        }
        break;
    case 'nurse':
        if($changpassword->changepw($_REQUEST['current_pass'],$_REQUEST['new_pass'],$_REQUEST['type'],$_REQUEST['username'])){
            ?>
            <div class="alert alert-success" id="alert"><strong><?php echo "Changed succesfully"; ?></strong></div>
            <?php
        }
        else{
            ?>

            <div class="alert alert-danger" id="alert"><strong><?php echo "Check Currrent password"; ?></strong></div>
            <?php
        }
        break;
    case 'patient':
        if($changpassword->changepw($_REQUEST['current_pass'],$_REQUEST['new_pass'],$_REQUEST['type'],$_REQUEST['username'])){
            ?>
            <div class="alert alert-success" id="alert"><strong><?php echo "Changed succesfully"; ?></strong></div>
            <?php
        }
        else{
            ?>

            <div class="alert alert-danger" id="alert"><strong><?php echo "Check Currrent password"; ?></strong></div>
            <?php
        }
        break;
    case 'receptionist':
        if($changpassword->changepw($_REQUEST['current_pass'],$_REQUEST['new_pass'],$_REQUEST['type'],$_REQUEST['username'])){
            ?>
            <div class="alert alert-success" id="alert"><strong><?php echo "Changed succesfully"; ?></strong></div>
            <?php
        }
        else{
            ?>

            <div class="alert alert-danger" id="alert"><strong><?php echo "Check Old password"; ?></strong></div>
            <?php
        }
        break;
    case 'pharmacist':
        if($changpassword->changepw($_REQUEST['current_pass'],$_REQUEST['new_pass'],$_REQUEST['type'],$_REQUEST['username'])){
            ?>
            <div class="alert alert-success" id="alert"><strong><?php echo "Changed succesfully"; ?></strong></div>
            <?php
        }
        else{
            ?>

            <div class="alert alert-danger" id="alert"><strong><?php echo "Check Old password"; ?></strong></div>
            <?php
        }
        break;
    case 'doctor':
        if($changpassword->changepw($_REQUEST['current_pass'],$_REQUEST['new_pass'],$_REQUEST['type'],$_REQUEST['username'])){
            ?>
            <div class="alert alert-success" id="alert"><strong><?php echo "Changed succesfully"; ?></strong></div>
            <?php
        }
        else{
            ?>

            <div class="alert alert-danger" id="alert"><strong><?php echo "Check Old password"; ?></strong></div>
            <?php
        }
        break;
}
?>