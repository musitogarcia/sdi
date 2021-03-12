<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Registro Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property float $precio
 * @property \Cake\I18n\FrozenTime $fecha_compra
 * @property int|null $comentarios
 * @property \Cake\I18n\FrozenTime|null $fecha_registro
 * @property \Cake\I18n\FrozenTime|null $fecha_modificacion
 * @property int $id_categoria
 * @property int $id_sucursal
 * @property int|null $id_estado
 */
class Registro extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nombre' => true,
        'descripcion' => true,
        'precio' => true,
        'fecha_compra' => true,
        'comentarios' => true,
        'fecha_registro' => true,
        'fecha_modificacion' => true,
        'id_categoria' => true,
        'id_sucursal' => true,
        'id_estado' => true,
    ];
}
