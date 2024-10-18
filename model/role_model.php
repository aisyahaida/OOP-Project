<?php
require_once 'domain_object/node_role.php';

class RoleModel {
    private $roles = [];
    private $nextId = 1;

    public function addRole($roleName, $roleDesc, $roleStatus) {
        $role = new Role($this->nextId++,$roleName,$roleDesc,$roleStatus);
        $this->roles[]=$role;
        $this->saveToSession();
    }
    private function saveToSession() {
        $_SESSION['roles'] = serialize($this->roles);
    }
    public function getRoles() {
        return $this->roles;
    }
}
?>