<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\DigitalArt;
use Database\Seeders\DigitalArtSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DigitalArtTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DigitalArtSeeder::class);
    }

    /**
     * Test homepage (gallery catalog) returns 200 and shows content.
     */
    public function test_homepage_shows_gallery_catalog(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('AETHERIA');
        $response->assertSee('251011700713');
        $response->assertSee('Galeri Lukisan Digital');
    }

    /**
     * Test artwork detail page returns 200 and displays complete specs.
     */
    public function test_artwork_detail_page_loads_correctly(): void
    {
        $artwork = DigitalArt::first();
        $this->assertNotNull($artwork);

        $response = $this->get('/artworks/' . $artwork->id);

        $response->assertStatus(200);
        $response->assertSee($artwork->title);
        $response->assertSee($artwork->artist);
        $response->assertSee($artwork->resolution);
        $response->assertSee($artwork->software_used);
    }

    /**
     * Test about page returns 200 and displays student identity.
     */
    public function test_about_page_shows_student_identity(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('Muhammad Shouqi');
        $response->assertSee('251011700713');
        $response->assertSee('CS03SIFE002');
        $response->assertSee('db_uts_251011700713');
    }

    /**
     * Test search and filter functionality.
     */
    public function test_filter_by_software(): void
    {
        $response = $this->get('/?software=Blender');

        $response->assertStatus(200);
        $response->assertSee('Blender');
    }
}
