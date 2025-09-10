<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ulcosm Entity
 *
 * @property int $id
 * @property int $utype
 * @property string $destinataire
 * @property string $state
 * @property string $libele
 * @property string $sms
 * @property int $createdby
 * @property \Cake\I18n\DateTime $creationdate
 */
class Ulcosm extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'utype' => true,
        'destinataire' => true,
        'state' => true,
        'libele' => true,
        'sms' => true,
        'createdby' => true,
        'creationdate' => true,
    ];
}
