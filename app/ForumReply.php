<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumReply extends Model
{
    /**
     * Get the user that posted the reply.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the post that owns the task.
     */
    public function post()
    {
        return $this->belongsTo(ForumPost::class);
    }
}
