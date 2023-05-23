<?php

namespace App\Http\Controllers;

use App\Services\Playlist\PlaylistService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlaylistSearchController extends Controller
{

    private PlayListService $service;

    public function __construct(PlaylistService $service)
    {
        $this->service = $service;
    }

     public function __invoke(Request $request): JsonResponse
     {
        $playlistName = $request->get('nome_playlist');
        $playlistIds = $request->get('playlist_id');

        $results = $this->service->search($playlistIds, $playlistName);

        return response()->json($results, Response::HTTP_OK);
     }
}
