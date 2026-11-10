<?php
// LAB 2 — Class, object, constructor
// Spesifikasi:
//  - Mahasiswa(string $nim, string $nama, string $prodi, float $ipk)
//      info(): string
//      predikat(): string  -> ipk >= 3.51 'Cumlaude', ipk >= 3.01 'Sangat Memuaskan', selain itu 'Memuaskan'
//  - Produk(string $nama, int $harga, int $stok)
//      totalNilai(): int   -> harga x stok

class Mahasiswa
{
    // TODO
    public string $nim;
    public string $nama;
    public string $prodi;
    public float $ipk;

    public function __construct(string $nim, string $nama, string $prodi, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->ipk = $ipk;
    }

    public function info(): string
    {
        return "{$this->nama} ({$this->nim}) - {$this->prodi} [IPK: {$this->ipk}]";
    }

    public function predikat(): string
    {
        if ($this->ipk >= 3.51) {
            return "Cumlaude";
        } elseif ($this->ipk >= 3.01) {
            return "Sangat Memuaskan";
        } else {
            return "Memuaskan";
        }
    }

}

class Produk
{
    // TODO
    public string $nama;
    public int $harga;
    public int $stok;

    public function __construct(string $nama, int $harga, int $stok)
    {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function totalNilai(): int
    {
        return $this->harga * $this->stok;
    }

}

// TODO: buat 3 object Mahasiswa dan tampilkan info() + predikat()
// Membuat 3 objek Mahasiswa dan menampilkan info serta predikatnya
    $mhs1 = new Mahasiswa("220101", "Andi", "Teknik Informatika", 3.85);
    $mhs2 = new Mahasiswa("220102", "Budi", "Sistem Informasi", 3.20);
    $mhs3 = new Mahasiswa("220103", "Siti", "Teknik Komputer", 2.90);

    echo "--- Daftar Mahasiswa ---\n";
    echo $mhs1->info() . " | Predikat: " . $mhs1->predikat() . "\n";
    echo $mhs2->info() . " | Predikat: " . $mhs2->predikat() . "\n";
    echo $mhs3->info() . " | Predikat: " . $mhs3->predikat() . "\n\n";

// Membuat objek Produk dan menghitung total nilainya
    $produk1 = new Produk("Laptop", 7000000, 5);

   echo "--- Data Produk ---\n";
   echo "Produk: {$produk1->nama} | Total Nilai: Rp " . number_format($produk1->totalNilai(), 0, ',', '.');