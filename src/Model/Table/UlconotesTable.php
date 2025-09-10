<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ulconotes Model
 *
 * @property \App\Model\Table\UlcosallesTable&\Cake\ORM\Association\BelongsTo $Ulcosalles
 * @property \App\Model\Table\UlcomatieresTable&\Cake\ORM\Association\BelongsTo $Ulcomatieres
 * @property \App\Model\Table\UlcostudentsTable&\Cake\ORM\Association\BelongsTo $Ulcostudents
 *
 * @method \App\Model\Entity\Ulconote newEmptyEntity()
 * @method \App\Model\Entity\Ulconote newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulconote> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ulconote get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ulconote findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ulconote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulconote> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ulconote|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ulconote saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ulconote>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulconote>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulconote>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulconote> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulconote>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulconote>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulconote>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulconote> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UlconotesTable extends Table
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

        $this->setTable('ulconotes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Ulcosalles', [
            'foreignKey' => 'ulcosalle_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Ulcomatieres', [
            'foreignKey' => 'ulcomatiere_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Ulcoprofs', [
            'foreignKey' => 'ulcoprof_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Ulcostudents', [
            'foreignKey' => 'ulcostudent_id',
            'joinType' => 'INNER',
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
            ->integer('ulcosalle_id')
            ->notEmptyString('ulcosalle_id');

        $validator
            ->integer('ulcomatiere_id')
            ->notEmptyString('ulcomatiere_id');

        $validator
            ->integer('ulcoprof_id')
            ->notEmptyString('ulcoprof_id');

        $validator
            ->integer('ulcostudent_id')
            ->notEmptyString('ulcostudent_id');

        $validator
            ->integer('sequence')
            ->requirePresence('sequence', 'create')
            ->notEmptyString('sequence');

        $validator
            ->integer('trim')
            ->requirePresence('trim', 'create')
            ->notEmptyString('trim');

        $validator
            ->integer('note')
            ->requirePresence('note', 'create')
            ->notEmptyString('note');

        $validator
            ->scalar('chapitre')
            ->maxLength('chapitre', 200)
            ->requirePresence('chapitre', 'create')
            ->notEmptyString('chapitre');

        $validator
            ->integer('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmptyString('createdby');

        $validator
            ->dateTime('creationdate')
            ->notEmptyDateTime('creationdate');

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
        $rules->add($rules->existsIn(['ulcomatiere_id'], 'Ulcomatieres'), ['errorField' => 'ulcomatiere_id']);
        $rules->add($rules->existsIn(['ulcoprof_id'], 'Ulcoprofs'), ['errorField' => 'ulcoprof_id']);
        $rules->add($rules->existsIn(['ulcostudent_id'], 'Ulcostudents'), ['errorField' => 'ulcostudent_id']);

        return $rules;
    }
}
