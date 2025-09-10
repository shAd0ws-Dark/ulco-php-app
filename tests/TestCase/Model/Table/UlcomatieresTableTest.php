<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UlcomatieresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UlcomatieresTable Test Case
 */
class UlcomatieresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UlcomatieresTable
     */
    protected $Ulcomatieres;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ulcomatieres',
        'app.Ulconotes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ulcomatieres') ? [] : ['className' => UlcomatieresTable::class];
        $this->Ulcomatieres = $this->getTableLocator()->get('Ulcomatieres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ulcomatieres);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UlcomatieresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
