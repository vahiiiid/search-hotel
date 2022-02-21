<?php

namespace Tests;

use Tests\AvailabilityTest;
use PHPUnit\Framework\TestCase;

class HotelAvailabilityTest extends TestCase
{
    public function test_search()
    {
        $request = [
            'check_in_date' => '2021-01-20',
            'check_out_date' => '2021-01-23',
            'guests' => [
                'adults' => [
                    [
                        'name' => 'Bob Wilmington',
                    ]
                ],
                'children' => [
                    [
                        'name' => 'Clara Meede',
                        'age' => 7,
                    ],
                    [
                        'name' => 'Jonah Fleece',
                        'age' => 13,
                    ]
                ]
            ]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "localhost");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PORT,'8887');
        $output = curl_exec($ch);
        curl_close($ch);

        $this->assertEquals('Hello world!', $output);
    }


}
