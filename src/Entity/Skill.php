<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $skillName;

    /**
     * @ORM\Column(type="integer")
     */
    private $expCost;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $skillType;

    /**
     * @ORM\Column(type="integer")
     */
    private $staminaConsumption;

    /**
     * @ORM\Column(type="integer")
     */
    private $essenceConsumption;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fatigue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=PlayerCharacter::class, mappedBy="learnedSkills")
     */
    private $playerCharacters;

    public function __construct()
    {
        $this->playerCharacters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkillName(): ?string
    {
        return $this->skillName;
    }

    public function setSkillName(string $skillName): self
    {
        $this->skillName = $skillName;

        return $this;
    }

    public function getExpCost(): ?int
    {
        return $this->expCost;
    }

    public function setExpCost(int $expCost): self
    {
        $this->expCost = $expCost;

        return $this;
    }

    public function getSkillType(): ?string
    {
        return $this->skillType;
    }

    public function setSkillType(string $skillType): self
    {
        $this->skillType = $skillType;

        return $this;
    }

    public function getStaminaConsumption(): ?int
    {
        return $this->staminaConsumption;
    }

    public function setStaminaConsumption(int $staminaConsumption): self
    {
        $this->staminaConsumption = $staminaConsumption;

        return $this;
    }

    public function getEssenceConsumption(): ?int
    {
        return $this->essenceConsumption;
    }

    public function setEssenceConsumption(int $essenceConsumption): self
    {
        $this->essenceConsumption = $essenceConsumption;

        return $this;
    }

    public function getFatigue(): ?int
    {
        return $this->fatigue;
    }

    public function setFatigue(?int $fatigue): self
    {
        $this->fatigue = $fatigue;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|PlayerCharacter[]
     */
    public function getPlayerCharacters(): Collection
    {
        return $this->playerCharacters;
    }

    public function addPlayerCharacter(PlayerCharacter $playerCharacter): self
    {
        if (!$this->playerCharacters->contains($playerCharacter)) {
            $this->playerCharacters[] = $playerCharacter;
            $playerCharacter->addLearnedSkill($this);
        }

        return $this;
    }

    public function removePlayerCharacter(PlayerCharacter $playerCharacter): self
    {
        if ($this->playerCharacters->removeElement($playerCharacter)) {
            $playerCharacter->removeLearnedSkill($this);
        }

        return $this;
    }
}
