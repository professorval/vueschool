<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateUserAttributes; 
use Illuminate\Support\Facades\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Batch;


class UserController extends Controller
{
    public function updateUserAttributes(Request $request){
        
        //$updates = $request->input('updates');

        $updates = [
            "batches" => [
                [
                    "subscribers" => [
                        [
                            "email" => "alex@acme.com",
                            "time_zone" => "Europe/Amsterdam"
                        ],
                        [
                            "email" => "hellen@acme.com",
                            "name" => "Hellen",
                            "time_zone" => "America/Los_Angeles"
                        ],
                        [
                            "email" => "abc@acme.com",
                            "name" => "ABC",
                            "time_zone" => "America/New_York"
                        ],
                        [
                            "email" => "def@acme.com",
                            "name" => "DEF",
                            "time_zone" => "America/New_York"
                        ],
                        [
                            "email" => "ghi@acme.com",
                            "name" => "GHI",
                            "time_zone" => "America/New_York"
                        ]
                    ]
                ]
            ]
        ];


        //-- Chunk the updates into batches of 2
        $chunks = array_chunk($updates, 2);

        Bus::batch(array_map(function ($chunk) {
            return new UpdateUserAttributes($chunk);
        }, $chunks
        ))->then(function (Batch $batch) {
            
            //-- All jobs completed..
            //Log::info('All jobs completed..' . $batch->id);

        })->catch(function (Batch $batch, Throwable $e) {
            
            //-- One or more jobs failed..
            //Log::error('One or more jobs failed..' . $e->getMessage());

        })->finally(function (Batch $batch) {
            
            //-- The batch has finished executing..
            //Log::info('The batch has finished executing..' . $batch->id);
            
        })->dispatch();

    }
}
