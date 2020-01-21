<?php

namespace App;

use App\Http\Controllers\Controller;
use App\PostTypes\Testimonial;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;
use Timber\Timber;

class ArchiveTestimonialController extends Controller
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['testimonials'] = Testimonial::getPublishedTestimonials();
        return new TimberResponse('archives/testimonial/index.twig', $context);
    }
}
