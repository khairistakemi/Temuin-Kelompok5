<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Claim;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CategorySeeder::class);

        // Password semua akun contoh: password
        $budi = User::create(['name' => 'Budi', 'email' => 'budi@mahasiswa.upnvj.ac.id', 'phone' => '081111111111', 'password' => 'password']);
        $sari = User::create(['name' => 'Sari', 'email' => 'sari@mahasiswa.upnvj.ac.id', 'phone' => '082222222222', 'password' => 'password']);
        $andi = User::create(['name' => 'Andi', 'email' => 'andi@mahasiswa.upnvj.ac.id', 'phone' => '083333333333', 'password' => 'password']);

        $elektronik = Category::where('name', 'Elektronik')->first()->id;
        $dompet = Category::where('name', 'Dompet/Tas')->first()->id;
        $kunci = Category::where('name', 'Kunci')->first()->id;
        $dokumen = Category::where('name', 'Dokumen/Kartu')->first()->id;

        $data = [
            [$budi, $elektronik, 'lost', 'Earphone hilang', 'Earphone putih dalam case kecil dengan stiker bintang.', 'Ruang kelas 301'],
            [$sari, $dompet, 'found', 'Dompet hitam ditemukan', 'Dompet kulit hitam, isi kartu dan uang tunai.', 'Selasar gedung A'],
            [$andi, $kunci, 'found', 'Kunci motor', 'Kunci motor dengan gantungan beruang.', 'Masjid kampus'],
            [$budi, $dokumen, 'lost', 'KTM hilang', 'Kartu mahasiswa atas nama Budi.', 'Perpustakaan'],
            [$sari, $elektronik, 'lost', 'Charger laptop', 'Charger laptop warna hitam, kabel agak kusut.', 'Laboratorium komputer'],
            [$andi, $dompet, 'lost', 'Tas selempang biru', 'Tas selempang biru berisi buku catatan.', 'Kantin'],
            [$budi, $elektronik, 'found', 'Flashdisk 32GB', 'Flashdisk merah, ada gantungan kunci kecil.', 'Ruang kelas 205'],
            [$sari, $kunci, 'lost', 'Kunci loker', 'Kunci loker nomor 14 dengan tali hijau.', 'Gedung B lantai 2'],
        ];

        $reports = [];
        foreach ($data as [$user, $categoryId, $type, $title, $description, $location]) {
            $reports[] = Report::create([
                'user_id' => $user->id,
                'category_id' => $categoryId,
                'type' => $type,
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'date' => now()->subDays(rand(0, 10))->toDateString(),
            ]);
        }

        // Budi mengklaim dompet milik laporan Sari; Sari mengklaim kunci motor laporan Andi
        Claim::create(['report_id' => $reports[1]->id, 'user_id' => $budi->id, 'evidence' => 'Dompet saya berisi KTP dan kartu ATM atas nama Budi.']);
        Claim::create(['report_id' => $reports[2]->id, 'user_id' => $sari->id, 'evidence' => 'Kunci motor Vario dengan gantungan beruang coklat.', 'status' => 'approved']);
    }
}