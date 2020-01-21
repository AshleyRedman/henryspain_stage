<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Policy;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Post;
use Timber\Timber;

class ArchivePolicyController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();

        $context['policies'] = Policy::getPublishedPolicies();

        return new TimberResponse('archives/policy/index.twig', $context);
    }
}
