<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UlcoenseignesFixture
 */
class UlcoenseignesFixture extends TestFixture
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
                'ulcosalle_id' => 1,
                'ulcomatiere_id' => 1,
                'ulcoprof_id' => 1,
                'createdby' => 1,
                'Creationdate' => 1751462479,
            ],
        ];
        parent::init();
    }
}
