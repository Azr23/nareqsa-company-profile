<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\CompanyProfile;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Data Dummy Company Profile
        CompanyProfile::create([
            'company_name' => 'CV Nareqsa Jaya',
            'about' => 'Kami adalah perusahaan yang berdedikasi memberikan solusi terbaik untuk kebutuhan bisnis Anda dengan pengalaman bertahun-tahun di industri ini.',
            'email' => 'info@nareqsajaya.com',
            'phone' => '+62 812-3456-7890',
            'address' => 'Jl. Jendral Sudirman No. 123, Kota Makassar, Sulawesi Selatan',
        ]);

        // Data Dummy Services
        Service::create([
            'title' => 'Pengembangan Perangkat Lunak',
            'description' => 'Membangun aplikasi web dan mobile yang responsif, scalable, dan sesuai dengan kebutuhan spesifik bisnis Anda.',
            'icon' => 'bi-code-slash'
        ]);

        Service::create([
            'title' => 'Konsultasi IT',
            'description' => 'Memberikan arahan strategis dan solusi infrastruktur IT untuk meningkatkan efisiensi operasional.',
            'icon' => 'bi-pc-display'
        ]);
    }
}