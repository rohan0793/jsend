<?php

namespace RC\JSend;

use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        response()->macro('jsend', function (
            $data,
            $presenter,
            $status,
            $message,
            $code
        ) {

            if ($data != null && $presenter != null) {
                $data = $presenter->present($data);
            }

            $body = [
                'data'    => $data,
                'status'  => $status,
                'message' => $message,
            ];

            return response()->json($body, $code);
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
}
