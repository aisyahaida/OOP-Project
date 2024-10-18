<?php

class Divisi {
    private $namaDivisi;
    private $lokasiDivisi;

    public function __construct($namaDivisi, $lokasiDivisi) {
        $this->namaDivisi = $namaDivisi;
        $this->lokasiDivisi = $lokasiDivisi;
    }

    public function getDivisiInfo() {
        return "Divisi: " . $this->namaDivisi . " - Lokasi: " . $this->lokasiDivisi;
    }
}

class Role {
    public $idRole;
    public $namaRole;
    public $descRole;
    public $statusJob;
    private $divisi; 

    public function __construct($idRole, $namaRole, $descRole, $statusJob, $namaDivisi, $lokasiDivisi) {
        $this->idRole = $idRole;
        $this->namaRole = $namaRole;
        $this->descRole = $descRole;
        $this->statusJob = $statusJob;
        $this->divisi = new Divisi($namaDivisi, $lokasiDivisi);
    }

    public function tampilkanInfoRole() {
        echo "ID Role: " . $this->idRole . "<br>";
        echo "Nama Role: " . $this->namaRole . "<br>";
        echo "Deskripsi Role: " . $this->descRole . "<br>";
        echo "Status Role: " .$this->statusJob."<br>";
        echo $this->divisi->getDivisiInfo() . "<br>";
        echo "<br>";
    }
}



?>
