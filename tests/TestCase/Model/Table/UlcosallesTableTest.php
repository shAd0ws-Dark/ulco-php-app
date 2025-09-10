<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UlcosallesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UlcosallesTable Test Case
 */
class UlcosallesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UlcosallesTable
     */
    protected $Ulcosalles;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ulcosalles',
        'app.Ulcoenseignes',
        'app.Ulconotes',
        'app.Ulcostudents',
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
        $config = $this->getTableLocator()->exists('Ulcosalles') ? [] : ['className' => UlcosallesTable::class];
        $this->Ulcosalles = $this->getTableLocator()->get('Ulcosalles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ulcosalles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UlcosallesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
