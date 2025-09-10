<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ulcoenseigne Entity
 *
 * @property int $id
 * @property int $idschool
 * @property int $ulcosalle_id
 * @property int $ulcomatiere_id
 * @property int $ulcoprof_id
 * @property int $createdby
 * @property \Cake\I18n\DateTime $Creationdate
 *
 * @property \App\Model\Entity\Ulcomatiere $ulcomatiere
 * @property \App\Model\Entity\Ulcoprof $ulcoprof
 */
class Ulcoenseigne extends Entity
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
        'idschool' => true,
        'ulcosalle_id' => true,
        'ulcomatiere_id' => true,
        'ulcoprof_id' => true,
        'createdby' => true,
        'Creationdate' => true,
        'ulcomatiere' => true,
        'ulcoprof' => true,
    ];
}
