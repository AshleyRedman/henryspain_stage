<?php

namespace App\Http\Controllers;

use Rareloop\Lumberjack\Http\Controller as BaseController;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;

class PageController extends BaseController
{

    public function __construct()
    {
    }

    public static function getPage($page, $context)
    {
        if (!$page->post_status == 'publish') {
            return new TimberResponse('errors/404.twig', $context);
        }

        return $page;
    }
}
