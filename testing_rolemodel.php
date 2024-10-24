<?php
session_start();
require_once 'model/role_model.php';

$objRole = new ModelRole();

foreach ($objRole->getAllRoles() as $role){
    echo "Role Id: ".$role->role_id."<br>";
    echo "Role Name: ".$role->role_name."<br>";
    echo "Role Description: ".$role->role_description."<br>";
    echo "Role Status: ".($role->role_status ? 'Active' : 'Inactive')."<br><br>";
}
session_destroy();
?>
