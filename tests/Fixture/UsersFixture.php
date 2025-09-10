<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'Nom' => 'Lorem ipsum dolor sit amet',
                'Prenom' => 'Lorem ipsum dolor sit amet',
                'Utype' => 1,
                'Ucode' => 'Lorem ip',
                'tel' => 'Lorem ipsu',
                'Etname' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'Etcity' => 'Lorem ipsum dolor sit amet',
                'Createdby' => 'Lorem ipsum dolor sit amet',
                'Createdate' => 1752841903,
            ],
        ];
        parent::init();
    }
}
