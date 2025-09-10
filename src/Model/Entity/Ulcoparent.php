<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ulcoparent Entity
 *
 * @property int $id
 * @property int $idschool
 * @property string $Nompere
 * @property string $Prenompere
 * @property string $Telpere
 * @property string $Nommere
 * @property string $Prenommere
 * @property string $Telmere
 * @property string $Tuteur
 * @property string $Teltuteur
 * @property string $Email
 * @property string $Adpere
 * @property string $Admere
 * @property string $Adtuteur
 * @property string $Createdby
 * @property \Cake\I18n\DateTime $Creationdate
 */
class Ulcoparent extends Entity
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
        'Nompere' => true,
        'Prenompere' => true,
        'Telpere' => true,
        'Nommere' => true,
        'Prenommere' => true,
        'Telmere' => true,
        'Tuteur' => true,
        'Teltuteur' => true,
        'Email' => true,
        'Adpere' => true,
        'Admere' => true,
        'Adtuteur' => true,
        'Createdby' => true,
        'Creationdate' => true,
    ];
}
