<?php
require_once 'model/composite_model.php';

echo "=== TESTING COMPOSITE MODEL ===<br>";

$roleModel = new RoleModel();


$roleModel->tambahRole(1, "Pengembang", "Mengembangkan software", "aktif", "Pembuat", "Lantai 2");
$roleModel->tambahRole(2, "Analis", "Menganalisis data", "nonaktif", "Penganalis", "Lantai 5");

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
