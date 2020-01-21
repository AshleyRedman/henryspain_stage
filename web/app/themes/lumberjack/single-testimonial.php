<?php

namespace App;

use App\Http\Controllers\Controller;
use Timber\Timber;

class SingleTestimonialController extends Controller
{
    public function handle()
    {
        wp_safe_redirect('/testimonial', 300);
    }
}
