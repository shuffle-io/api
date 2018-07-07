<?php

namespace App\Api\V1\Http\Controllers;

use App\Api\V1\Http\Controllers\Controller;
use App\Api\V1\Http\Requests\Image\DeleteImage;
use App\Api\V1\Http\Requests\Image\UploadImage;
use App\Entities\Image;
use App\Services\DeleteImageService;
use App\Services\UploadImageService;
use App\Transformers\ImageTransformer;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected function model()
    {
        return Image::class;
    }

    protected function transformer()
    {
        return ImageTransformer::class;
    }

    protected function message()
    {
        return "Image not found";
    }

    /**
     * @param  UploadImage $request
     * @return \Dingo\Api\Http\Response
     */
    protected function store(UploadImage $request, Image $image)
    {
        $image = UploadImageService::handle($request, $image);

        return $this->response->item(
            $image,
            $this->transformer(),
            $this->parameters()
        )->setStatusCode(201);

        return $this->response->created();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Dingo\Api\Http\Request  $request
     * @param  \App\Entities\Image      $image
     * @return \Dingo\Api\Http\Response
     */
    public function show(Image $image)
    {
        return response()->file(storage_path("app/public/{$image->path}"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Dingo\Api\Http\Response
     */
    public function destroy(DeleteImage $request, Image $image)
    {
        DeleteImageService::handle($request, $image);
        return $this->accepted();
    }
}
