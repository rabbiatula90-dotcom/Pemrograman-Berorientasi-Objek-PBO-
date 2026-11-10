<?php
// LAB 6 — Abstraction & polymorphism
// Spesifikasi:
//  - abstract BangunDatar: abstract luas(): float, abstract keliling(): float
//  - Lingkaran(float $r), Persegi(float $sisi), PersegiPanjang(float $p, float $l)
//  - interface Notifikasi { kirim(string $pesan): string }
//      Email, WhatsApp, SMS implements Notifikasi
//  - function kirimSemua(array $notifikasi, string $pesan): array (hasil tiap kirim)

abstract class BangunDatar
{
    // TODO
    abstract public function luas(): float;
    abstract public function keliling(): float;
}

// TODO: class turunan, interface Notifikasi + implementasinya, fungsi kirimSemua()
// class turunan
class Lingkaran extends BangunDatar
{
    public function __construct(private float $r) {}

    public function luas(): float
    {
        return M_PI * $this->r ** 2;
    }

    public function keliling(): float
    {
        return 2 * M_PI * $this->r;
    }
}

class Persegi extends BangunDatar
{
    public function __construct(private float $sisi) {}

    public function luas(): float
    {
        return $this->sisi ** 2;
    }

    public function keliling(): float
    {
        return 4 * $this->sisi;
    }
}

class PersegiPanjang extends BangunDatar
{
    public function __construct(private float $p, private float $l) {}

    public function luas(): float
    {
        return $this->p * $this->l;
    }

    public function keliling(): float
    {
        return 2 * ($this->p + $this->l);
    }
}

class Segitiga extends BangunDatar
{
    public function __construct(
        private float $alas,
        private float $tinggi,
        private float $sisiA,
        private float $sisiB
    ) {}

    public function luas(): float
    {
        return 0.5 * $this->alas * $this->tinggi;
    }

    public function keliling(): float
    {
        return $this->alas + $this->sisiA + $this->sisiB;
    }
}

// interface Notifikasi + implementasinya
interface Notifikasi
{
    public function kirim(string $pesan): string;
}

class Email implements Notifikasi
{
    public function kirim(string $pesan): string
    {
        return "Email terkirim: $pesan";
    }
}

class WhatsApp implements Notifikasi
{
    public function kirim(string $pesan): string
    {
        return "WhatsApp terkirim: $pesan";
    }
}

class SMS implements Notifikasi
{
    public function kirim(string $pesan): string
    {
        return "SMS terkirim: $pesan";
    }
}

// fungsi kirimSemua() (polimorfisme)
function kirimSemua(array $notifikasi, string $pesan): array
{
    $hasil = [];
    foreach ($notifikasi as $n) {
        $hasil[] = $n->kirim($pesan);
    }
    return $hasil;
}

// Uji coba
$bangun = [
    new Lingkaran(7),
    new Persegi(5),
    new PersegiPanjang(3, 4),
    new Segitiga(6, 4, 5, 5),
];

foreach ($bangun as $b) {
    printf("%s: luas %.2f, keliling %.2f\n", get_class($b), $b->luas(), $b->keliling());
}

echo "\n";
foreach (kirimSemua([new Email(), new WhatsApp(), new SMS()], "Halo, ini pengumuman.") as $h) {
    echo $h . "\n";
}