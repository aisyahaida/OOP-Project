<?php
require_once 'model/role_model.php';
require_once 'model/barang_model.php';
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

                    header(header: 'location: index.php?modul=role');
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
                header(header: 'Location: index.php?modul=role');
                exit;
            default:
            $roles = $obj_modelRole->getAllRoles();
            include 'views/role_list.php';   
            break;

        } break;
    case 'barang':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_modelBarang = new ModelBarang();  
        echo $fitur;
        switch ($fitur){
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $barang_nama = $_POST['barang_nama'];
                    $barang_stok = $_POST['barang_stok'];
                    $barang_harga = $_POST['barang_harga'];

                    $obj_modelBarang->addBarang($barang_nama,$barang_stok,$barang_harga);

                    header(header: 'location: index.php?modul=barang');
                    exit;
                } else {
                    include 'views/barang_input.php';
                }
                break;
            case 'delete':
                if (!isset($_GET['id']) || empty($_GET['id'])) {
                    die("Id Peran Tidak Ditemukan.");
                }
                $id = $_GET['id'];
                $cek = $obj_modelBarang->getBarangById(barang_id: $id);
                if (!$cek) {
                    die("Role Tidak Ditemukan.");
                }
                $obj_modelBarang->deleteBarang(barang_id: $id);
                header(header: 'Location: index.php?modul=barang');
                exit;
                break;
            break;

            default:
                $barangs = $obj_modelBarang->getAllBarangs();
                // print_r($barangs);
                include 'views/barang_list.php';
            break;    
        }    
        break;

    default:
    include 'views/kosong.php';
    break;   
   
}
 ?>