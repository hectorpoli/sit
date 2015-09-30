<?php

namespace Hap\EquiposBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servicios
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Servicios
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
     * @ORM\Column(name="nombreServicio", type="string", length=150)
     */
    private $nombreServicio;
    
    /**
     * @ORM\OneToMany(targetEntity="Servidores", mappedBy="servicios")
     */
    protected $servidores;
    
    public function __toString() {
        return $this->nombreServicio;
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
     * Set nombreServicio
     *
     * @param string $nombreServicio
     * @return Servicios
     */
    public function setNombreServicio($nombreServicio)
    {
        $this->nombreServicio = $nombreServicio;

        return $this;
    }

    /**
     * Get nombreServicio
     *
     * @return string 
     */
    public function getNombreServicio()
    {
        return $this->nombreServicio;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->servidores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add servidores
     *
     * @param \Hap\EquiposBundle\Entity\Servidores $servidores
     * @return Servicios
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
