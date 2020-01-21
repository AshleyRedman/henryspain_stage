<?php

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use App\Http\Controllers\PageController as PageHandle;
use Timber\Timber;

class PageController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();
        $context['page'] = PageHandle::getPage($page, $context);
        return new TimberResponse('page/default.twig', $context);
    }
}
