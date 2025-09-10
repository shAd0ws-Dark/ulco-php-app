<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ulcomatiere Entity
 *
 * @property int $id
 * @property string $libele
 * @property \Cake\I18n\DateTime $creationdate
 *
 * @property \App\Model\Entity\Ulconote $ulconote
 */
class Ulcomatiere extends Entity
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
        'libele' => true,
        'creationdate' => true,
        'ulconote' => true,
    ];
}
