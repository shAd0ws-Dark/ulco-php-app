<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UlcotimetablesFixture
 */
class UlcotimetablesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'idschool' => 1,
                'Horaire' => 'Lorem ip',
                'Jour' => 'Lorem ip',
                'ulcomatiere_id' => 1,
                'ulcosalle_id' => 1,
                'ulcoprof_id' => 1,
                'createdby' => 1,
                'ctreationdate' => 1754869892,
            ],
        ];
        parent::init();
    }
}
