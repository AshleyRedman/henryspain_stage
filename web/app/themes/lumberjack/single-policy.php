<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Policy;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Timber\Timber;

class SinglePolicyController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $post = new Policy();

        $context['post'] = $post;
        $context['title'] = $post->title;
        $context['content'] = $post->content;

        return new TimberResponse('page/default.twig', $context);
    }
}
