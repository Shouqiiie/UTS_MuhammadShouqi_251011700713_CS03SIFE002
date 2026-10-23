<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DigitalArt;

class DigitalArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artworks = [
            [
                'title' => 'Chronicles of Neo-Tokyo',
                'artist' => 'Kaito Tanaka',
                'resolution' => '3840 x 2160 (4K UHD)',
                'price' => 1750000,
                'image' => '1.jpg',
                'software_used' => 'Blender 3D & Adobe Photoshop',
                'description' => 'Sebuah eksplorasi visual lanskap futuristik cyberpunk dengan kilau neon cyan dan magenta di tengah atmosfer malam kota metropolitan masa depan.',
            ],
            [
                'title' => 'Celestial Symphony',
                'artist' => 'Elena Rostova',
                'resolution' => '5120 x 2880 (5K Retina)',
                'price' => 2400000,
                'image' => '2.jpg',
                'software_used' => 'Cinema 4D & Octane Render',
                'description' => 'Representasi astral dan harmoni kosmik galaksi tak berujung, memadukan partikel cahaya ilahi dengan gradasi warna nebula yang memukau.',
            ],
            [
                'title' => 'Vanguard of the Abyss',
                'artist' => 'Marcus Vance',
                'resolution' => '4096 x 2160 (Cinema 4K)',
                'price' => 1950000,
                'image' => '3.jpg',
                'software_used' => 'Unreal Engine 5 & Photoshop',
                'description' => 'Karakter mecha biomekanik legendaris yang berdiri teguh menjaga gerbang dimensi bawah laut terdalam dengan pencahayaan volumetrik dramatis.',
            ],
            [
                'title' => 'Whispers of the Sacred Grove',
                'artist' => 'Aoi Mizuki',
                'resolution' => '6000 x 4000 (24MP High-Res)',
                'price' => 2100000,
                'image' => '4.jpg',
                'software_used' => 'Procreate & Corel Painter',
                'description' => 'Lukisan digital bertema surealisme alam dengan dedaunan bercahaya bioluminesensi mistis dan nuansa ketenangan spiritual yang mendalam.',
            ],
            [
                'title' => 'Quantum Horizon',
                'artist' => 'David Sterling',
                'resolution' => '7680 x 4320 (8K Ultra HD)',
                'price' => 3200000,
                'image' => '5.jpg',
                'software_used' => 'Houdini & Adobe After Effects',
                'description' => 'Simulasi fisika kuantum beresolusi super tinggi yang merekonstruksi horizon peristiwa lubang hitam dengan efek distorsi gravitasi spektakuler.',
            ],
            [
                'title' => 'Echoes of Cybernetic Solitude',
                'artist' => 'Zack Snyder-Lee',
                'resolution' => '4500 x 3000 (300 DPI)',
                'price' => 1650000,
                'image' => '6.jpg',
                'software_used' => 'Clip Studio Paint EX & Lightroom',
                'description' => 'Potret melankolis seorang cyborg penjelajah ruang hampa udara di tengah reruntuhan stasiun orbital yang ditinggalkan berabad-abad lalu.',
            ],
            [
                'title' => "The Alchemist's Monolith",
                'artist' => 'Soren Lindqvist',
                'resolution' => '3840 x 2400 (WQUXGA)',
                'price' => 2800000,
                'image' => '7.jpg',
                'software_used' => 'ZBrush, Maya & Substance Painter',
                'description' => 'Monumen kuno berarsitektur hiper-geometris yang memancarkan energi magis kuno di tengah gurun pasir kristal bercahaya temaram.',
            ],
            [
                'title' => 'Floral Reverie in Neon',
                'artist' => 'Clara Beauchamp',
                'resolution' => '4000 x 5000 (Fine Art Print)',
                'price' => 1850000,
                'image' => '8.jpg',
                'software_used' => 'Adobe Illustrator & Photoshop CC',
                'description' => 'Kombinasi flora organik kontemporer yang bermutasi dengan serat optik neon modern, menghadirkan estetika visual yang segar dan memikat.',
            ],
            [
                'title' => 'Ascension of the Void Sovereign',
                'artist' => 'Nyx Valerius',
                'resolution' => '5000 x 5000 (Square Master)',
                'price' => 3500000,
                'image' => '9.jpg',
                'software_used' => 'Midjourney v6, Photoshop & Krita',
                'description' => 'Karya konseptual adidaya monarki kosmik bermahkota bintang mati, merefleksikan kekuatan tanpa batas dan keagungan singularitas galaksi.',
            ],
            [
                'title' => 'Metropolis Overdrive 2099',
                'artist' => 'Kenji Takahashi',
                'resolution' => '7680 x 2160 (Dual 4K Ultrawide)',
                'price' => 2950000,
                'image' => '10.jpg',
                'software_used' => 'Blender 3D & DaVinci Resolve Fusion',
                'description' => 'Pemandangan sinematik ultra-lebar jalanan bertingkat kota masa depan dengan lalu lintas kendaraan terbang dan billboard hologram holografis.',
            ],
        ];

        foreach ($artworks as $data) {
            DigitalArt::updateOrCreate(
                ['image' => $data['image']],
                $data
            );
        }
    }
}
