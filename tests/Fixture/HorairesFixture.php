<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HorairesFixture
 */
class HorairesFixture extends TestFixture
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
                'libele' => 'Lorem ip',
                'createdby' => 1,
                'datecreation' => 1754789873,
            ],
        ];
        parent::init();
    }
}
