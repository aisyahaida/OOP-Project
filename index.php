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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $role_name = $_POST['role_name'];
                $role_desc = $_POST['role_description'];
                $role_status = $_POST['role_status'];

                $obj_modelRole->addRole($role_name,$role_desc,$role_status);

                header(header: 'location: /index.php?modul=role');
                exit;
            } else {
                include 'views/role_add.php';
            }
            break;
        case 'edit':
            if (!isset($_GET['id']) || empty($_GET['id'])) {
                die("Id Peran Tidak Ditemukan.");
            }
            $id = $_GET['id'];
            $role = $obj_modelRole->getRoleById(role_id: $id);

            if (!$role) {
                die("Role Tidak Ditemukan.");
            }
            include 'views/role_update.php';
            break;
        case 'update':
            if (!isset($_GET['id'])) {
                die("Id Peran Tidak Ditemukan.");
            }
            $role_id = $_GET['id'];
            $obj_role = new ModelRole();
            $role = $obj_role->getRoleById(role_id: $role_id);

            if (!$role) {
                die("Peran Tidak Ditemukan.");
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $role_name = $_POST['role_name'];
                $role_desc = $_POST['role_description'];
                $role_status = $_POST['role_status'];

                $obj_role->updateRole($role_id,$role_name,$role_desc,$role_status);

                header(header: 'Location: index.php?modul=role');
                exit;
            }    
        case 'delete':
            if (!isset($_GET['id']) || empty($_GET['id'])) {
                die("Id Peran Tidak Ditemukan.");
            }
            $id = $_GET['id'];
            $cek = $obj_modelRole->getRoleById(role_id: $id);
            if (!$cek) {
                die("Role Tidak Ditemukan.");
            }
            $obj_modelRole->deleteRole(role_id: $id);
            header(header: 'Location: /index.php?modul=role');
            exit;
        default:
        $roles = $obj_modelRole->getAllRoles();
        include 'views/role_list.php';   
        break;
    } break;
    default:
    include 'views/kosong.php';
    break;   
   
   
}
 ?>