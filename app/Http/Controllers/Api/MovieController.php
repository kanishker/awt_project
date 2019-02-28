<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Http\Resources\MovieCollections as MovieResource;
use App\Models\Movies\Movie;

class MovieController extends Controller
{
    public function index()
    {
        return MovieResource::collection(Movie::all());
    }
    public function show(Movie $movie)
    {
        return new MovieResource($movie);
    }

    public function store(Request $request)
    {
        $mid = isset($request->mid) ? $request->mid : null;
        $movies = isset($request->mname) ? $request->mname : null;
        $gen = isset($request->gen) ? $request->gen : null;

            if ($movies != "" && $gen != "") {
                $movie = new Movie();
                $mid->movie_id = $movies;
                $movie->movie_name = $movies;
                $movie->movie_genere = $gen;
                $res = $movie->save();
                if ($res == 1) {
                    return response()->json(['STATUS' => 'SUCCESS', 'RESULT' => new MovieResource($movie)], 200);
                }
                else{
                    return response()->json(['STATUS' => 'FAILED', 'error' => 'Unable to insert'], 400);
                }
            } else {
                return response()->json(['STATUS' => 'FAILED', 'error' => 'Certain Required Spaces are Not filled'], 400);
            }

    }
    public function update(Request $request, Movie $movie)
    {
        $mid = isset($request->mid) ? $request->mid : null;
        $movies = isset($request->mname) ? $request->mname : null;
        $gen = isset($request->gen) ? $request->gen : null;

        if ($movies != "" && $gen != "") {
            $movie = new Movie();
            $mid->movie_id = $movies;
            $movie->movie_name = $movies;
            $movie->movie_genere = $gen;
            $res = $movie->save();
            if ($res == 1) {
                return response()->json(['STATUS' => 'SUCCESS', 'RESULT' => new MovieResource($movie)], 200);
            } else {
                return response()->json(['STATUS' => 'FAILED', 'error' => 'UNEXPECTED_ERROR'], 500);
            }

        } else {
            return response()->json(['STATUS' => 'BAD_REQUEST', 'error' => 'name and location are required'], 400);
        }
    }



    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json(['STATUS' => 'SUCCESS', 'RESULT' => null], 200);
    }



}
