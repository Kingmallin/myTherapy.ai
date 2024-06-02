<?php

namespace App\Listeners;

use App\Events\SendMessage;
use App\Jobs\ProcessAndBroadcastAiMessageResponse;
use App\Models\Ai\Service\AiConversationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Reverb\Events\MessageReceived;

class WebsocketListener
{
    /**
     * The AI Conversation Service instance.
     */
    protected $service;

    /**
     * Create the event listener.
     */
    public function __construct(AiConversationService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle the event.
     */
    public function handle(MessageReceived $event): void
    {
        try {
            $messageData = json_decode($event->message, true);

            if (isset($messageData['event']) && $messageData['event'] === 'SendMessage') {
                if (isset($messageData['data'])) {
                    $data = json_decode($messageData['data'], true);

                    if (isset($data['therapistId'], $data['message'], $data['sender'])) {
                        $this->service->create(
                            $data['therapistId'],
                            $data['adminUuid'] ?? null,
                            $data['adminUuid'] ?? null,
                            $data['message'],
                            $data['sender']
                        );
                        
                        ProcessAndBroadcastAiMessageResponse::dispatch($data);
                    } 
                } 
            } 
        } catch (\Exception $e) {
            Log::error('Error handling message: ' . $e->getMessage(), ['event' => $event]);
        }
    }
}
