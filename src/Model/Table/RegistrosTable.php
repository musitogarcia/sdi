<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Registros Model
 *
 * @method \App\Model\Entity\Registro newEmptyEntity()
 * @method \App\Model\Entity\Registro newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Registro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Registro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Registro findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Registro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Registro[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Registro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registro[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Registro[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Registro[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Registro[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RegistrosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('registros');
        $this->setDisplayField('id');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 30)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 100)
            ->requirePresence('descripcion', 'create')
            ->notEmptyString('descripcion');

        $validator
            ->numeric('precio')
            ->requirePresence('precio', 'create')
            ->notEmptyString('precio');

        $validator
            ->dateTime('fecha_compra')
            ->requirePresence('fecha_compra', 'create')
            ->notEmptyDateTime('fecha_compra');

        $validator
            ->scalar('comentarios')
            ->allowEmptyString('comentarios');

        $validator
            ->dateTime('fecha_registro')
            ->allowEmptyDateTime('fecha_registro');

        $validator
            ->dateTime('fecha_modificacion')
            ->allowEmptyDateTime('fecha_modificacion');

        $validator
            ->integer('id_categoria')
            ->requirePresence('id_categoria', 'create')
            ->notEmptyString('id_categoria');

        $validator
            ->integer('id_sucursal')
            ->requirePresence('id_sucursal', 'create')
            ->notEmptyString('id_sucursal');

        $validator
            ->integer('id_estado')
            ->allowEmptyString('id_estado');

        return $validator;
    }
}
