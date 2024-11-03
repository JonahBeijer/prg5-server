<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>SpinShare</title>
    <link rel="icon" href="{{ secure_asset('storage/images/logo%20bird.png') }}" type="image/png">
</head>
<body>
@include('layouts.navbar')
<form id="albumForm" action="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/albums" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="container mt-4">
        <h2 class="text-center">Voeg een Album Toe</h2>

        <div class="form-group">
            <label for="album_name">Album Naam:</label>
            <input type="text" id="album_name" name="album_name" class="form-control" required>
            @error('album_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="artist_name">Artiest Naam:</label>
            <input type="text" id="artist_name" name="artist_name" class="form-control" required>
            @error('artist_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="genre_id">Genre:</label>
            <select name="genre_id" id="genre_id" class="form-control" required>
                <option value="">Selecteer een genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
            @error('genre_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="release_date">Release Datum:</label>
            <input type="date" id="release_date" name="release_date" class="form-control" required>
            @error('release_date')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="images">Afbeelding:</label>
            <input type="file" id="images" name="images" class="form-control" accept="image/*" required>
            @error('images')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="caption">Caption:</label>
            <input type="text" id="caption" name="caption" class="form-control" required>
            @error('caption')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" onclick="disableButton(this)">Voeg Album Toe</button>
    </div>
</form>

<script>
    function disableButton(button) {
        button.disabled = true;
        button.innerText = 'Verwerken...';
    }
</script>
</body>
</html>
