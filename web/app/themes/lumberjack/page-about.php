<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Team;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Rareloop\Lumberjack\Page;
use App\Http\Controllers\PageController as PageHandle;
use Timber\Timber;

class PageAboutController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();
        $context['team'] = Team::getPublishedTeamMembers();
        $context['page'] = PageHandle::getPage($page, $context);
        return new TimberResponse('page/about.twig', $context);
    }
}
