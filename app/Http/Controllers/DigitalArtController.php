<?php

namespace App\Http\Controllers;

use App\Models\DigitalArt;
use Illuminate\Http\Request;

class DigitalArtController extends Controller
{
    /**
     * Display a listing of digital artworks.
     */
    public function index(Request $request)
    {
        $query = DigitalArt::query();

        // Search feature (title, artist, software)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('artist', 'like', "%{$search}%")
                  ->orWhere('software_used', 'like', "%{$search}%");
            });
        }

        // Filter by Software
        if ($request->filled('software')) {
            $query->where('software_used', 'like', "%{$request->input('software')}%");
        }

        // Sorting
        $sort = $request->input('sort', 'latest');
        match ($sort) {
            'price_asc'  => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'title_asc'  => $query->orderBy('title', 'asc'),
            default      => $query->orderBy('id', 'asc'),
        };

        $artworks = $query->get();
        $totalArtworks = DigitalArt::count();
        $totalArtists = DigitalArt::distinct('artist')->count('artist');
        
        // List unique softwares for filter pills
        $softwares = ['Blender 3D', 'Photoshop', 'Cinema 4D', 'Unreal Engine 5', 'Procreate', 'Houdini', 'Clip Studio Paint', 'ZBrush', 'Midjourney'];

        return view('artworks.index', compact('artworks', 'totalArtworks', 'totalArtists', 'softwares'));
    }

    /**
     * Display the specified digital artwork detail.
     */
    public function show($id)
    {
        $artwork = DigitalArt::findOrFail($id);

        // Related artworks (excluding the current one)
        $relatedArtworks = DigitalArt::where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('artworks.show', compact('artwork', 'relatedArtworks'));
    }

    /**
     * About / Info page for UTS requirements & Student Bio.
     */
    public function about()
    {
        return view('about');
    }
}
