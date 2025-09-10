<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ulcosalles Model
 *
 * @property \App\Model\Table\UlcoenseignesTable&\Cake\ORM\Association\HasMany $Ulcoenseignes
 * @property \App\Model\Table\UlconotesTable&\Cake\ORM\Association\HasMany $Ulconotes
 * @property \App\Model\Table\UlcostudentsTable&\Cake\ORM\Association\HasMany $Ulcostudents
 * @property \App\Model\Table\UlcotimetablesTable&\Cake\ORM\Association\HasMany $Ulcotimetables
 *
 * @method \App\Model\Entity\Ulcosalle newEmptyEntity()
 * @method \App\Model\Entity\Ulcosalle newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcosalle> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ulcosalle get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ulcosalle findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ulcosalle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcosalle> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ulcosalle|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ulcosalle saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcosalle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcosalle>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcosalle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcosalle> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcosalle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcosalle>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcosalle>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcosalle> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UlcosallesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('ulcosalles');
        $this->setDisplayField('libele');
        $this->setPrimaryKey('id');

        $this->hasMany('Ulcoenseignes', [
            'foreignKey' => 'ulcosalle_id',
        ]);
        $this->hasMany('Ulconotes', [
            'foreignKey' => 'ulcosalle_id',
        ]);
        $this->hasMany('Ulcostudents', [
            'foreignKey' => 'ulcosalle_id',
        ]);
        $this->hasMany('Ulcotimetables', [
            'foreignKey' => 'ulcosalle_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('idschool')
            ->requirePresence('idschool', 'create')
            ->notEmptyString('idschool');

        $validator
            ->scalar('libele')
            ->maxLength('libele', 20)
            ->requirePresence('libele', 'create')
            ->notEmptyString('libele');

        $validator
            ->integer('idproftitu')
            ->requirePresence('idproftitu', 'create')
            ->notEmptyString('idproftitu');

        $validator
            ->scalar('createdby')
            ->maxLength('createdby', 10)
            ->requirePresence('createdby', 'create')
            ->notEmptyString('createdby');

        $validator
            ->dateTime('creationdate')
            ->notEmptyDateTime('creationdate');

        return $validator;
    }
}
