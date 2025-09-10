<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UlcoenseignesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UlcoenseignesTable Test Case
 */
class UlcoenseignesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UlcoenseignesTable
     */
    protected $Ulcoenseignes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ulcoenseignes',
        'app.Ulcomatieres',
        'app.Ulcoprofs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ulcoenseignes') ? [] : ['className' => UlcoenseignesTable::class];
        $this->Ulcoenseignes = $this->getTableLocator()->get('Ulcoenseignes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ulcoenseignes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UlcoenseignesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UlcoenseignesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
