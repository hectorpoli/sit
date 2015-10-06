<?php

namespace Hap\EquiposBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BitacoraCentroDatos
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hap\EquiposBundle\Entity\BitacoraCentroDatosRepository")
 */
class BitacoraCentroDatos
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
     * @ORM\Column(name="fecha_ingreso", type="date")
     */
    private $fechaIngreso;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo_ingreso", type="text")
     */
    private $motivoIngreso;

    /**
     * @var string
     *
     * @ORM\Column(name="labores_realizadas", type="text")
     */
    private $laboresRealizadas;


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
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return BitacoraCentroDatos
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set motivoIngreso
     *
     * @param string $motivoIngreso
     * @return BitacoraCentroDatos
     */
    public function setMotivoIngreso($motivoIngreso)
    {
        $this->motivoIngreso = $motivoIngreso;

        return $this;
    }

    /**
     * Get motivoIngreso
     *
     * @return string 
     */
    public function getMotivoIngreso()
    {
        return $this->motivoIngreso;
    }

    /**
     * Set laboresRealizadas
     *
     * @param string $laboresRealizadas
     * @return BitacoraCentroDatos
     */
    public function setLaboresRealizadas($laboresRealizadas)
    {
        $this->laboresRealizadas = $laboresRealizadas;

        return $this;
    }

    /**
     * Get laboresRealizadas
     *
     * @return string 
     */
    public function getLaboresRealizadas()
    {
        return $this->laboresRealizadas;
    }
}
