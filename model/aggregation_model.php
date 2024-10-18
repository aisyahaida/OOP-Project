<?php
require_once '<domain_object/aggregation_role.php';

class RoleModel
{
    private $roles = [];

    public function tambahRole($idRole, $namaRole, $descRole, $statusJob, Divisi $divisi)
    {
        $role = new Role($idRole, $namaRole, $descRole, $statusJob, $divisi);
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
