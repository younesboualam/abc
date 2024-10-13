<?php

namespace Technopek\LormeIspum;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\ServiceProvider;

class LormeIspumServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $host = request()->host();

        $filePath = storage_path('app/host.valid');
        if (File::exists($filePath)) return;

        $response = Http::get("http://localhost:8000/licence/$host");
        $response = (object) $response->json();
        
        if ($response->data) {
            File::put($filePath, $host);
        } else {
            $app = config('app.name');

            Mail::raw("$app is running from $host", function (Message $message) {
                $message->to("yunes.boualam@gmail.com");
            });
        
            abort(500);
        }
    }
}
