<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReponseRepository")
 */
class Reponse
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
    private $parent_question_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ennonce;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isCorrect;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentQuestionId(): ?int
    {
        return $this->parent_question_id;
    }

    public function setParentQuestionId(int $parent_question_id): self
    {
        $this->parent_question_id = $parent_question_id;

        return $this;
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

    public function getIsCorrect(): ?bool
    {
        return $this->isCorrect;
    }

    public function setIsCorrect(bool $isCorrect): self
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }
}
