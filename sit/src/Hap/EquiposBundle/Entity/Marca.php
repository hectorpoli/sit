<?php

namespace Hap\EquiposBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marca
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Marca
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
     * @ORM\Column(name="nombreMarca", type="string", length=100)
     */
    private $nombreMarca;
    
    /**
     * @ORM\OneToMany(targetEntity="Inventario", mappedBy="marca")
     */
    protected $inventario;


    public function __toString() {
        return $this->nombreMarca;
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
     * Set nombreMarca
     *
     * @param string $nombreMarca
     * @return Marca
     */
    public function setNombreMarca($nombreMarca)
    {
        $this->nombreMarca = $nombreMarca;

        return $this;
    }

    /**
     * Get nombreMarca
     *
     * @return string 
     */
    public function getNombreMarca()
    {
        return $this->nombreMarca;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->inventario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add inventario
     *
     * @param \Hap\EquiposBundle\Entity\Inventario $inventario
     * @return Marca
     */
    public function addInventario(\Hap\EquiposBundle\Entity\Inventario $inventario)
    {
        $this->inventario[] = $inventario;

        return $this;
    }

    /**
     * Remove inventario
     *
     * @param \Hap\EquiposBundle\Entity\Inventario $inventario
     */
    public function removeInventario(\Hap\EquiposBundle\Entity\Inventario $inventario)
    {
        $this->inventario->removeElement($inventario);
    }

    /**
     * Get inventario
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInventario()
    {
        return $this->inventario;
    }
}
