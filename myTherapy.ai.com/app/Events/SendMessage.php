<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow as BroadcastingShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendMessage implements BroadcastingShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $therapistId;
    public $adminUuid;
    public $sender;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $therapistId, $adminUuid, $sender)
    {
        Log::info('Event initiated');
        $this->message = $message;
        $this->therapistId = $therapistId;
        $this->adminUuid = $adminUuid;
        $this->sender = $sender;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
        Log::info('broadcast set');
        return new PrivateChannel("admin.{$this->adminUuid}.{$this->therapistId}");
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        Log::info('broadcastwith started');

        return [
            'message' => $this->message,
            'therapistId' => $this->therapistId,
            'adminUuid' => $this->adminUuid,
            'sender' => $this->sender,
        ];
    }
}
