<?php

namespace EmranAlhaddad\SmartImageHotspots\GraphQL;

use Nette\Utils\ImageType;
use Rebing\GraphQL\Support\Type;
use Statamic\Facades\GraphQL;

class ImageHotSpotsType extends Type
{
    const NAME = 'ImageHotSpots';

    protected $attributes = [
        'name' => self::NAME,
    ];

    public function fields(): array
    {
        return [
            'imageFile' => [
                'type' => GraphQL::type(HotImageType::NAME),
                'resolve' => function ($hotspot) {
                    return $hotspot['imageFile'] ?? null;
                },
            ],
            'hotspots' => [
                'type' => GraphQL::listOf(GraphQL::type(HotspotType::NAME)),
                'resolve' => function ($hotspot) {
                    return $hotspot['hotspots'] ?? [];
                },
            ],
        ];
    }
}
