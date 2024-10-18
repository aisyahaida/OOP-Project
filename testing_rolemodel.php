<?php
require_once 'model/role_model.php';

$objRole = new RoleModel();
$objRole->addRole("Pengembang", "Mengembangkan Software", 0);
$objRole->addRole("Analis Data", "Menganalisis Data", 1);
$objRole->addRole("Pengguna", "Pengguna Aplikasi", 1);

foreach ($objRole->getRoles() as $role) {
    echo "Role ID : ".$role->role_id."<br>";
    echo "Nama : ".$role->role_name."<br>";
    echo "Deskripsi : ".$role->role_description."<br>";
    echo "Status Role : ".$role->role_status."<br>";
}
?>


