<?php

namespace Hospital\PacienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paciente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Hospital\PacienteBundle\Entity\PacienteRepository")
 */
class Paciente
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
     * @ORM\Column(name="expediente", type="string", length=10)
     */
    private $expediente;

    /**
     * @var string
     *
     * @ORM\Column(name="paterno", type="string", length=255)
     */
    private $paterno;

    /**
     * @var string
     *
     * @ORM\Column(name="materno", type="string", length=255)
     */
    private $materno;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

   /**
    * @ORM\OneToMany(targetEntity="Hospital\PacienteBundle\Entity\Ingreso", mappedBy="paciente", cascade = {"persist", "remove"})    
    */
    private $ingresos;

    public function __construct()
    {
        $this->ingresos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getExpediente();
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
     * Set expediente
     *
     * @param string $expediente
     * @return Paciente
     */
    public function setExpediente($expediente)
    {
        $this->expediente = $expediente;
    
        return $this;
    }

    /**
     * Get expediente
     *
     * @return string 
     */
    public function getExpediente()
    {
        return $this->expediente;
    }

    /**
     * Set paterno
     *
     * @param string $paterno
     * @return Paciente
     */
    public function setPaterno($paterno)
    {
        $this->paterno = $paterno;
    
        return $this;
    }

    /**
     * Get paterno
     *
     * @return string 
     */
    public function getPaterno()
    {
        return $this->paterno;
    }

    /**
     * Set materno
     *
     * @param string $materno
     * @return Paciente
     */
    public function setMaterno($materno)
    {
        $this->materno = $materno;
    
        return $this;
    }

    /**
     * Get materno
     *
     * @return string 
     */
    public function getMaterno()
    {
        return $this->materno;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Paciente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set ingreso
     *
     * @param TrabSoc\Pacientebundle\Entity\Ingreso $ingreso
     * @return Paciente
     */
    public function setIngresos(\Doctrine\Common\Collections\Collection $ingresos)
    {
        $this->ingresos = $ingresos;
        foreach ($ingresos as $ingreso) {
            $ingreso->setPaciente($this);
        }
    }

    /**
     * Get ingreso
     *
     * @return text 
     */
    public function getIngresos()
    {
        return $this->ingresos;
    }    
}
