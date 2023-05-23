<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'playlist';

    protected $fillable = [
        'nome_playlist',
        'foto_playlist',
    ];

    protected $data = [
        'musicas'
    ];

}
