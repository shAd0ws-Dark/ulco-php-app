<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ulcomatieres Model
 *
 * @property \App\Model\Table\UlconotesTable&\Cake\ORM\Association\HasMany $Ulconotes
 *
 * @method \App\Model\Entity\Ulcomatiere newEmptyEntity()
 * @method \App\Model\Entity\Ulcomatiere newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcomatiere> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ulcomatiere get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ulcomatiere findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ulcomatiere patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcomatiere> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ulcomatiere|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ulcomatiere saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcomatiere>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcomatiere>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcomatiere>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcomatiere> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcomatiere>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcomatiere>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcomatiere>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcomatiere> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UlcomatieresTable extends Table
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

        $this->setTable('ulcomatieres');
        $this->setDisplayField('libele');
        $this->setPrimaryKey('id');

        $this->hasMany('Ulcoenseignes', [
            'foreignKey' => 'ulcomatiere_id',
        ]);
        $this->hasMany('Ulconotes', [
            'foreignKey' => 'ulcomatiere_id',
        ]);
        $this->hasMany('Ulcotimetables', [
            'foreignKey' => 'ulcomatiere_id',
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
            ->scalar('libele')
            ->maxLength('libele', 50)
            ->requirePresence('libele', 'create')
            ->notEmptyString('libele');

        $validator
            ->dateTime('creationdate')
            ->notEmptyDateTime('creationdate');

        return $validator;
    }
}
