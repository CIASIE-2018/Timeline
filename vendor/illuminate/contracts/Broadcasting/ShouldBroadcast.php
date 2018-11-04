<?php

namespace Illuminate\Contracts\Broadcasting;

<<<<<<< HEAD
use Illuminate\Broadcasting\Channel;

=======
>>>>>>> master
interface ShouldBroadcast
{
    /**
     * Get the channels the event should broadcast on.
     *
<<<<<<< HEAD
     * @return Channel|Channel[]
=======
     * @return \Illuminate\Broadcasting\Channel|\Illuminate\Broadcasting\Channel[]
>>>>>>> master
     */
    public function broadcastOn();
}
