<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ulcoenseignes Model
 *
 * @property \App\Model\Table\UlcomatieresTable&\Cake\ORM\Association\BelongsTo $Ulcomatieres
 * @property \App\Model\Table\UlcoprofsTable&\Cake\ORM\Association\BelongsTo $Ulcoprofs
 *
 * @method \App\Model\Entity\Ulcoenseigne newEmptyEntity()
 * @method \App\Model\Entity\Ulcoenseigne newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcoenseigne> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ulcoenseigne get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ulcoenseigne findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ulcoenseigne patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcoenseigne> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ulcoenseigne|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ulcoenseigne saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoenseigne>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoenseigne>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoenseigne>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoenseigne> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoenseigne>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoenseigne>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoenseigne>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoenseigne> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UlcoenseignesTable extends Table
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

        $this->setTable('ulcoenseignes');
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
            ->integer('ulcomatiere_id')
            ->notEmptyString('ulcomatiere_id');

        $validator
            ->integer('ulcoprof_id')
            ->notEmptyString('ulcoprof_id');

        $validator
            ->integer('createdby')
            ->requirePresence('createdby', 'create')
            ->notEmptyString('createdby');

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
        $rules->add($rules->existsIn(['ulcomatiere_id'], 'Ulcomatieres'), ['errorField' => 'ulcomatiere_id']);
        $rules->add($rules->existsIn(['ulcoprof_id'], 'Ulcoprofs'), ['errorField' => 'ulcoprof_id']);

        return $rules;
    }
}
