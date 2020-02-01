<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Policy;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;

class SinglePolicyController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $post = new Policy();
        $context['page'] = $post;
        return new TimberResponse('page/default.twig', $context);
    }
}
