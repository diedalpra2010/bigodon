<?php

namespace BigodonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="agendamento")
 */
class Agendamento 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Servico")
     * @ORM\JoinColumn(name="servicos_id", referencedColumnName="id")
     */
    private $servico;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Barbeiro")
     * @ORM\JoinColumn(name="barbeiro_id", referencedColumnName="id")
     */
    private $barbeiro;
    
    /*
     * @ORM\Column(type="datetime")
     */
    private $horario;
    
     /**
     * @ORM\Column(type="string", length=100)
     */
    private $nome;
    
     /**
     * @ORM\Column(type="string", length=15)
     */
    private $telefone;
    
    /**
     * @ORM\Column(type="string", length=100, nullable=TRUE)
     */
    private $email;
    
    /*
     * @ORM\Column(type="datetime")
     */
    private $dataCadastro;
    
    /*
     * @ORM\Column(type="datetime")
     */
    private $dataAlteracao;
    
    /*
     * @ORM\Column(type="string", length=30)
     */
    private $status;

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
     * Set nome
     *
     * @param string $nome
     *
     * @return Agendamento
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Agendamento
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Agendamento
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set servico
     *
     * @param \BigodonBundle\Entity\Servico $servico
     *
     * @return Agendamento
     */
    public function setServico(\BigodonBundle\Entity\Servico $servico = null)
    {
        $this->servico = $servico;

        return $this;
    }

    /**
     * Get servico
     *
     * @return \BigodonBundle\Entity\Servico
     */
    public function getServico()
    {
        return $this->servico;
    }

    /**
     * Set barbeiro
     *
     * @param \BigodonBundle\Entity\Barbeiro $barbeiro
     *
     * @return Agendamento
     */
    public function setBarbeiro(\BigodonBundle\Entity\Barbeiro $barbeiro = null)
    {
        $this->barbeiro = $barbeiro;

        return $this;
    }

    /**
     * Get barbeiro
     *
     * @return \BigodonBundle\Entity\Barbeiro
     */
    public function getBarbeiro()
    {
        return $this->barbeiro;
    }
}
