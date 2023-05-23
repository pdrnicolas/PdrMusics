<?php

namespace App\Services\Playlist;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Repositories\Playlist\PlaylistRepository;
use Illuminate\Support\Collection;

class PlaylistService extends Controller
{

    private PlaylistRepository $repository;

    public function __construct(PlaylistRepository  $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data): Playlist
    {
        return $this->repository->create($data);
    }

    public function search(string $playlistIds = null, ?string $playlistName = null): Collection
    {
        $services = $playlistIds ? explode(',', $playlistIds) : [];

        return $this->repository->search($services, $playlistName);
    }
}
