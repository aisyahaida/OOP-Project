<?php

class Divisi {
    protected $namaDivisi;

    public function __construct($namaDivisi) {
        $this->namaDivisi = $namaDivisi;
    }

    public function getNamaDivisi() {
    return $this->namaDivisi;
    }
}

class Role extends Divisi {
    public $idRole;
    public $namaRole;
    public $descRole;
    public $statusJob;

    public function __construct($idRole, $namaRole, $descRole, $statusJob, $namaDivisi) {
        parent::__construct($namaDivisi);
        $this->idRole = $idRole;
        $this->namaRole = $namaRole;
        $this->descRole = $descRole;
        $this->statusJob = $statusJob;
    }

    public function tampilkanInfoRole() {
        echo "Nama Divisi: ".$this->getNamaDivisi()."<br>";
        echo "ID Role: " . $this->idRole . "<br>";
        echo "Nama Role: " . $this->namaRole . "<br>";
        echo "Deskripsi Role: " . $this->descRole . "<br>";
        echo "Status Role: " .$this->statusJob."<br>";
        echo "<br>";
    }
}

?>
