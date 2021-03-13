<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegistrosFixture
 */
class RegistrosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nombre' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        'descripcion' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null],
        'precio' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'fecha_compra' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'comentarios' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha_registro' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'fecha_modificacion' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'id_categoria' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_sucursal' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_estado' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_registros_categorias' => ['type' => 'index', 'columns' => ['id_categoria'], 'length' => []],
            'fk_registros_sucursales' => ['type' => 'index', 'columns' => ['id_sucursal'], 'length' => []],
            'fk_registros_estados' => ['type' => 'index', 'columns' => ['id_estado'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_registros_sucursales' => ['type' => 'foreign', 'columns' => ['id_sucursal'], 'references' => ['sucursales', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_registros_estados' => ['type' => 'foreign', 'columns' => ['id_estado'], 'references' => ['estados', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_registros_categorias' => ['type' => 'foreign', 'columns' => ['id_categoria'], 'references' => ['categorias', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'descripcion' => 'Lorem ipsum dolor sit amet',
                'precio' => 1,
                'fecha_compra' => '2021-03-12 18:00:12',
                'comentarios' => 1,
                'fecha_registro' => '2021-03-12 18:00:12',
                'fecha_modificacion' => '2021-03-12 18:00:12',
                'id_categoria' => 1,
                'id_sucursal' => 1,
                'id_estado' => 1,
            ],
        ];
        parent::init();
    }
}
