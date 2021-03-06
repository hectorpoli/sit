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
     * @ORM\ManyToOne(targetEntity="Marca", inversedBy="inventario")
     * @ORM\JoinColumn(name="marca_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     */
    protected $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     */
    private $descripcion;

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
     * @ORM\ManyToOne(targetEntity="Departamentos", inversedBy="inventario")
     * @ORM\JoinColumn(name="departamentos_id", referencedColumnName="id")
     * @Assert\NotBlank(message="Este campo no puede estar en blanco")
     */
    protected $departamento;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Servidores", mappedBy="inventario")
     */
    protected $servidores;

    
    public function __toString() {
        return 'Producto: ' . $this->productos . ',Marca: ' . $this->marca . ', Modelo: ' .$this->modelo . ', Serial: ' .$this->serial;
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Inventario
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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
     * Set marca
     *
     * @param \Hap\EquiposBundle\Entity\Marca $marca
     * @return Inventario
     */
    public function setMarca(\Hap\EquiposBundle\Entity\Marca $marca = null)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return \Hap\EquiposBundle\Entity\Marca 
     */
    public function getMarca()
    {
        return $this->marca;
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

    /**
     * Set departamento
     *
     * @param \Hap\EquiposBundle\Entity\Departamentos $departamento
     * @return Inventario
     */
    public function setDepartamento(\Hap\EquiposBundle\Entity\Departamentos $departamento = null)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return \Hap\EquiposBundle\Entity\Departamentos 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Add servidores
     *
     * @param \Hap\EquiposBundle\Entity\Servidores $servidores
     * @return Inventario
     */
    public function addServidore(\Hap\EquiposBundle\Entity\Servidores $servidores)
    {
        $this->servidores[] = $servidores;

        return $this;
    }

    /**
     * Remove servidores
     *
     * @param \Hap\EquiposBundle\Entity\Servidores $servidores
     */
    public function removeServidore(\Hap\EquiposBundle\Entity\Servidores $servidores)
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
