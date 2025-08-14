<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contactform Model
 *
 * @method \App\Model\Entity\Contactform newEmptyEntity()
 * @method \App\Model\Entity\Contactform newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Contactform> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contactform get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Contactform findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Contactform patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Contactform> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contactform|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Contactform saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Contactform>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contactform>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contactform>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contactform> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contactform>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contactform>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contactform>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contactform> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContactformTable extends Table
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

        $this->setTable('contactform');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('first_name')
            ->maxLength('first_name', 32)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 32)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmptyString('message');

        return $validator;
    }
}
