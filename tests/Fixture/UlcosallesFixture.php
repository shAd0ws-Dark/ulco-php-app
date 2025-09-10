<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UlcosallesFixture
 */
class UlcosallesFixture extends TestFixture
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
                'libele' => 'Lorem ipsum dolor ',
                'idproftitu' => 1,
                'createdby' => 'Lorem ip',
                'creationdate' => 1753193563,
            ],
        ];
        parent::init();
    }
}
