<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Guide;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;

class ArchiveGuideController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['guides'] = Guide::getPublishedGuides();
        return new TimberResponse('archives/guide/index.twig', $context);
    }
}
