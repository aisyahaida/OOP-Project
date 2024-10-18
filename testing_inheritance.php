<?php
require_once 'model/inheritance_model.php';

echo "=== TESTING COMPOSITE MODEL ===<br>";

$roleModel = new RoleModel();


$roleModel->tambahRole(1, "Pengembang", "Mengembangkan software", "aktif", "Divisi IT");
$roleModel->tambahRole(2, "Analis", "Menganalisis data", "nonaktif", "Divisi Analis System");

echo "<strong>Daftar Role Sebelum Penghapusan:</strong><br>";
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoRole();
}

$roleModel->hapusRole(1);
echo "<br><strong>Daftar Role Setelah Role Pengembang Dihapus:</strong><br>";
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoRole();
}
?>
