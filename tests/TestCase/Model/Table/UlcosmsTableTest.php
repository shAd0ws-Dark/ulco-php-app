<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UlcosmsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UlcosmsTable Test Case
 */
class UlcosmsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UlcosmsTable
     */
    protected $Ulcosms;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ulcosms',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ulcosms') ? [] : ['className' => UlcosmsTable::class];
        $this->Ulcosms = $this->getTableLocator()->get('Ulcosms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ulcosms);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UlcosmsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
