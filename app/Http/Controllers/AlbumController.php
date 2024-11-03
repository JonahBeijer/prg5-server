<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genres = Genre::all();
        $searchTerm = $request->input('search');

        $albumsQuery = Album::with('user', 'genre')->where('is_active', 1);

        if ($searchTerm) {
            $albumsQuery->where(function ($query) use ($searchTerm) {
                $query->where('album_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('artist_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereHas('user', function($q) use ($searchTerm) {
                        $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                    });
            });
        }

        if ($request->has('genre') && !empty($request->genre)) {
            $albumsQuery->where('genre_id', $request->genre);
        }

        $albums = $albumsQuery->paginate(10);

        return view('album.index', compact('genres', 'albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('albums.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'album_name' => 'required|string|max:255',
            'artist_name' => 'required|string|max:255',
            'genre_id' => 'required|integer',
            'release_date' => 'required|date',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif',
            'caption' => 'required|string|max:255',
        ], [
            'album_name.required' => 'Je moet een album naam invoeren.',
            'artist_name.required' => 'Je moet een artiest naam invoeren.',
            'genre_id.required' => 'Selecteer een genre.',
            'release_date.required' => 'Voer een release datum in.',
            'images.required' => 'Een afbeelding is verplicht.',
            'images.image' => 'De afbeelding moet een geldig afbeeldingsformaat zijn.',
            'caption.required' => 'Voer een caption in.',
        ]);

        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('images/albums', 'public');

            Album::create([
                'album_name' => $request->input('album_name'),
                'artist_name' => $request->input('artist_name'),
                'genre_id' => $request->input('genre_id'),
                'release_date' => $request->input('release_date'),
                'images' => $imagePath,
                'users_id' => Auth::id(),
                'caption' => $request->input('caption'),
            ]);

            return redirect()->route('albums.index')->with('success', 'Album toegevoegd!');
        } else {
            return back()->withErrors(['images' => 'Er is geen afbeelding geüpload.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $album = Album::with('user', 'genre')->find($id);

        if (!$album) {
            return redirect()->route('albums.index')->with('error', 'Album niet gevonden.');
        }

        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $genres = Genre::all();

        abort_if($album->users_id !== Auth::id() && Auth::user()->status != 1, 403, 'Je hebt geen toegang om dit album te bewerken.');

        return view('albums.edit', compact('album', 'genres'));
    }
 public function showRecentAlbum()
{
    $album = Album::latest()->first(); // of gebruik een query die het gewenste album ophaalt
    return view('welcome', compact('album'));
}

}
