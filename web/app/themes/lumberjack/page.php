<?php

namespace App;

use App\Http\Controllers\Controller;
use Rareloop\Lumberjack\Page;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;

class PageController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $page = new Page();

        if ($this->checkStatus($page, $context) == true) {
            $context['page'] = $page;
        }

        return new TimberResponse('page/default.twig', $context);
    }

    public function checkStatus($page, $context)
    {
        if ($page->post_status == 'publish') {
            return true;
        } else {
            return new TimberResponse('errors/404.twig', $context);
        }
    }
}
