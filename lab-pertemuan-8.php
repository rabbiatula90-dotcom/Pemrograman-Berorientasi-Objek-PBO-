<?php
// LAB 9 — Exception (bagian PHPUnit dikerjakan lokal, kirim tautan repositori)
// Spesifikasi:
//  - NilaiTidakValidException & SaldoTidakCukupException extends Exception
//  - Siswa(): setNilai(int) melempar NilaiTidakValidException jika di luar 0–100
//  - Rekening(float $saldo): tarik(float) melempar SaldoTidakCukupException; getSaldo(): float

// TODO: dua custom exception
// Custom Exception
   class NilaiTidakValidException extends Exception {}
   class SaldoTidakCukupException extends Exception {}

class Siswa
{
    // TODO
    private int $nilai = 0;

    public function setNilai(int $nilai): void
    {
        if ($nilai < 0 || $nilai > 100) {
            throw new NilaiTidakValidException("Nilai harus antara 0 sampai 100.");
        }
        $this->nilai = $nilai;
    }

    public function getNilai(): int
    {
        return $this->nilai;
    }
}

class Rekening
{
    // TODO
    private float $saldo;

    public function __construct(float $saldo)
    {
        $this->saldo = $saldo;
    }

    public function tarik(float $jumlah): void
    {
        if ($jumlah > $this->saldo) {
            throw new SaldoTidakCukupException("Saldo tidak cukup untuk penarikan.");
        }
        $this->saldo -= $jumlah;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }   
}
try {
    $siswa = new Siswa();
    $siswa->setNilai(85);
    echo "Nilai siswa: " . $siswa->getNilai() . "<br>\n";
} catch (NilaiTidakValidException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n";
}

try {
    $rekening = new Rekening(500000);
    $rekening->tarik(200000);
    echo "Sisa saldo: " . $rekening->getSaldo() . "<br>\n";
} catch (SaldoTidakCukupException $e) {
    echo "Error: " . $e->getMessage() . "<br>\n";
}

// Coba setelah selesai (hapus tanda komentar):
// try {
//     (new Siswa())->setNilai(150);
// } catch (NilaiTidakValidException $e) {
//     echo 'Tertangkap: ' . $e->getMessage();
// }
