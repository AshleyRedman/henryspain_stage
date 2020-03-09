<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Campaign;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;

class SingleCampaignController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $campaign = new Campaign();

        $context['campaign'] = $campaign;
        $context['title'] = $campaign->title();
        $context['content'] = $campaign->content();

        $context['all_active_campaigns'] = Campaign::getAllPublished();

        return new TimberResponse('archives/campaign/show.twig', $context);
    }
}
