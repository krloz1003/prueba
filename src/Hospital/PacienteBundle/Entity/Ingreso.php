<?php

namespace Hospital\PacienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Hospital\PacienteBundle\Entity\Paciente;

/**
 * Ingreso
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hospital\PacienteBundle\Entity\IngresoRepository")
 */
class Ingreso
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
     * @ORM\Column(name="edoSalud", type="string", length=255)
     */
    private $edoSalud;

    /**
     * @var string
     *
     * @ORM\Column(name="ingreso", type="string", length=255)
     */
    private $ingreso;

    /**
     * @var string
     *
     * @ORM\Column(name="medico", type="string", length=255)
     */
    private $medico;

    /**
     * @ORM\ManyToOne(targetEntity="Hospital\PacienteBundle\Entity\Paciente", inversedBy="ingresos")     
     * @ORM\JoinColumn(name="paciente_id", referencedColumnName="id")
    */
    protected $paciente;

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
     * Set edoSalud
     *
     * @param string $edoSalud
     * @return Ingreso
     */
    public function setEdoSalud($edoSalud)
    {
        $this->edoSalud = $edoSalud;
    
        return $this;
    }

    /**
     * Get edoSalud
     *
     * @return string 
     */
    public function getEdoSalud()
    {
        return $this->edoSalud;
    }

    /**
     * Set ingreso
     *
     * @param string $ingreso
     * @return Ingreso
     */
    public function setIngreso($ingreso)
    {
        $this->ingreso = $ingreso;
    
        return $this;
    }

    /**
     * Get ingreso
     *
     * @return string 
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }

    /**
     * Set medico
     *
     * @param string $medico
     * @return Ingreso
     */
    public function setMedico($medico)
    {
        $this->medico = $medico;
    
        return $this;
    }

    /**
     * Get medico
     *
     * @return string 
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * Set paciente
     *
     * @param \Hospital\PacienteBundle\Entity\Paciente $paciente
     * @return Ingreso
     */
    public function setPaciente(\Hospital\PacienteBundle\Entity\Paciente $paciente = null)
    {
        $this->paciente = $paciente;

        return $this;
    }

    /**
     * Get Paciente
     *
     * @return \Hospital\PacienteBundle\Entity\Paciente
     */
    public function getPaciente()
    {
        return $this->paciente;
    }    
}
