<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ulcostudent Entity
 *
 * @property int $id
 * @property int $idschool
 * @property int $ulcosalle_id
 * @property int $ulcoparent_id
 * @property string $Matricul
 * @property string $Nom
 * @property string $Prenom
 * @property string $Dob
 * @property string $Pob
 * @property string $Tel
 * @property string $Type
 * @property string $Createdby
 * @property \Cake\I18n\DateTime $Creationdate
 *
 * @property \App\Model\Entity\Ulcosalle $ulcosalle
 * @property \App\Model\Entity\Ulconote[] $ulconotes
 */
class Ulcostudent extends Entity
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
        'ulcoparent_id' => true,
        'Matricul' => true,
        'Nom' => true,
        'Prenom' => true,
        'Dob' => true,
        'Pob' => true,
        'Tel' => true,
        'Type' => true,
        'Createdby' => true,
        'Creationdate' => true,
        'ulcosalle' => true,
        'ulconotes' => true,
    ];
}
