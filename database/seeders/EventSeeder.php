<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'room_id'       => 1,
            'name'          => 'Seminar Internet of Things',
            'from_date'     => '2022-06-30 12:00:00.000000',
            'until_date'    => '2022-06-30 14:00:00.000000',
            'image'         => 'images/default.jpg',
            'contact'       => '085156591059',
            'description'   => 'Internet of things merupakan sebuah konsep di mana suatu benda atau objek ditanamkan teknologi-teknologi seperti sensor dan software dengan tujuan untuk berkomunikasi, mengendalikan, menghubungkan, dan bertukar data melalui perangkat lain selama masih terhubung ke internet.',
            'link'          => 'https://forms.gle/G53tuha2Ku4c3dAw7',
            'category'      => 'online',
            'created_by'    => 1
        ]);

        Event::create([
            'room_id'       => 3,
            'name'          => 'Lomba Melukis',
            'from_date'     => '2022-06-29 10:00:00.000000',
            'until_date'    => '2022-06-29 14:00:00.000000',
            'image'         => 'images/default.jpg',
            'contact'       => '085156591059',
            'description'   => 'Dibuka untuk umum. Total hadiah sebesar 50juta rupiah.',
            'link'          => 'https://forms.gle/G53tuha2Ku4c3dAw7',
            'category'      => 'offline',
            'created_by'    => 1
        ]);
        Event::create([
            'room_id'       => 4,
            'name'          => 'Workshop Pembuatan Media Pembelajaran Digital',
            'from_date'     => '2022-06-23 08:00:00.000000',
            'until_date'    => '2022-06-23 17:00:00.000000',
            'image'         => 'images/default.jpg',
            'contact'       => '085156591059',
            'description'   => 'Dalam rangka memperbaiki pelayanan pendidikan bagi masyarakat, sebagai pendidik kita harus meningkatkan kompetensi salah satu nya kompetensi berbasis digital. Workshop ini terbuka bagi para pengajar yang ingin meningkatkan kualitas mengajar demi masa depan Indonesia.',
            'link'          => 'https://forms.gle/G53tuha2Ku4c3dAw7',
            'category'      => 'offline',
            'created_by'    => 1
        ]);
        Event::create([
            'room_id'       => 1,
            'name'          => 'Pelatihan Membuat Website dengan Laravel',
            'from_date'     => '2022-06-23 12:00:00.000000',
            'until_date'    => '2022-06-23 16:00:00.000000',
            'image'         => 'images/default.jpg',
            'contact'       => '085156591059',
            'description'   => 'Laravel adalah framework yang paling banyak mendapatkan bintang di Github. Sekarang framework ini menjadi salah satu yang populer di dunia, tidak terkecuali di Indonesia. ',
            'link'          => 'https://forms.gle/G53tuha2Ku4c3dAw7',
            'category'      => 'online',
            'created_by'    => 1
        ]);
        
        Event::create([
            'room_id'       => 1,
            'name'          => 'Bootcamp Fullstack Web Developer (HTML, CSS, PHP)',
            'from_date'     => '2022-06-22 08:00:00.000000',
            'until_date'    => '2022-06-25 16:00:00.000000',
            'image'         => 'images/default.jpg',
            'contact'       => '085156591059',
            'description'   => 'Pembelajaran intensif selama 3 hari untuk menjadi Fullstack Web Developer. Program ini GRATIS dan terbuka bagi siapapun yang ingin belajar menjadi Web Developer. Tidak perlu khawatir karena disini kita akan memulai dari paling dasar',
            'link'          => 'https://forms.gle/G53tuha2Ku4c3dAw7',
            'category'      => 'online',
            'created_by'    => 1
        ]);
        
        
    }
}
