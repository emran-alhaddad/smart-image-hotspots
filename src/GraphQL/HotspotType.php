<?php

namespace EmranAlhaddad\SmartImageHotspots\GraphQL;

use Rebing\GraphQL\Support\Type as GQLType;
use GraphQL\Type\Definition\Type;

class HotspotType extends GQLType
{
    const NAME = "Hotspot";

    protected $attributes = [
        'name' => self::NAME,
    ];

    public function fields(): array
    {
        return [
            'x' => [
                'type' => Type::float(),
            ],
            'y' => [
                'type' => Type::float(),
            ],
            'content' => [
                'type' => Type::string(),
            ],
        ];
    }
}
