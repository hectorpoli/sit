<?php

namespace Hap\EquiposBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servidores
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Servidores
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
     * @ORM\Column(name="ip", type="string", length=12)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="SO", inversedBy="servidores")
     * @ORM\JoinColumn(name="so_id", referencedColumnName="id")
     * 
     */
    private $so;

    /**
     * @var string
     *
     * @ORM\Column(name="virtualizacion", type="string", length=1)
     */
    private $virtualizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="memoria", type="string", length=20)
     */
    private $memoria;

    /**
     * @var string
     *
     * @ORM\Column(name="disco", type="string", length=20)
     */
    private $disco;

    /**
     * @var string
     *
     * @ORM\Column(name="cpu", type="string", length=20)
     */
    private $cpu;
    
    /**
     * @ORM\ManyToMany(targetEntity="Servicios", inversedBy="servidores")
     * @ORM\JoinColumn(name="servicios_id", referencedColumnName="id")
     * 
     */
    protected $servicios;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Inventario", inversedBy="servidores")
     * @ORM\JoinColumn(name="inventario_id", referencedColumnName="id")
     * 
     */
    protected $inventario;


    
    

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
     * Set ip
     *
     * @param string $ip
     * @return Servidores
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Servidores
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
     * Set virtualizacion
     *
     * @param string $virtualizacion
     * @return Servidores
     */
    public function setVirtualizacion($virtualizacion)
    {
        $this->virtualizacion = $virtualizacion;

        return $this;
    }

    /**
     * Get virtualizacion
     *
     * @return string 
     */
    public function getVirtualizacion()
    {
        return $this->virtualizacion;
    }

    /**
     * Set memoria
     *
     * @param string $memoria
     * @return Servidores
     */
    public function setMemoria($memoria)
    {
        $this->memoria = $memoria;

        return $this;
    }

    /**
     * Get memoria
     *
     * @return string 
     */
    public function getMemoria()
    {
        return $this->memoria;
    }

    /**
     * Set disco
     *
     * @param string $disco
     * @return Servidores
     */
    public function setDisco($disco)
    {
        $this->disco = $disco;

        return $this;
    }

    /**
     * Get disco
     *
     * @return string 
     */
    public function getDisco()
    {
        return $this->disco;
    }

    /**
     * Set cpu
     *
     * @param string $cpu
     * @return Servidores
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu
     *
     * @return string 
     */
    public function getCpu()
    {
        return $this->cpu;
    }

   

    /**
     * Set inventario
     *
     * @param \Hap\EquiposBundle\Entity\Inventario $inventario
     * @return Servidores
     */
    public function setInventario(\Hap\EquiposBundle\Entity\Inventario $inventario = null)
    {
        $this->inventario = $inventario;

        return $this;
    }

    /**
     * Get inventario
     *
     * @return \Hap\EquiposBundle\Entity\Inventario 
     */
    public function getInventario()
    {
        return $this->inventario;
    }

    /**
     * Set so
     *
     * @param \Hap\EquiposBundle\Entity\SO $so
     * @return Servidores
     */
    public function setSo(\Hap\EquiposBundle\Entity\SO $so = null)
    {
        $this->so = $so;

        return $this;
    }

    /**
     * Get so
     *
     * @return \Hap\EquiposBundle\Entity\SO 
     */
    public function getSo()
    {
        return $this->so;
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->servicios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add servicios
     *
     * @param \Hap\EquiposBundle\Entity\Servicios $servicios
     * @return Servidores
     */
    public function addServicio(\Hap\EquiposBundle\Entity\Servicios $servicios)
    {
        $this->servicios[] = $servicios;

        return $this;
    }

    /**
     * Remove servicios
     *
     * @param \Hap\EquiposBundle\Entity\Servicios $servicios
     */
    public function removeServicio(\Hap\EquiposBundle\Entity\Servicios $servicios)
    {
        $this->servicios->removeElement($servicios);
    }

    /**
     * Get servicios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServicios()
    {
        return $this->servicios;
    }
}
