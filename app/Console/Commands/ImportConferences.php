<?php

namespace App\Console\Commands;

use App\Models\Conference;
use App\Services\CallingAllPapers;
use Illuminate\Console\Command;

class ImportConferences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cfps:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'a command to import cfps from callingallpapers.com';

    /**
     * Execute the console command.
     */
    public function handle(CallingAllPapers $callingAllPapers)
    {
        foreach ($callingAllPapers->getConferences()['cfps'] as $cfp) {
            $this->importOrUpdateConference($cfp);
        }
    }

    public function importOrUpdateConference($cfp)
    {
        Conference::updateOrCreate(
            ['external_id' => $cfp['_rel']['cfp_uri']],
            [
                'title' => $cfp['name'],
                'description' => !empty($cfp['description']) ? $cfp['description'] : 'Description will be given soon',
                'url' => !empty($cfp['eventUri']) ? $cfp['eventUri'] : '#',
                'start_date' => $cfp['dateEventStart'],
                'end_date' => $cfp['dateEventEnd'],
                'cfp_start_at' => $cfp['dateCfpStart'],
                'cfp_end_at' => $cfp['dateCfpEnd'],
                'start_at' => $cfp['dateEventStart'],
                'end_at' => $cfp['dateEventEnd'],
                'location' => !empty($cfp['location']) ? $cfp['location'] : 'Not Specified',

            ]
        );
    }
}
