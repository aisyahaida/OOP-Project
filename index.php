<?php
// require_once 'domain_object/node_role.php';

// $obj_role = [];
// $obj_role[] = new Role(1, "Kasir", "Untuk kasir", 1);
// $obj_role[] = new Role(2, "Admin", "Untuk admin", 0);
// $obj_role[] = new Role(3, "Owner", "Untuk owner", 1);
// $obj_role[] = new Role(4, "Customer", "Untuk pelanggan", 1);

// // foreach ($obj_role as $role){
// //     echo "Id Role : ".$role->role_id."<br>";
// //     echo "Nama Role : ".$role->role_name."<br>";
// //     echo "Keterangan : ".$role->role_description."<br>";
// //     echo "Status Role : ".$role->role_status."<br>";
// // }


// include 'views/role_list.php';
require_once 'model/role_model.php';
session_start();

if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = 'dashboard';
}

switch($modul) {
    case 'dashboard':
    include 'views/kosong.php';
    break;
    case 'role':
    $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
    $obj_modelRole = new ModelRole();

    switch ($fitur) {
        case 'add':
            $role_name = $_POST['role_name'];
            $role_desc = $_POST['role_description'];
            $role_status = $_POST['role_status'];

            $obj_modelRole->addRole($role_name,$role_desc,$role_status);

            header('location: index.php?modul=role');
            break;
        default:
        $roles = $obj_modelRole->getAllRoles();
        include 'views/role_list.php';   
    }    
   
   
    break;
}
 ?>