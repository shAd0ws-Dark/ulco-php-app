<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UlcostudentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UlcostudentsTable Test Case
 */
class UlcostudentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UlcostudentsTable
     */
    protected $Ulcostudents;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ulcostudents',
        'app.Ulcosalles',
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
        $config = $this->getTableLocator()->exists('Ulcostudents') ? [] : ['className' => UlcostudentsTable::class];
        $this->Ulcostudents = $this->getTableLocator()->get('Ulcostudents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ulcostudents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UlcostudentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UlcostudentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
