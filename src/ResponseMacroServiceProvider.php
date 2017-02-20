<?php

namespace RC\JSend;

use Illuminate\Support\ServiceProvider;
use Uppdragshuset\AO\Repository\Contracts\Presenter;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $self = $this;

        response()->macro('jsend', [$this, 'jsend']);

        response()->macro('resource_fetched', function (
            $data = null,
            $presenter = null,
            $message = 'Resource Fetched Successfully',
            $status = 'success',
            $code = 200
        ) use ($self) {
            return $self->jsend($data, $presenter, $status, $message, $code);
        });

        response()->macro('resource_updated', function (
            $data = null,
            $presenter = null,
            $message = 'Resource Updated Successfully',
            $status = 'success',
            $code = 200
        ) use ($self) {
            return $self->jsend($data, $presenter, $status, $message, $code);
        });

        response()->macro('resource_created', function (
            $data = null,
            $presenter = null,
            $message = 'Resource Created Successfully',
            $status = 'success',
            $code = 201
        ) use ($self) {
            return $self->jsend($data, $presenter, $status, $message, $code);
        });

        response()->macro('resource_deleted', function (
            $data = null,
            $presenter = null,
            $message = null,
            $status = null,
            $code = 204
        ) use ($self) {
            return $self->jsend($data, $presenter, $status, $message, $code);
        });

        response()->macro('jsend_error', function (
            \Exception $e,
            $message = null,
            $code = null
        ) use ($self) {
            $message = $message ? $message : $e->getMessage();
            $code = $code ? $code : $e->getCode();
            $code = $code ? $code : 400;
            return $self->jsend(null, null, 'error', $message, $code);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Send jsend response
     *
     * @param mixed $data
     * @param Presenter | null $presenter
     * @param string | null $status
     * @param string | null $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsend($data = null, $presenter = null, $status = null, $message = null, $code)
    {
        if ($data != null && $presenter != null) {
            $data = $presenter->present($data);
        }

        $body = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($body, $code);
    }
}
