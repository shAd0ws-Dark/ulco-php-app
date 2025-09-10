<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('Nom');
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
            ->scalar('Nom')
            ->maxLength('Nom', 50)
            ->requirePresence('Nom', 'create')
            ->notEmptyString('Nom');

        $validator
            ->scalar('Prenom')
            ->maxLength('Prenom', 50)
            ->requirePresence('Prenom', 'create')
            ->notEmptyString('Prenom');

        $validator
            ->integer('Utype')
            ->requirePresence('Utype', 'create')
            ->notEmptyString('Utype');

        $validator
            ->scalar('Ucode')
            ->maxLength('Ucode', 10)
            ->requirePresence('Ucode', 'create')
            ->notEmptyString('Ucode');

        $validator
            ->scalar('tel')
            ->maxLength('tel', 12)
            ->requirePresence('tel', 'create')
            ->notEmptyString('tel')
            ->add('tel', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('Etname')
            ->maxLength('Etname', 100)
            ->requirePresence('Etname', 'create')
            ->notEmptyString('Etname');

        $validator
            ->scalar('password')
            ->maxLength('password', 300)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('Etcity')
            ->maxLength('Etcity', 500)
            ->requirePresence('Etcity', 'create')
            ->notEmptyString('Etcity');

        $validator
            ->scalar('Createdby')
            ->maxLength('Createdby', 100)
            ->requirePresence('Createdby', 'create')
            ->notEmptyString('Createdby');

        $validator
            ->dateTime('Createdate')
            ->notEmptyDateTime('Createdate');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['tel']), ['errorField' => 'tel']);

        return $rules;
    }
}
