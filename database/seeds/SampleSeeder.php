<?php

use Illuminate\Database\Seeder;

use App\ContentSetup;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = new ContentSetup();
        $content->nama_web = 'idiosyncrasi';
        $content->logo = 'logo.png';
        $content->ukuran_logo = '[height: 20px,width: 100%]';
        $content->email = 'email@idio.com';
        $content->no_tlp = '0222738738';
        $content->alamat = 'Jl.Baleendah';
        $content->website = 'www.test.com';
        $content->facebook = 'www.facebook.com';
        $content->twitter = 'www.twitter.com';
        $content->instagram = 'www.instagram.com';
        $content->about = '<h1>Test</h1>';
        $content->lat = '0';
        $content->lng = '0';
        $content->lokasi = $content->alamat;
        $content->save();
    }
}
