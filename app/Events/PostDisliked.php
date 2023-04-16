<?php

namespace App\Events;

use App\Models\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostDisliked implements ShouldBroadcast
{
    public $postId;
    public $likesCount;

    /**
     * Create a new event instance.
     *
     * @param Post $post
     * @param int $likesCount
     */
    public function __construct(Post $post, int $likesCount)
    {
        $this->postId = $post->id;
        $this->likesCount = $likesCount;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('post-dislikes');
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'postId' => $this->postId,
            'likesCount' => $this->likesCount,
        ];
    }
}
