<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sucursale Entity
 *
 * @property int $id
 * @property string $ubicacion
 * @property \Cake\I18n\FrozenTime|null $fecha_modificacion
 */
class Sucursale extends Entity
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
        'ubicacion' => true,
        'fecha_modificacion' => true,
    ];
}
