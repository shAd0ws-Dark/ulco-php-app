<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UlcoprofsFixture
 */
class UlcoprofsFixture extends TestFixture
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
                'Matricul' => 'Lorem ipsum dolor ',
                'Nom' => 'Lorem ipsum dolor sit amet',
                'Prenom' => 'Lorem ipsum dolor sit amet',
                'genre' => 'Lor',
                'Tel' => 'Lorem ipsu',
                'Email' => 'Lorem ipsum dolor sit amet',
                'Ville' => 'Lorem ipsum dolor sit amet',
                'Status' => 'Lorem ipsum dolor ',
                'Statuspro' => 'Lorem ipsum dolor sit amet',
                'Dateprisefonc' => 'Lorem ipsu',
                'Dob' => 'Lorem ipsu',
                'Pob' => 'Lorem ipsum dolor sit amet',
                'Createdby' => 'Lorem ip',
                'Createdate' => 1755027656,
            ],
        ];
        parent::init();
    }
}
