<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ulcotimetables Model
 *
 * @property \App\Model\Table\UlcomatieresTable&\Cake\ORM\Association\BelongsTo $Ulcomatieres
 * @property \App\Model\Table\UlcosallesTable&\Cake\ORM\Association\BelongsTo $Ulcosalles
 * @property \App\Model\Table\UlcoprofsTable&\Cake\ORM\Association\BelongsTo $Ulcoprofs
 *
 * @method \App\Model\Entity\Ulcotimetable newEmptyEntity()
 * @method \App\Model\Entity\Ulcotimetable newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcotimetable> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ulcotimetable get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ulcotimetable findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ulcotimetable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcotimetable> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ulcotimetable|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ulcotimetable saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcotimetable>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcotimetable>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcotimetable>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcotimetable> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcotimetable>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcotimetable>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcotimetable>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcotimetable> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UlcotimetablesTable extends Table
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

        $this->setTable('ulcotimetables');
        $this->setDisplayField('Horaire');
        $this->setPrimaryKey('id');

        $this->belongsTo('Ulcomatieres', [
            'foreignKey' => 'ulcomatiere_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Ulcosalles', [
            'foreignKey' => 'ulcosalle_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Ulcoprofs', [
            'foreignKey' => 'ulcoprof_id',
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
            ->integer('idschool')
            ->requirePresence('idschool', 'create')
            ->notEmptyString('idschool');

        $validator
            ->scalar('Horaire')
            ->maxLength('Horaire', 10)
            ->requirePresence('Horaire', 'create')
            ->notEmptyString('Horaire');

        $validator
            ->scalar('Jour')
            ->maxLength('Jour', 10)
            ->requirePresence('Jour', 'create')
            ->notEmptyString('Jour');

        $validator
            ->integer('ulcomatiere_id')
            ->notEmptyString('ulcomatiere_id');

        $validator
            ->integer('ulcosalle_id')
            ->notEmptyString('ulcosalle_id');

        $validator
            ->integer('ulcoprof_id')
            ->notEmptyString('ulcoprof_id');

        $validator
            ->integer('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmptyString('createdby');

        $validator
            ->dateTime('ctreationdate')
            ->notEmptyDateTime('ctreationdate');

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
        $rules->add($rules->existsIn(['ulcomatiere_id'], 'Ulcomatieres'), ['errorField' => 'ulcomatiere_id']);
        $rules->add($rules->existsIn(['ulcosalle_id'], 'Ulcosalles'), ['errorField' => 'ulcosalle_id']);
        $rules->add($rules->existsIn(['ulcoprof_id'], 'Ulcoprofs'), ['errorField' => 'ulcoprof_id']);

        return $rules;
    }
}
