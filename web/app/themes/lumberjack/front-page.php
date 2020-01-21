<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Guide;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use App\Http\Controllers\PageController as PageHandle;
use Timber\Timber;

class FrontPageController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();
        $context['guides'] = Guide::getPublishedGuides();
        $context['page'] = PageHandle::getPage($page, $context);
        return new TimberResponse('page/front-page.twig', $context);
    }
}
