<?php

namespace App\Repositories\Playlist;

use App\Repositories\Interfaces\Repository;
use Illuminate\Support\Collection;

interface PlaylistRepository extends Repository
{
public function search(?array $playlistIds = [], ?string $playlistName = null): Collection;

}
