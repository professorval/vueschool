<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class UpdateUserAttributes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $updates;
    protected $batchId;

    public function __construct($updates)
    {
        $this->updates = $updates;
    }

    public function withBatchId($batchId)
    {

        $this->batchId = $batchId;

        return $this;

    }

    public function handle() : void
    {
        try {
            /* 
             * External request will be performed here
             * e.g
             * 

            $response = Http::withOptions([
                'verify' => false,
                'updates' => $this->updates
            ])->post('http://127.0.0.1:8000/recieve-updates');


            if($response->failed()){
                Log::error('Job failed');
            }
            */


            //-- Assuming all went well, log if needed
            Log::info('Job completed. Batch ID: ' . $this->batchId);


        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
