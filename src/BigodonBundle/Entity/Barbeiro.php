<?php

namespace BigodonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BigodonBundle\Entity\Servico;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="barbeiro")
 */
class Barbeiro 
{
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
   private $id;
   /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="O nome e Obrigatório.") 
     */
   private $nome;
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Servico")
     * @ORM\JoinColumn(name="servicos_id", referencedColumnName="id")
     * @Assert\NotBlank(message="O serviço e Obrigatório.")
     */
   private $servico;
   /**
     * @ORM\Column(type="string", length=15, nullable=TRUE)
     * @Assert\Regex(pattern="/\([0-9].\)[9]{0,1}[0-9]{4}-[0-9]{4}/",
    *       message="O telefone e invalido, informe no formato (99)99999-9999")
     */
   private $telefone;
   /**
     * @ORM\Column(type="string", length=1)
     * @Assert\NotBlank(message="O sexo e Obrigatório.")
     */
   private $sexo;
   
   /**
    * @ORM\Column(type="date")
    * @Assert\GreaterThanOrEqual(value="1950-1-1", 
    *           message="A data informada esta invalida, informa algo maior que {{ compared_value }}")
    */
   private $dataNascimento;
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
     * @return Barbeiro
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
     * @return Barbeiro
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
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Barbeiro
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set dataNascimento
     *
     * @param \DateTime $dataNascimento
     *
     * @return Barbeiro
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get dataNascimento
     *
     * @return \DateTime
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set servico
     *
     * @param \BigodonBundle\Entity\Servico $servico
     *
     * @return Barbeiro
     */
    public function setServico(Servico $servico = null)
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
}
