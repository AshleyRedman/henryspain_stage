<?php

return [
    /**
     * List all the sub-classes of Rareloop\Lumberjack\Post in your app that you wish to
     * automatically register with WordPress as part of the bootstrap process.
     */
    'register' => [
        App\PostTypes\Policy::class,
        App\PostTypes\Service::class,
        App\PostTypes\Testimonial::class,
        App\PostTypes\Guide::class,
        App\PostTypes\Team::class,
    ],
];
