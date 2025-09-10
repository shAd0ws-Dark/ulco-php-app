<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UlcotimetablesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UlcotimetablesTable Test Case
 */
class UlcotimetablesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UlcotimetablesTable
     */
    protected $Ulcotimetables;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ulcotimetables',
        'app.Ulcomatieres',
        'app.Ulcosalles',
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
        $config = $this->getTableLocator()->exists('Ulcotimetables') ? [] : ['className' => UlcotimetablesTable::class];
        $this->Ulcotimetables = $this->getTableLocator()->get('Ulcotimetables', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ulcotimetables);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UlcotimetablesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UlcotimetablesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
