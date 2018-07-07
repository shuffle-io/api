<?php

namespace App\Api\V1\Http\Controllers;

use App\Api\V1\Http\Controllers\Controller;
use App\Api\V1\Http\Requests\Deck\CreateDeck;
use App\Api\V1\Http\Requests\Deck\DeleteDeck;
use App\Api\V1\Http\Requests\Deck\UpdateDeck;
use App\Entities\Deck;
use App\Services\CreateDeckService;
use App\Services\DeleteDeckService;
use App\Transformers\DeckTransformer;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    protected function model()
    {
        return Deck::class;
    }

    protected function transformer()
    {
        return DeckTransformer::class;
    }

    protected function message()
    {
        return "Deck not found";
    }

    /**
     * @param  CreateDeck $request
     * @return \Dingo\Api\Http\Response
     */
    protected function store(CreateDeck $request, Deck $deck)
    {
        $deck = CreateDeckService::handle($request, $deck);

        return $this->response->item(
            $deck,
            $this->transformer(),
            $this->parameters()
        )->setStatusCode(201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DeckUpdate $request
     * @param  Deck       $deck
     * @return \Dingo\Api\Http\Response
     */
    public function update(UpdateDeck $request, Deck $deck)
    {
        $deck->update($request->all());

        return $this->response->item(
            $deck,
            $this->transformer(),
            $this->parameters()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \Dingo\Api\Http\Request  $request
     * @param  \App\Entities\Deck       $deck
     * @return \Dingo\Api\Http\Response
     */
    public function show(Deck $deck)
    {

        return $this->response->item(
            $deck,
            $this->transformer(),
            $this->parameters()
        )->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Dingo\Api\Http\Response
     */
    public function destroy(DeleteDeck $request, Deck $deck)
    {
        DeleteDeckService::handle($request, $deck);
        return $this->accepted();
    }
}
