<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $titre
 * @property string $description
 * @property string $picture_url
 * @property \Cake\I18n\Time $date_publish
 * @property int $categorie_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Commentary[] $commentarys
 * @property \App\Model\Entity\User[] $users
 */
class Article extends Entity
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
        '*' => true,
        'id' => false
    ];
}
