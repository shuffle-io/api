<?php

namespace App\Services;

use App\Api\V1\Http\Requests\Deck\ShuffleDeck;
use App\Entities\Deck;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class GetAlbumImagesService
{
    /**
     * Choose random image from given album
     *
     * @return \App\Entities\Deck
     */
    public static function handle(string $id)
    {
        $images = self::get($id);

        return json_decode($images)->data;
    }

    private static function get(string $album_id) {
        $client_id = config('imgur.client_id');
        $imgur_root = config('imgur.api_root');
        $client = new Client();

        $response = $client->request('GET', "{$imgur_root}/album/{$album_id}/images", [
            'headers' => [
                'Authorization' => "Client-ID {$client_id}"
            ]
        ]);

        return $response->getBody();
    }
}
