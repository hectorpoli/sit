<?php

namespace Hap\EquiposBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestamo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hap\EquiposBundle\Entity\PrestamoRepository")
 */
class Prestamo
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_solicitud", type="date")
     */
    private $fechaSolicitud;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_prestamo", type="date")
     */
    private $fechaPrestamo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_devolucion", type="date")
     */
    private $fechaDevolucion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_regreso", type="date")
     */
    private $fechaRegreso;

    /**
     * @ORM\ManyToOne(targetEntity="Productos", inversedBy="prestamo")
     * @ORM\JoinColumn(name="equipoPrestamo_id", referencedColumnName="id")
     */
    private $equipoPrestamo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="esInterno", type="boolean")
     */
    private $esInterno;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer")
     */
    private $cantidad;

    /**
     * @var boolean
     *
     * @ORM\Column(name="esAprobado", type="boolean")
     */
    private $esAprobado;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_aprobada", type="integer")
     */
    private $cantidadAprobada;


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
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     * @return Prestamo
     */
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;

        return $this;
    }

    /**
     * Get fechaSolicitud
     *
     * @return \DateTime 
     */
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * Set fechaPrestamo
     *
     * @param \DateTime $fechaPrestamo
     * @return Prestamo
     */
    public function setFechaPrestamo($fechaPrestamo)
    {
        $this->fechaPrestamo = $fechaPrestamo;

        return $this;
    }

    /**
     * Get fechaPrestamo
     *
     * @return \DateTime 
     */
    public function getFechaPrestamo()
    {
        return $this->fechaPrestamo;
    }

    /**
     * Set fechaDevolucion
     *
     * @param \DateTime $fechaDevolucion
     * @return Prestamo
     */
    public function setFechaDevolucion($fechaDevolucion)
    {
        $this->fechaDevolucion = $fechaDevolucion;

        return $this;
    }

    /**
     * Get fechaDevolucion
     *
     * @return \DateTime 
     */
    public function getFechaDevolucion()
    {
        return $this->fechaDevolucion;
    }

    /**
     * Set fechaRegreso
     *
     * @param \DateTime $fechaRegreso
     * @return Prestamo
     */
    public function setFechaRegreso($fechaRegreso)
    {
        $this->fechaRegreso = $fechaRegreso;

        return $this;
    }

    /**
     * Get fechaRegreso
     *
     * @return \DateTime 
     */
    public function getFechaRegreso()
    {
        return $this->fechaRegreso;
    }

    

    /**
     * Set esInterno
     *
     * @param boolean $esInterno
     * @return Prestamo
     */
    public function setEsInterno($esInterno)
    {
        $this->esInterno = $esInterno;

        return $this;
    }

    /**
     * Get esInterno
     *
     * @return boolean 
     */
    public function getEsInterno()
    {
        return $this->esInterno;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Prestamo
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set esAprobado
     *
     * @param boolean $esAprobado
     * @return Prestamo
     */
    public function setEsAprobado($esAprobado)
    {
        $this->esAprobado = $esAprobado;

        return $this;
    }

    /**
     * Get esAprobado
     *
     * @return boolean 
     */
    public function getEsAprobado()
    {
        return $this->esAprobado;
    }

    /**
     * Set cantidadAprobada
     *
     * @param integer $cantidadAprobada
     * @return Prestamo
     */
    public function setCantidadAprobada($cantidadAprobada)
    {
        $this->cantidadAprobada = $cantidadAprobada;

        return $this;
    }

    /**
     * Get cantidadAprobada
     *
     * @return integer 
     */
    public function getCantidadAprobada()
    {
        return $this->cantidadAprobada;
    }

    /**
     * Set equipoPrestamo
     *
     * @param \Hap\EquiposBundle\Entity\Productos $equipoPrestamo
     * @return Prestamo
     */
    public function setEquipoPrestamo(\Hap\EquiposBundle\Entity\Productos $equipoPrestamo = null)
    {
        $this->equipoPrestamo = $equipoPrestamo;

        return $this;
    }

    /**
     * Get equipoPrestamo
     *
     * @return \Hap\EquiposBundle\Entity\Productos 
     */
    public function getEquipoPrestamo()
    {
        return $this->equipoPrestamo;
    }
}
