<?php
declare(strict_types=1);
// LAB 4 — Static, const, fitur PHP 8
// Spesifikasi:
//  - Mahasiswa(public readonly string $nim, public string $nama)  (constructor promotion)
//      const BATAS_SKS = 24
//      static getJumlah(): int  -> jumlah object Mahasiswa yang pernah dibuat
//  - enum Semester: string { Ganjil = 'ganjil', Genap = 'genap' }
//  - enum Predikat dengan method label(): string

class Mahasiswa
{
    // TODO
    public const int BATAS_SKS = 24;
    private static int $jumlah = 0;

    public function __construct(
        public readonly string $nim,
        public string $nama
    ) {
        self::$jumlah++;
    }

    public static function getJumlah(): int
    {
        return self::$jumlah;
    }
}

// TODO: enum Semester dan enum Predikat
enum Semester: string
{
    case Ganjil = 'ganjil';
    case Genap = 'genap';
}
enum Predikat: string
{
    case CUMLAUDE = 'Cumlaude';
    case SANGAT_MEMUASKAN = 'Sangat Memuaskan';
    case MEMUASKAN = 'Memuaskan';

    public function label(): string
    {
        return match($this) {
            self::CUMLAUDE => 'Cumlaude',
            self::SANGAT_MEMUASKAN => 'Sangat Memuaskan',
            self::MEMUASKAN => 'Memuaskan',
        };
    }
}
     $mhs1 = new Mahasiswa("220101", "Andi");
     $mhs2 = new Mahasiswa("220102", "Budi");

     echo "Batas SKS: " . Mahasiswa::BATAS_SKS . "\n";
     echo "Jumlah Mahasiswa: " . Mahasiswa::getJumlah() . "\n";
     echo "Semester: " . Semester::Ganjil->value . "\n";
     echo "Predikat: " . Predikat::CUMLAUDE->label() . "\n";
