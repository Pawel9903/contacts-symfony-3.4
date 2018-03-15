<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 22.02.2018
 * Time: 14:18
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Contacts[]\ArrayCollection;
     *
     * @ORM\OneToMany(targetEntity="Contacts", mappedBy="owner")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     */
    private $contacts;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent:: __construct();
        $this->contacts = new ArrayCollection();
    }

    /**
     * @return Contacts[]
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param Contacts[] $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }
}