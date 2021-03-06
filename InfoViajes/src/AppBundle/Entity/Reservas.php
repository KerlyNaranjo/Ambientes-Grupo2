<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservas
 *
 * @ORM\Table(name="reservas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservasRepository")
 */
class Reservas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_asiento", type="integer")
     */
    private $numeroAsiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_reserva", type="date")
     */
    private $fechaReserva;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reservas")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="Horario", inversedBy="reservas")
     * @ORM\JoinColumn(name="horario_id", referencedColumnName="id")
     */
    private $horario;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numeroAsiento
     *
     * @param integer $numeroAsiento
     *
     * @return Reservas
     */
    public function setNumeroAsiento($numeroAsiento)
    {
        $this->numeroAsiento = $numeroAsiento;

        return $this;
    }

    /**
     * Get numeroAsiento
     *
     * @return int
     */
    public function getNumeroAsiento()
    {
        return $this->numeroAsiento;
    }

    /**
     * Set fechaReserva
     *
     * @param \DateTime $fechaReserva
     *
     * @return Reservas
     */
    public function setFechaReserva($fechaReserva)
    {
        $this->fechaReserva = $fechaReserva;

        return $this;
    }

    /**
     * Get fechaReserva
     *
     * @return \DateTime
     */
    public function getFechaReserva()
    {
        return $this->fechaReserva;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Reservas
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set horario
     *
     * @param \AppBundle\Entity\Horario $horario
     *
     * @return Reservas
     */
    public function setHorario(\AppBundle\Entity\Horario $horario = null)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get horario
     *
     * @return \AppBundle\Entity\Horario
     */
    public function getHorario()
    {
        return $this->horario;
    }
}
