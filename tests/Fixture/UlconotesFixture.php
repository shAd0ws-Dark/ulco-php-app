<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UlconotesFixture
 */
class UlconotesFixture extends TestFixture
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
                'ulcosalle_id' => 1,
                'ulcomatiere_id' => 1,
                'ulcoprof_id' => 1,
                'ulcostudent_id' => 1,
                'sequence' => 1,
                'trim' => 1,
                'note' => 1,
                'chapitre' => 'Lorem ipsum dolor sit amet',
                'createdby' => 1,
                'creationdate' => 1755027644,
            ],
        ];
        parent::init();
    }
}
