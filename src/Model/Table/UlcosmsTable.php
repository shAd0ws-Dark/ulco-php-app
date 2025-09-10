<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ulcosms Model
 *
 * @method \App\Model\Entity\Ulcosm newEmptyEntity()
 * @method \App\Model\Entity\Ulcosm newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcosm> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ulcosm get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ulcosm findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ulcosm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcosm> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ulcosm|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ulcosm saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcosm>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcosm>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcosm>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcosm> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcosm>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcosm>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcosm>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcosm> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UlcosmsTable extends Table
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

        $this->setTable('ulcosms');
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
            ->integer('utype')
            ->requirePresence('utype', 'create')
            ->notEmptyString('utype');

        $validator
            ->scalar('destinataire')
            ->maxLength('destinataire', 4)
            ->requirePresence('destinataire', 'create')
            ->notEmptyString('destinataire');

        $validator
            ->scalar('state')
            ->maxLength('state', 10)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('libele')
            ->maxLength('libele', 20)
            ->requirePresence('libele', 'create')
            ->notEmptyString('libele');

        $validator
            ->scalar('sms')
            ->requirePresence('sms', 'create')
            ->notEmptyString('sms');

        $validator
            ->integer('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmptyString('createdby');

        $validator
            ->dateTime('creationdate')
            ->notEmptyDateTime('creationdate');

        return $validator;
    }
}
