<?php

namespace App\Api\V1\Http\Controllers;

use App\Api\V1\Http\Controllers\Controller;
use App\Api\V1\Http\Requests\Example\ExampleRequest;
use App\Entities\Example;
use App\Services\CreateExampleService;
use App\Transformers\ExampleTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ExampleController extends Controller
{
    protected function model()
    {
        return Example::class;
    }

    protected function transformer()
    {
        return ExampleTransformer::class;
    }

    protected function message()
    {
        return "Example not found";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $examples = Example::all();

        return $this->response->collection(
            $examples, 
            $this->transformer(),
            $this->parameters()
        );
    }

    /**
     * Create a new example instance.
     *
     * @param  \App\Api\V1\Http\Requests\Example\ExampleRequest  $request
     * @return \Dingo\Api\Http\Response
     */
    protected function store(CreateExample $request)
    {
        $example = CreateExampleService::handle($request);

        return $this->response->item(
            $example, 
            $this->transformer(), 
            $this->parameters()
        )->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Dingo\Api\Http\Request  $request
     * @param  \App\Entities\Example    $example
     * @return \Dingo\Api\Http\Response
     */
    public function show(Request $request, Example $example)
    {
        return $this->response->item(
            $example, 
            $this->transformer(),
            $this->parameters(), 
            $this->callable()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Dingo\Api\Http\Request  $request
     * @param  \App\Entities\Example    $example
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, Example $example)
    {
        $example->update($request->all());

        return $this->response->item(
            $example, 
            $this->transformer(), 
            $this->parameters()
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Dingo\Api\Http\Response
     */
    public function destroy(Request $request, Example $example)
    {
        $example->delete();
        return $this->accepted();
    }
}
