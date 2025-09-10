<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UlconotesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UlconotesTable Test Case
 */
class UlconotesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UlconotesTable
     */
    protected $Ulconotes;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ulconotes',
        'app.Ulcosalles',
        'app.Ulcomatieres',
        'app.Ulcostudents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ulconotes') ? [] : ['className' => UlconotesTable::class];
        $this->Ulconotes = $this->getTableLocator()->get('Ulconotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ulconotes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UlconotesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UlconotesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
