<?php

namespace EmranAlhaddad\StatamicImagehotspots;

use Statamic\Providers\AddonServiceProvider;
use EmranAlhaddad\StatamicImagehotspots\Fieldtypes\ImageHotSpots;
use EmranAlhaddad\StatamicImagehotspots\Tags\HotSpotImageTag;
use Statamic\Facades\GraphQL;

class ServiceProvider extends AddonServiceProvider
{
    protected $vite = [
        'input' => [
            'resources/js/main.js',
            'resources/css/main.css',
        ],
        'publicDirectory' => 'resources/dist',
    ];

    // Register tags
    protected $tags = [
        HotSpotImageTag::class,
    ];

    public function bootAddon()
    {
        GraphQL::addType(\EmranAlhaddad\StatamicImagehotspots\GraphQL\HotspotType::class);
        GraphQL::addType(\EmranAlhaddad\StatamicImagehotspots\GraphQL\HotImageType::class);
        GraphQL::addType(\EmranAlhaddad\StatamicImagehotspots\GraphQL\ImageHotSpotsType::class);
        ImageHotSpots::register();
    }
}
