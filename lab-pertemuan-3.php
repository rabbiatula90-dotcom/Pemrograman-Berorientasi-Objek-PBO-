<?php
// LAB 3 — Enkapsulasi
// Spesifikasi:
//  - Rekening(string $nomor, string $pemilik), properti PRIVATE $saldo = 0
//      setor(float $jumlah): bool   -> false jika jumlah <= 0
//      tarik(float $jumlah): bool   -> false jika jumlah > saldo
//      transfer(Rekening $tujuan, float $jumlah): bool
//      getSaldo(): float, getRiwayat(): array
//  - Siswa() dengan setNilai(int) (hanya 0–100) dan getNilai(): int

class Rekening
{
    // TODO
    private string $nomor;
    private string $pemilik;
    private float $saldo = 0;
    private array $riwayat = [];

    public function __construct(string $nomor, string $pemilik, float $saldoAwal = 0)
    {
        $this->nomor = $nomor;
        $this->pemilik = $pemilik;
        $this->saldo = $saldoAwal;
    }

    public function setor(float $jumlah): bool
    {
        if ($jumlah <= 0) {
            return false;
        }
        $this->saldo += $jumlah;
        $this->riwayat[] = "Setor: $jumlah";
        return true;
    }

    public function tarik(float $jumlah): bool
    {
        if ($jumlah <= 0 || $jumlah > $this->saldo) {
            return false;
        }
        $this->saldo -= $jumlah;
        $this->riwayat[] = "Tarik: $jumlah";
        return true;
    }

    public function transfer(Rekening $tujuan, float $jumlah): bool
    {
        if ($this->tarik($jumlah)) {
            $tujuan->setor($jumlah);
            return true;
        }
        return false;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

    public function getRiwayat(): array
    {
        return $this->riwayat;
    }
}

class Siswa
{
    // TODO
    private string $nama;
    private int $nilai;

    public function setNama(string $nama): void
    {
        if (trim($nama) !== "") {
            $this->nama = $nama;
        }
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function setNilai(int $nilai): bool
    {
        if ($nilai < 0 || $nilai > 100) {
            return false;
        }
        $this->nilai = $nilai;
        return true;
    }

    public function getNilai(): int
    {
        return $this->nilai ?? 0;
    }
}

// Coba setelah selesai (hapus tanda komentar):
// $a = new Rekening('001', 'Andi');
// $a->setor(100000);
// echo $a->getSaldo();
$a = new Rekening('001', 'Andi', 500000);
$a->setor(100000);
echo "Saldo Andi: " . $a->getSaldo() . "\n";

$b = new Rekening('002', 'Budi');
$a->transfer($b, 200000);
echo "Saldo Budi setelah transfer: " . $b->getSaldo() . "\n";

$siswa1 = new Siswa();
$siswa1->setNama("Citra");
$siswa1->setNilai(85);
$siswa1->setNilai(150); 
echo "Siswa: " . $siswa1->getNama() . " | Nilai: " . $siswa1->getNilai() . "\n";
