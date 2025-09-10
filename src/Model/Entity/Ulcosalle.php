<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ulcosalle Entity
 *
 * @property int $id
 * @property int $idschool
 * @property string $libele
 * @property int $idproftitu
 * @property string $createdby
 * @property \Cake\I18n\DateTime $creationdate
 *
 * @property \App\Model\Entity\Ulcoenseigne[] $ulcoenseignes
 * @property \App\Model\Entity\Ulconote[] $ulconotes
 * @property \App\Model\Entity\Ulcostudent[] $ulcostudents
 * @property \App\Model\Entity\Ulcotimetable[] $ulcotimetables
 */
class Ulcosalle extends Entity
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
        'libele' => true,
        'idproftitu' => true,
        'createdby' => true,
        'creationdate' => true,
        'ulcoenseignes' => true,
        'ulconotes' => true,
        'ulcostudents' => true,
        'ulcotimetables' => true,
    ];
}
