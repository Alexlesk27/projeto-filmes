<?php

namespace App\Http\Controllers;

use App\Http\Clients\TheMovieDBClient;
use Illuminate\Http\Request;

class MovieController extends Controller
{
  public function index(){
    $client = new TheMovieDBClient(env('TMDB_API_KEY'));
    $popular = $client->getMoviesApi()->getPopular()['results'];
    $topRated = $client->getMoviesApi()->getTopRated()['results'];
    $nowPlaying = $client->getMoviesApi()->getNowPlaying()['results'];


    return view('movie.index', [
        'popular' => $popular,
        'topRated' => $topRated,
        'nowPlaying' => $nowPlaying
    ]);
  }

    public function show(int $id){
      $client = new TheMovieDBClient(env('TMDB_API_KEY'));
      $movie = $client->getMoviesApi()->getMovie($id, ['language' => 'pt-BR']);
      return view('movie.show', [
          'movie' => $movie
      ]);
    }

    public function search(Request $request){
      $client = new TheMovieDBClient(env('TMDB_API_KEY'));
      $result = $client->getSearchApi()->searchMovies($request ->get('search'));
      return view('movie.search', [
          'movies' => $result['results']
      ]);
    }
}
