<?php
require_once '<domain_object/composite_role.php';

class RoleModel
{
    private $roles = [];

    public function tambahRole($idRole, $namaRole, $descRole, $statusJob, $namaDivisi, $lokasiDivisi)
    {
        $role = new Role($idRole, $namaRole, $descRole, $statusJob, $namaDivisi, $lokasiDivisi);
        $this->roles[] = $role;
    }

    public function getAllRoles()
    {
        return $this->roles;
    }

    public function hapusRole($idRole)
    {
        foreach ($this->roles as $index => $role) {
            if ($role->idRole == $idRole) {
                unset($this->roles[$index]);
            }
        }
        $this->roles = array_values($this->roles); // Mengatur ulang indeks array
    }
}
?>
