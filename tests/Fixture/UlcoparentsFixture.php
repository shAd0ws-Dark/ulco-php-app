<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UlcoparentsFixture
 */
class UlcoparentsFixture extends TestFixture
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
                'Nompere' => 'Lorem ipsum dolor sit amet',
                'Prenompere' => 'Lorem ipsum dolor sit amet',
                'Telpere' => 'Lorem ipsu',
                'Nommere' => 'Lorem ipsum dolor sit amet',
                'Prenommere' => 'Lorem ipsum dolor sit amet',
                'Telmere' => 'Lorem ipsu',
                'Tuteur' => 'Lorem ipsum dolor sit amet',
                'Teltuteur' => 'Lorem ipsu',
                'Email' => 'Lorem ipsum dolor sit amet',
                'Adpere' => 'Lorem ipsum dolor sit amet',
                'Admere' => 'Lorem ipsum dolor sit amet',
                'Adtuteur' => 'Lorem ipsum dolor sit amet',
                'Createdby' => 'Lorem ip',
                'Creationdate' => 1753832020,
            ],
        ];
        parent::init();
    }
}
