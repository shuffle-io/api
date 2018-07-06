<?php

namespace App\Api\V1\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, Helpers, ValidatesRequests;

    /**
     * Default response parameters
     */
    public function parameters()
    {
        return ['key' => 'data'];
    }
    
    /**
     * Default callable
     */
    public function callable()
    {
        return Closure::fromCallable([$this, 'parseIncludes']);
    }

    /**
     * Queries for a single record with a given $id.
     *
     * @param int $id ID of record
     * @param string $message Error message to throw if no record found
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function findOneOrFail(int $id, string $message = null, \Illuminate\Database\Eloquent\Model $class = null)
    {
        $class = $class ?: $this->model();
        $item = $class::find($id);

        $this->notFound($item, $message);

        return $item;
    }

    public function notFound($item, $message = null) {
        if (!$item) {
            $message = $message ?: $this->message();
            throw new NotFoundHttpException($message);
        }
    }

    /**
     * Get includes from query params
     *
     * @return void
     */
    public static function parseIncludes($resource, $fractal)
    {
        $includes = Input::get("include");
        if ($includes) {
            $fractal->parseIncludes($includes);
        }
    }
}
