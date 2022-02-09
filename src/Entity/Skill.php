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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=PlayerCharacter::class, mappedBy="learnedSkills")
     */
    private $playerCharacters;

    /**
     * @ORM\Column(type="integer")
     */
    private $staminaFatigue;

    /**
     * @ORM\Column(type="integer")
     */
    private $essenceFatigue;

    /**
     * @ORM\Column(type="integer")
     */
    private $hpFatigue;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $skillFamily;

    /**
     * @ORM\Column(type="integer")
     */
    private $skillLevel;

    /**
     * @ORM\Column(type="integer")
     */
    private $hpConsumption;

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

    public function getStaminaFatigue(): ?int
    {
        return $this->staminaFatigue;
    }

    public function setStaminaFatigue(int $staminaFatigue): self
    {
        $this->staminaFatigue = $staminaFatigue;

        return $this;
    }

    public function getEssenceFatigue(): ?int
    {
        return $this->essenceFatigue;
    }

    public function setEssenceFatigue(int $essenceFatigue): self
    {
        $this->essenceFatigue = $essenceFatigue;

        return $this;
    }

    public function getHpFatigue(): ?int
    {
        return $this->hpFatigue;
    }

    public function setHpFatigue(int $hpFatigue): self
    {
        $this->hpFatigue = $hpFatigue;

        return $this;
    }

    public function getSkillFamily(): ?string
    {
        return $this->skillFamily;
    }

    public function setSkillFamily(string $skillFamily): self
    {
        $this->skillFamily = $skillFamily;

        return $this;
    }

    public function getSkillLevel(): ?int
    {
        return $this->skillLevel;
    }

    public function setSkillLevel(int $skillLevel): self
    {
        $this->skillLevel = $skillLevel;

        return $this;
    }

    public function getHpConsumption(): ?int
    {
        return $this->hpConsumption;
    }

    public function setHpConsumption(int $hpConsumption): self
    {
        $this->hpConsumption = $hpConsumption;

        return $this;
    }
}
