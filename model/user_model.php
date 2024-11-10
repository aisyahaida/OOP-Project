<!-- <?php

require_once 'domain_object/node_user.php';
require_once 'role_model.php';

class modelUser{
    private $users = [];
    private $nextId = 1;

    public function __construct(){
        if(isset($_SESSION['users'])){
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = count($this->users) + 1;
        }else{
            $this->initiliazeDefaultUser();
        }
    }

    public function addUser($role, $username, $password, $nama){
        $user = new nodeUser($role, $this->nextId++, $username, $password, $nama);
        $this->users[] = $user;
        $this->saveToSession();
    }

    private function saveToSession(){
        $_SESSION['users'] = serialize($this->users);
    }

    public function getAllUsers(){
        return $this->users;
    }

    private function initiliazeDefaultUser(){
        $roles = new ModelRole();
        $role3 = $roles->getRoleById(3);
        $role1 = $roles->getRoleById(1);
        $this->addUser($role3, "Kasir1 ", "Kasir1", "Aisyah");
        $this->addUser($role1, "Admin1", "Admin1", "Aida");
    }

    public function updateUser($id, $role, $username, $password, $nama){
        foreach ($this->users as $user){
            if ($user->userId == $id){
                $user->role = $role;
                $user->username = $username;
                $user->password = $password;
                $user->nama = $nama;
                $this->saveToSession();
                return true;
            }
        }
        return null;
    }

    public function deleteUser($id){
        foreach ($this->users as $key=>$user){
            if ($user->userId){
                unset($this->users[$key]);
                $this->users = array_values($this->users);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    
    public function getUserById($id){
        foreach ($this->users as $user){
            if ($user->userId == $id){
                return $user;
            }
        }
        return null;
    }

    public function getUserByName($name){
        foreach ($this->users as $user){
            if ($user->name == $name){
                return $user;
            }
        }
        return null;
    }
}

?> -->