<?php

namespace Hap\EquiposBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Productos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Productos
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
     * @ORM\Column(name="nombre_producto", type="string", length=100)
     */
    private $nombreProducto;
    
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="esPrestamo", type="boolean")
     */
    private $esPrestamo;
    
    /**
     * @ORM\OneToMany(targetEntity="Inventario", mappedBy="productos")
     */
    protected $inventario;
    
    /**
     * @ORM\OneToMany(targetEntity="Prestamo", mappedBy="equipoPrestamo")
     */
    protected $prestamo;
    
    public function __toString() {
        return $this->nombreProducto;
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
     * Set nombreProducto
     *
     * @param string $nombreProducto
     * @return Productos
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get nombreProducto
     *
     * @return string 
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->inventario = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prestamo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add inventario
     *
     * @param \Hap\EquiposBundle\Entity\Inventario $inventario
     * @return Productos
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

    /**
     * Set esPrestamo
     *
     * @param boolean $esPrestamo
     * @return Productos
     */
    public function setEsPrestamo($esPrestamo)
    {
        $this->esPrestamo = $esPrestamo;

        return $this;
    }

    /**
     * Get esPrestamo
     *
     * @return boolean 
     */
    public function getEsPrestamo()
    {
        return $this->esPrestamo;
    }

    /**
     * Add prestamo
     *
     * @param \Hap\EquiposBundle\Entity\Prestamo $prestamo
     * @return Productos
     */
    public function addPrestamo(\Hap\EquiposBundle\Entity\Prestamo $prestamo)
    {
        $this->prestamo[] = $prestamo;

        return $this;
    }

    /**
     * Remove prestamo
     *
     * @param \Hap\EquiposBundle\Entity\Prestamo $prestamo
     */
    public function removePrestamo(\Hap\EquiposBundle\Entity\Prestamo $prestamo)
    {
        $this->prestamo->removeElement($prestamo);
    }

    /**
     * Get prestamo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrestamo()
    {
        return $this->prestamo;
    }
}
