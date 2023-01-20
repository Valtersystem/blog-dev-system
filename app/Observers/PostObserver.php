<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostObserver
{

    public function creating(Post $post)
    {
        if (! \App::runningInConsole()) {
            $post->user_id = auth()->user()->id;
        }
    }

  
    public function deleting(Post $post)
    {   
        if($post->image->urlId){
            $urlOld = $post->image->urlId;
        }

        if ($post->image) {
            Cloudinary::destroy($urlOld);
        }
    }

}
