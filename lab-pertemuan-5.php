<?php
// LAB 5 — Inheritance & overriding
// Spesifikasi:
//  - Pegawai(string $nama, float $gajiPokok): hitungGaji(): float, FINAL info(): string
//  - Guru(nama, gajiPokok, int $jamMengajar)      -> gajiPokok + jamMengajar x 50.000
//  - Staf(nama, gajiPokok, float $tunjangan)       -> gajiPokok + tunjangan
//  - Honorer(nama, float $gajiPerJam, int $jamKerja) -> gajiPerJam x jamKerja
//  - Sekolah: tambahPegawai(Pegawai $p), totalGaji(): float  (komposisi)

class Pegawai
{
    // TODO
    protected string $nama;
    protected float $gajiPokok;

    public function __construct(string $nama, float $gajiPokok)
    {
        $this->nama = $nama;
        $this->gajiPokok = $gajiPokok;
    }

    public function hitungGaji(): float
    {
        return $this->gajiPokok;
    }

    final public function info(): string
    {
        return "Pegawai: {$this->nama}, Gaji: " . $this->hitungGaji();
    }
}


// TODO: Guru, Staf, Honorer, Sekolah
class Guru extends Pegawai
{
    private int $jamMengajar;

    public function __construct(string $nama, float $gajiPokok, int $jamMengajar)
    {
        parent::__construct($nama, $gajiPokok);
        $this->jamMengajar = $jamMengajar;
    }

    public function hitungGaji(): float
    {
        return $this->gajiPokok + ($this->jamMengajar * 50000);
    }
}
class Staf extends Pegawai
{
    private float $tunjangan;

    public function __construct(string $nama, float $gajiPokok, float $tunjangan)
    {
        parent::__construct($nama, $gajiPokok);
        $this->tunjangan = $tunjangan;
    }

    public function hitungGaji(): float
    {
        return $this->gajiPokok + $this->tunjangan;
    }
}
class Honorer extends Pegawai
{
    private int $jamKerja;

    public function __construct(string $nama, float $gajiPerJam, int $jamKerja)
    {
        parent::__construct($nama, $gajiPerJam);
        $this->jamKerja = $jamKerja;
    }

    public function hitungGaji(): float
    {
        return $this->gajiPokok * $this->jamKerja;
    }
}
class Sekolah
{
    private array $pegawaiList = [];

    public function tambahPegawai(Pegawai $p): void
    {
        $this->pegawaiList[] = $p;
    }

    public function totalGaji(): float
    {
        $total = 0;
        foreach ($this->pegawaiList as $p) {
            $total += $p->hitungGaji();
        }
        return $total;
    }
}

    $guru = new Guru("Budi", 4000000, 24);
    echo "Gaji Guru (4jt + 24 jam) = " . number_format($guru->hitungGaji(), 0, ',', '.') . "\n";

    $staf = new Staf("Ani", 3500000, 500000);
    echo "Gaji Staf (3,5jt + 500rb) = " . number_format($staf->hitungGaji(), 0, ',', '.') . "\n";

    $honorer = new Honorer("Joko", 25000, 80);
    echo "Gaji Honorer (25rb x 80 jam) = " . number_format($honorer->hitungGaji(), 0, ',', '.') . "\n";

    $sekolah = new Sekolah();
    $sekolah->tambahPegawai($guru);
    $sekolah->tambahPegawai($staf);
    $sekolah->tambahPegawai($honorer);

    echo "Total Gaji Sekolah: " . number_format($sekolah->totalGaji(), 0, ',', '.') . "\n";
