<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Service;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;

class ArchiveServiceController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['services'] = Service::getPublishedServices();
        return new TimberResponse('archives/service/index.twig', $context);
    }
}
