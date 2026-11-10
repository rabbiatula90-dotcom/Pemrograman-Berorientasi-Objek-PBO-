<?php
// LAB 7 — Trait (bagian namespace & Composer dikerjakan lokal di Laragon,
//         kirim tautan repositori GitHub pada kolom tautan)
// Spesifikasi:
//  - trait Timestampable: touch(): void (isi createdAt), getCreatedAt(): ?string
//  - Buku(string $judul) dan Anggota(string $nama) memakai Timestampable

trait Timestampable
{
    // TODO
    private ?string $createdAt = null;

    public function touch(): void
    {
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }
}

class Buku
{
    // TODO
    use Timestampable;

    private string $judul;

    public function __construct(string $judul)
    {
        $this->judul = $judul;
    }

    public function getJudul(): string
    {
        return $this->judul;
    }
}

class Anggota
{
    // TODO
    use Timestampable;

    private string $nama;

    public function __construct(string $nama)
    {
        $this->nama = $nama;
    }

    public function getNama(): string
    {
        return $this->nama;
    }
}

     $buku = new Buku("Belajar Pemrograman Berorientasi Objek");
     $buku->touch();
     echo "Buku: " . $buku->getJudul() . " | Dibuat pada: " . $buku->getCreatedAt() . "\n";

     $anggota = new Anggota("Budi Santoso");
     $anggota->touch();
     echo "Anggota: " . $anggota->getNama() . " | Dibuat pada: " . $anggota->getCreatedAt() . "\n";
