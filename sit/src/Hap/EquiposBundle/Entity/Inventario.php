<?php

namespace Hap\EquiposBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Inventario
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Inventario
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
     * @ORM\Column(name="modelo", type="string", length=50)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=50)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=50)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="serial", type="string", length=100)
     */
    private $serial;

    /**
     * @var string
     *
     * @ORM\Column(name="numerobien", type="string", length=100)
     */
    private $numerobien;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Productos", inversedBy="inventario")
     * @ORM\JoinColumn(name="productos_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     */
    protected $productos;


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
     * Set modelo
     *
     * @param string $modelo
     * @return Inventario
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set marca
     *
     * @param string $marca
     * @return Inventario
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Inventario
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set serial
     *
     * @param string $serial
     * @return Inventario
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial
     *
     * @return string 
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set numerobien
     *
     * @param string $numerobien
     * @return Inventario
     */
    public function setNumerobien($numerobien)
    {
        $this->numerobien = $numerobien;

        return $this;
    }

    /**
     * Get numerobien
     *
     * @return string 
     */
    public function getNumerobien()
    {
        return $this->numerobien;
    }

    /**
     * Set productos
     *
     * @param \Hap\EquiposBundle\Entity\Productos $productos
     * @return Inventario
     */
    public function setProductos(\Hap\EquiposBundle\Entity\Productos $productos = null)
    {
        $this->productos = $productos;

        return $this;
    }

    /**
     * Get productos
     *
     * @return \Hap\EquiposBundle\Entity\Productos 
     */
    public function getProductos()
    {
        return $this->productos;
    }
}
