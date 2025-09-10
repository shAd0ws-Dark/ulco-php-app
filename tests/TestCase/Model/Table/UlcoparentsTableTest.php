<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UlcoparentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UlcoparentsTable Test Case
 */
class UlcoparentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UlcoparentsTable
     */
    protected $Ulcoparents;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ulcoparents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ulcoparents') ? [] : ['className' => UlcoparentsTable::class];
        $this->Ulcoparents = $this->getTableLocator()->get('Ulcoparents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ulcoparents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UlcoparentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
