<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UlcomatieresFixture
 */
class UlcomatieresFixture extends TestFixture
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
                'libele' => 'Lorem ipsum dolor sit amet',
                'creationdate' => 1753056892,
            ],
        ];
        parent::init();
    }
}
