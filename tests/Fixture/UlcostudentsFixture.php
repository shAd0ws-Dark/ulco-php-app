<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UlcostudentsFixture
 */
class UlcostudentsFixture extends TestFixture
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
                'ulcoparent_id' => 1,
                'Matricul' => 'Lorem ipsum dolor sit amet',
                'Nom' => 'Lorem ipsum dolor sit amet',
                'Prenom' => 'Lorem ipsum dolor sit amet',
                'Dob' => 'Lorem ipsum dolor ',
                'Pob' => 'Lorem ipsum dolor sit amet',
                'Tel' => 'Lorem ipsu',
                'Type' => 'Lorem ip',
                'Createdby' => 'Lorem ip',
                'Creationdate' => 1753832037,
            ],
        ];
        parent::init();
    }
}
