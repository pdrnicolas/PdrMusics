<?php

namespace App\Repositories\Playlist;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Collection;

class PlaylistEloquentRepository extends EloquentRepository implements PlaylistRepository
{
    private const FIELD_PLAYLIST_NAME = 'nome_playlist';

    private const LIKE_MYSQL = 'like';

    public function search(?array $playlistIds = [], ?string $playlistName = null): Collection
    {
        $query = $this->query();

        if (!empty($playlistIds)) {
            $query->whereIn('playlist_id', $playlistIds);
        }

        if ($playlistName) {
            $query->where(function ($query) use ($playlistName) {
                $query->where(self::FIELD_PLAYLIST_NAME, self::LIKE_MYSQL, '%'.$playlistName.'%');
            });
        }

        return $query->get();
    }
}
