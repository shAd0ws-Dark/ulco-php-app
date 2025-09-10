<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ulcoparents Model
 *
 * @method \App\Model\Entity\Ulcoparent newEmptyEntity()
 * @method \App\Model\Entity\Ulcoparent newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcoparent> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ulcoparent get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ulcoparent findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ulcoparent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcoparent> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ulcoparent|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ulcoparent saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoparent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoparent>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoparent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoparent> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoparent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoparent>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoparent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoparent> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UlcoparentsTable extends Table
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

        $this->setTable('ulcoparents');
        $this->setDisplayField('Nompere');
        $this->setPrimaryKey('id');

        $this->hasMany('Ulcostudents', [
            'foreignKey' => 'ulcoparent_id',
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
            ->scalar('Nompere')
            ->maxLength('Nompere', 50)
            ->requirePresence('Nompere', 'create')
            ->notEmptyString('Nompere');

        $validator
            ->scalar('Prenompere')
            ->maxLength('Prenompere', 50)
            ->requirePresence('Prenompere', 'create')
            ->allowEmptyString('Prenompere');

        $validator
            ->scalar('Telpere')
            ->maxLength('Telpere', 12)
            ->requirePresence('Telpere', 'create')
            ->notEmptyString('Telpere');

        $validator
            ->scalar('Nommere')
            ->maxLength('Nommere', 50)
            ->requirePresence('Nommere', 'create')
            ->notEmptyString('Nommere');

        $validator
            ->scalar('Prenommere')
            ->maxLength('Prenommere', 50)
            ->requirePresence('Prenommere', 'create')
            ->allowEmptyString('Prenommere');

        $validator
            ->scalar('Telmere')
            ->maxLength('Telmere', 12)
            ->requirePresence('Telmere', 'create')
            ->notEmptyString('Telmere');

        $validator
            ->scalar('Tuteur')
            ->maxLength('Tuteur', 100)
            ->requirePresence('Tuteur', 'create')
            ->allowEmptyString('Tuteur');

        $validator
            ->scalar('Teltuteur')
            ->maxLength('Teltuteur', 12)
            ->requirePresence('Teltuteur', 'create')
            ->allowEmptyString('Teltuteur');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 50)
            ->requirePresence('Email', 'create')
            ->allowEmptyString('Email');

        $validator
            ->scalar('Adpere')
            ->maxLength('Adpere', 100)
            ->requirePresence('Adpere', 'create')
            ->notEmptyString('Adpere');

        $validator
            ->scalar('Admere')
            ->maxLength('Admere', 100)
            ->requirePresence('Admere', 'create')
            ->allowEmptyString('Admere');

        $validator
            ->scalar('Adtuteur')
            ->maxLength('Adtuteur', 100)
            ->requirePresence('Adtuteur', 'create')
            ->allowEmptyString('Adtuteur');

        $validator
            ->scalar('Createdby')
            ->maxLength('Createdby', 10)
            ->requirePresence('Createdby', 'create')
            ->notEmptyString('Createdby');

        $validator
            ->dateTime('Creationdate')
            ->notEmptyDateTime('Creationdate');

        return $validator;
    }
}
