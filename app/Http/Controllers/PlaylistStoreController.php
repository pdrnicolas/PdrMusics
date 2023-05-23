<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Playlist\PlaylistStoreRequest;
use App\Services\Playlist\PlaylistService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PlaylistStoreController extends Controller
{
    public function __invoke(PlaylistStoreRequest $request, PlaylistService $service): JsonResponse
    {
        $playlist = $service->store(
            $request->only(
                [
                    'Nome da playlist',
                    'Foto',
                    'Músicas',
                ]
            ));

        return response()->json(
            [
                'Nome' => $playlist->name,
                'Playlist Salva com sucesso meu amiguinho',
            ],
            Response::HTTP_OK
        );
    }
}
