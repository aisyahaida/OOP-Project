<?php
require_once 'model/aggregation_model.php';

echo "=== TESTING AGGREGATION MODEL ===<br>";

$divisiKeuangan = new Divisi("Keuangan", "Lantai 3");
$divisiIT = new Divisi("IT", "Lantai 2");

$roleModel = new RoleModel();


$roleModel->tambahRole(1, "Pengembang", "Mengembangkan software", "aktif", $divisiIT);
$roleModel->tambahRole(2, "Analis", "Menganalisis data", "nonaktif", $divisiIT);

echo "<strong>Daftar Role Sebelum Penghapusan:</strong><br>";
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoRole();
}

$roleModel->hapusRole(1);
echo "<br><strong>Daftar Role Setelah Role Kasir Dihapus:</strong><br>";
foreach ($roleModel->getAllRoles() as $role) {
    $role->tampilkanInfoRole();
}
?>
