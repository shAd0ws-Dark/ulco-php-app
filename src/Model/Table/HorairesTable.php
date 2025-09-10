<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Horaires Model
 *
 * @method \App\Model\Entity\Horaire newEmptyEntity()
 * @method \App\Model\Entity\Horaire newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Horaire> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Horaire get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Horaire findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Horaire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Horaire> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Horaire|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Horaire saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Horaire>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Horaire>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Horaire>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Horaire> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Horaire>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Horaire>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Horaire>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Horaire> deleteManyOrFail(iterable $entities, array $options = [])
 */
class HorairesTable extends Table
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

        $this->setTable('horaires');
        $this->setDisplayField('libele');
        $this->setPrimaryKey('id');
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
            ->scalar('libele')
            ->maxLength('libele', 10)
            ->requirePresence('libele', 'create')
            ->notEmptyString('libele');

        $validator
            ->integer('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmptyString('createdby');

        $validator
            ->dateTime('datecreation')
            ->notEmptyDateTime('datecreation');

        return $validator;
    }
}
