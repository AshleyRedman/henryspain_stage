<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Guide;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;

class SingleGuideController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $guide = new Guide();
        $context['guide'] = Guide::getCurrentGuide($guide);
        return new TimberResponse('archives/guide/show.twig', $context);
    }
}
