<?php
require_once 'domain_object/node_role.php';

$obj_role = [];
$obj_role[] = new Role(1, "Kasir", "Untuk kasir", 1);
$obj_role[] = new Role(2, "Admin", "Untuk admin", 0);
$obj_role[] = new Role(3, "Owner", "Untuk owner", 1);
$obj_role[] = new Role(4, "Customer", "Untuk pelanggan", 1);

// foreach ($obj_role as $role){
//     echo "Id Role : ".$role->role_id."<br>";
//     echo "Nama Role : ".$role->role_name."<br>";
//     echo "Keterangan : ".$role->role_description."<br>";
//     echo "Status Role : ".$role->role_status."<br>";
// }


include 'views/role_list.php';
?>