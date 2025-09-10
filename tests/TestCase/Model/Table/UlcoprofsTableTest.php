<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UlcoprofsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UlcoprofsTable Test Case
 */
class UlcoprofsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UlcoprofsTable
     */
    protected $Ulcoprofs;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ulcoprofs',
        'app.Ulcoenseignes',
        'app.Ulcotimetables',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ulcoprofs') ? [] : ['className' => UlcoprofsTable::class];
        $this->Ulcoprofs = $this->getTableLocator()->get('Ulcoprofs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ulcoprofs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UlcoprofsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
