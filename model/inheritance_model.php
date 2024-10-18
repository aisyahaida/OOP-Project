<?php
require_once '<domain_object/inheritance_role.php';

class RoleModel
{
    private $roles = [];

    public function tambahRole($idRole, $namaRole, $descRole, $statusJob, $namaDivisi)
    {
        $role = new Role($idRole, $namaRole, $descRole, $statusJob, $namaDivisi);
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
