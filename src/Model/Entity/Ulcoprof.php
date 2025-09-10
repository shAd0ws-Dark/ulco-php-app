<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ulcoprof Entity
 *
 * @property int $id
 * @property int $idschool
 * @property string $Matricul
 * @property string $Nom
 * @property string $Prenom
 * @property string $genre
 * @property string $Tel
 * @property string $Email
 * @property string $Ville
 * @property string $Status
 * @property string $Statuspro
 * @property string $Dateprisefonc
 * @property string $Dob
 * @property string $Pob
 * @property string $Createdby
 * @property \Cake\I18n\DateTime $Createdate
 *
 * @property \App\Model\Entity\Ulcoenseigne[] $ulcoenseignes
 * @property \App\Model\Entity\Ulcotimetable[] $ulcotimetables
 */
class Ulcoprof extends Entity
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
        'Matricul' => true,
        'Nom' => true,
        'Prenom' => true,
        'genre' => true,
        'Tel' => true,
        'Email' => true,
        'Ville' => true,
        'Status' => true,
        'Statuspro' => true,
        'Dateprisefonc' => true,
        'Dob' => true,
        'Pob' => true,
        'Createdby' => true,
        'Createdate' => true,
        'ulcoenseignes' => true,
        'ulcotimetables' => true,
    ];
    
    protected function _getFullName()
    {
        return $this->Nom . '  ' . $this->Prenom;
    }
}
