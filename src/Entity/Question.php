<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $parentGameId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ennonce;

    /**
     * @ORM\Column(type="string", length=1023)
     */
    private $urlImage;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $difficulty;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Reponse", mappedBy="parentQuestion", cascade={"persist", "remove"})
     */
    private $reponses;

    public function __construct()
    {
        $this->loadAnswers();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnnonce(): ?string
    {
        return $this->ennonce;
    }

    public function setEnnonce(string $ennonce): self
    {
        $this->ennonce = $ennonce;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }

    public function setUrlImage(string $urlImage): self
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getReponses()
    {
        return $this->reponses;
    }

    public function setReponses($r): self
    {
        $this->reponses = $r;

        return $this;
    }

    public function getParentGameId()
    {
        return $this->parentGameId;
    }

    public function setParentGameId($parentGameId)
    {
        $this->parentGameId = $parentGameId;

        return $this;
    }

    private function loadAnswers()
    {
    }
}
