<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Clients\TheMovieDBClient;
use App\Models\Movie;
use App\Models\Watchlist;

class WatchlistController extends Controller
{
    public function show() {
        $user = auth()->user();

        return view('watchlist.show', [
            'movies' => $user->watchlist->movies
        ]);
    }

    public function store(Request $request) {
        $user = auth()->user();
        $tmdb_id = $request->get('tmdb_id');
        $watchlist = Watchlist::updateOrCreate(['user_id' => $user->id]);
        $movie = Movie::where('tmdb_id', $tmdb_id)->first();
        if (is_null($movie)) {
            $client = new TheMovieDBClient(env('TMDB_API_KEY'));
            $movieFromTmdb = $client->getMoviesApi()->getMovie($tmdb_id, ['language' => 'pt-BR']);
            $movie = Movie::create([
                'tmdb_id' => $movieFromTmdb['id'],
                'title' => $movieFromTmdb['title'],
                'poster_path' => $movieFromTmdb['poster_path'],
                'overview' => $movieFromTmdb['overview']
            ]);
        }

        $hasMovieInWatchlist = $watchlist->movies()->where('movie_id', $movie->id)->first();

        if (!$hasMovieInWatchlist) $watchlist->movies()->attach($movie);

        return redirect('/filmes');
    }
}
