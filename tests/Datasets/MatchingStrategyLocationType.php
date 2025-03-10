<?php

use App\Enums\ProvinceOrTerritory;

dataset('matchingStrategyLocationType', function () {
    return [
        'no region and location' => [
            [],
            null,
        ],
        'with locations' => [
            [
                'locations' => [
                    [
                        'region' => ProvinceOrTerritory::Ontario->value,
                        'locality' => 'Toronto',
                    ],
                ],
            ],
            'localities',
        ],
        'with regions' => [
            ['regions' => [ProvinceOrTerritory::Ontario->value]],
            'regions',
        ],
        'with regions and locations' => [
            [
                'locations' => [
                    [
                        'region' => ProvinceOrTerritory::Ontario->value,
                        'locality' => 'Toronto',
                    ],
                ],
                'regions' => [ProvinceOrTerritory::Ontario->value],
            ],
            'regions',
        ],
    ];
});
