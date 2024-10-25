<?php

use App\Console\Commands\ImportConferences;
use App\Models\Conference;

it('imports conference', function () {
    $command = new ImportConferences;

    $data = [
        [
            '_rel' => ['cfp_uri' => '1'],
            'name' => 'Conference 1',
            'description' => 'Description 1',
            'eventUri' => 'http://example.com',
            'start_date' => '2021-01-01',
            'end_date' => '2021-01-02',
            'dateCfpStart' => '2020-01-01',
            'dateCfpEnd' => '2020-01-02',
            'dateEventStart' => '2021-01-01',
            'dateEventEnd' => '2021-01-02',
            'location' => 'Location 1',
        ],
    ];

    $command->importOrUpdateConference($data[0]);
    $first = Conference::first();

    $this->assertEquals($first->title, 'Conference 1');
});
