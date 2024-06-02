<?php

namespace App\Jobs;

use App\Events\SendMessageBroadcast;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessAndBroadcastAiMessageResponse implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //function to call the ai

        //push returned data to date['response']
        // Perform any additional processing here
        $this->data['response'] = 'response from Ai';
        // Broadcast the event
        event(new SendMessageBroadcast($this->data));
    }
}
