<?php

namespace Hap\EquiposBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SO
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SO
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_so", type="string", length=100)
     */
    private $nombreSo;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=20)
     */
    private $version;
    
    /**
     * @ORM\OneToMany(targetEntity="Servidores", mappedBy="so")
     */
    protected $servidores;
    
    public function __toString() {
        return $this->nombreSo . '-' . $this->version;
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->servidores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombreSo
     *
     * @param string $nombreSo
     * @return SO
     */
    public function setNombreSo($nombreSo)
    {
        $this->nombreSo = $nombreSo;

        return $this;
    }

    /**
     * Get nombreSo
     *
     * @return string 
     */
    public function getNombreSo()
    {
        return $this->nombreSo;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return SO
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Add servidores
     *
     * @param \Hap\EquiposBundle\Entity\Servidores $servidores
     * @return SO
     */
    public function addServidores(\Hap\EquiposBundle\Entity\Servidores $servidores)
    {
        $this->servidores[] = $servidores;

        return $this;
    }

    /**
     * Remove servidores
     *
     * @param \Hap\EquiposBundle\Entity\Servidores $servidores
     */
    public function removeServidores(\Hap\EquiposBundle\Entity\Servidores $servidores)
    {
        $this->servidores->removeElement($servidores);
    }

    /**
     * Get servidores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServidores()
    {
        return $this->servidores;
    }
}
