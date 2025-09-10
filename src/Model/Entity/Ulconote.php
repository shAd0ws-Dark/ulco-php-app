<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ulconote Entity
 *
 * @property int $id
 * @property int $ulcosalle_id
 * @property int $ulcomatiere_id
 * @property int $ulcoprof_id
 * @property int $ulcostudent_id
 * @property int $sequence
 * @property int $trim
 * @property int $note
 * @property string $chapitre
 * @property int $createdby
 * @property \Cake\I18n\DateTime $creationdate
 *
 * @property \App\Model\Entity\Ulcosalle $ulcosalle
 * @property \App\Model\Entity\Ulcomatiere $ulcomatiere
 * @property \App\Model\Entity\Ulcostudent $ulcostudent
 */
class Ulconote extends Entity
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
        'ulcosalle_id' => true,
        'ulcomatiere_id' => true,
        'ulcoprof_id' => true,
        'ulcostudent_id' => true,
        'sequence' => true,
        'trim' => true,
        'note' => true,
        'chapitre' => true,
        'createdby' => true,
        'creationdate' => true,
        'ulcosalle' => true,
        'ulcomatiere' => true,
        'ulcostudent' => true,
    ];
}
