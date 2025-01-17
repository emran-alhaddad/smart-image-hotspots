<?php

namespace EmranAlhaddad\SmartImageHotspots;

use Statamic\Providers\AddonServiceProvider;
use EmranAlhaddad\SmartImageHotspots\Fieldtypes\ImageHotSpots;
use EmranAlhaddad\SmartImageHotspots\Tags\HotSpotImageTag;
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
        GraphQL::addType(\EmranAlhaddad\SmartImageHotspots\GraphQL\HotspotType::class);
        GraphQL::addType(\EmranAlhaddad\SmartImageHotspots\GraphQL\HotImageType::class);
        GraphQL::addType(\EmranAlhaddad\SmartImageHotspots\GraphQL\ImageHotSpotsType::class);
        ImageHotSpots::register();
    }
}
