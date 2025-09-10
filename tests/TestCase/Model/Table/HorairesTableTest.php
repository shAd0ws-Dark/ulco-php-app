<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HorairesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HorairesTable Test Case
 */
class HorairesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HorairesTable
     */
    protected $Horaires;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Horaires',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Horaires') ? [] : ['className' => HorairesTable::class];
        $this->Horaires = $this->getTableLocator()->get('Horaires', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Horaires);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HorairesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
