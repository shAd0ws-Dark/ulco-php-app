<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ulcoprofs Model
 *
 * @property \App\Model\Table\UlcoenseignesTable&\Cake\ORM\Association\HasMany $Ulcoenseignes
 * @property \App\Model\Table\UlcotimetablesTable&\Cake\ORM\Association\HasMany $Ulcotimetables
 *
 * @method \App\Model\Entity\Ulcoprof newEmptyEntity()
 * @method \App\Model\Entity\Ulcoprof newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcoprof> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ulcoprof get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ulcoprof findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ulcoprof patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulcoprof> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ulcoprof|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ulcoprof saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoprof>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoprof>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoprof>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoprof> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoprof>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoprof>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulcoprof>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulcoprof> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UlcoprofsTable extends Table
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

        $this->setTable('ulcoprofs');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Ulcoenseignes', [
            'foreignKey' => 'ulcoprof_id',
        ]);
        $this->hasMany('Ulconotes', [
            'foreignKey' => 'ulcoprof_id',
        ]);
        $this->hasMany('Ulcotimetables', [
            'foreignKey' => 'ulcoprof_id',
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
            ->scalar('Matricul')
            ->maxLength('Matricul', 20)
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
            ->notEmptyString('Prenom');

        $validator
            ->scalar('genre')
            ->maxLength('genre', 5)
            ->requirePresence('genre', 'create')
            ->notEmptyString('genre');

        $validator
            ->scalar('Tel')
            ->maxLength('Tel', 12)
            ->requirePresence('Tel', 'create')
            ->notEmptyString('Tel');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 50)
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email');

        $validator
            ->scalar('Ville')
            ->maxLength('Ville', 50)
            ->requirePresence('Ville', 'create')
            ->notEmptyString('Ville');

        $validator
            ->scalar('Status')
            ->maxLength('Status', 20)
            ->requirePresence('Status', 'create')
            ->notEmptyString('Status');

        $validator
            ->scalar('Statuspro')
            ->maxLength('Statuspro', 50)
            ->requirePresence('Statuspro', 'create')
            ->notEmptyString('Statuspro');

        $validator
            ->scalar('Dateprisefonc')
            ->maxLength('Dateprisefonc', 12)
            ->requirePresence('Dateprisefonc', 'create')
            ->notEmptyString('Dateprisefonc');

        $validator
            ->scalar('Dob')
            ->maxLength('Dob', 12)
            ->requirePresence('Dob', 'create')
            ->notEmptyString('Dob');

        $validator
            ->scalar('Pob')
            ->maxLength('Pob', 50)
            ->requirePresence('Pob', 'create')
            ->notEmptyString('Pob');

        $validator
            ->scalar('Createdby')
            ->maxLength('Createdby', 10)
            ->requirePresence('Createdby', 'create')
            ->notEmptyString('Createdby');

        $validator
            ->dateTime('Createdate')
            ->notEmptyDateTime('Createdate');

        return $validator;
    }
}
