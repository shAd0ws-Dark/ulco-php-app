<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ulcostudents Model
 *
 * @property \App\Model\Table\UlcosallesTable&\Cake\ORM\Association\BelongsTo $Ulcosalles
 * @property \App\Model\Table\UlconotesTable&\Cake\ORM\Association\HasMany $Ulconotes
 *
 * @method \App\Model\Entity\Ulcostudent newEmptyEntity()
 * @method \App\Model\Entity\Ulcostudent newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcostudent> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ulcostudent get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ulcostudent findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ulcostudent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcostudent> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ulcostudent|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ulcostudent saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcostudent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcostudent>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcostudent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcostudent> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcostudent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcostudent>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcostudent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcostudent> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UlcostudentsTable extends Table
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

        $this->setTable('ulcostudents');
        $this->setDisplayField('Matricul');
        $this->setPrimaryKey('id');

        $this->belongsTo('Ulcosalles', [
            'foreignKey' => 'ulcosalle_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Ulcoparents', [
            'foreignKey' => 'ulcoparent_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Ulconotes', [
            'foreignKey' => 'ulcostudent_id',
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
            ->integer('ulcosalle_id')
            ->notEmptyString('ulcosalle_id');

        $validator
            ->integer('ulcoparent_id')
            ->notEmptyString('ulcoparent_id');

        $validator
            ->scalar('Matricul')
            ->maxLength('Matricul', 50)
            ->requirePresence('Matricul', 'create')
            ->notEmptyString('Matricul');

        $validator
            ->scalar('Nom')
            ->maxLength('Nom', 50)
            ->requirePresence('Nom', 'create')
            ->notEmptyString('Nom');

        $validator
            ->scalar('Prenom')
            ->maxLength('Prenom', 50)
            ->requirePresence('Prenom', 'create')
            ->allowEmptyString('Prenom');

        $validator
            ->scalar('Dob')
            ->maxLength('Dob', 20)
            ->requirePresence('Dob', 'create')
            ->notEmptyString('Dob');

        $validator
            ->scalar('Pob')
            ->maxLength('Pob', 50)
            ->requirePresence('Pob', 'create')
            ->notEmptyString('Pob');

        $validator
            ->scalar('Tel')
            ->maxLength('Tel', 12)
            ->requirePresence('Tel', 'create')
            ->notEmptyString('Tel');

        $validator
            ->scalar('Type')
            ->maxLength('Type', 10)
            ->requirePresence('Type', 'create')
            ->notEmptyString('Type');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['ulcosalle_id'], 'Ulcosalles'), ['errorField' => 'ulcosalle_id']);
        $rules->add($rules->existsIn(['ulcoparent_id'], 'Ulcoparents'), ['errorField' => 'ulcoparent_id']);

        return $rules;
    }
}
