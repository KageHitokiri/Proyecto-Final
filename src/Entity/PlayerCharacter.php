<?php

namespace App\Entity;

use App\Repository\PlayerCharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ORM\Entity(repositoryClass=PlayerCharacterRepository::class)
 */
class PlayerCharacter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $characterName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $race;

    /**
     * @ORM\Column(type="integer")
     */
    private $damage;

    /**
     *  @ORM\Column(type="integer")
     */
    private $maxHp;

    /**
     * @ORM\Column(type="integer")
     */
    private $hp;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxStamina;

    /**
     * @ORM\Column(type="integer")
     */
    private $stamina;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxEssence;

    /**
     * @ORM\Column(type="integer")
     */
    private $essence;

    /**
     * @ORM\Column(type="integer")
     */
    private $exp;

    /**
     * @ORM\Column(type="integer")
     */
    private $gold;

    /**
     * @ORM\Column(type="integer")
     */
    private $potionCounter;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $weapon;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class, inversedBy="playerCharacters")
     */
    private $learnedSkills;

    /**
     * @ORM\ManyToMany(targetEntity=Quest::class, inversedBy="playerCharacters")
     */
    private $questDone;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="playerCharacters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->learnedSkills = new ArrayCollection();
        $this->questDone = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?string
    {
        return $this->characterName;
    }

    public function setCharacterName(string $characterName): self
    {
        $this->characterName = $characterName;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): self
    {
        $this->damage = $damage;

        return $this;
    }

    public function getMaxHp(): ?string
    {
        return $this->maxHp;
    }

    public function setMaxHp(string $maxHp): self
    {
        $this->maxHp = $maxHp;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getMaxStamina(): ?int
    {
        return $this->maxStamina;
    }

    public function setMaxStamina(int $maxStamina): self
    {
        $this->maxStamina = $maxStamina;

        return $this;
    }

    public function getStamina(): ?int
    {
        return $this->stamina;
    }

    public function setStamina(int $stamina): self
    {
        $this->stamina = $stamina;

        return $this;
    }

    public function getMaxEssence(): ?int
    {
        return $this->maxEssence;
    }

    public function setMaxEssence(int $maxEssence): self
    {
        $this->maxEssence = $maxEssence;

        return $this;
    }

    public function getEssence(): ?int
    {
        return $this->essence;
    }

    public function setEssence(int $essence): self
    {
        $this->essence = $essence;

        return $this;
    }

    public function getExp(): ?int
    {
        return $this->exp;
    }

    public function setExp(int $exp): self
    {
        $this->exp = $exp;

        return $this;
    }

    public function getGold(): ?int
    {
        return $this->gold;
    }

    public function setGold(int $gold): self
    {
        $this->gold = $gold;

        return $this;
    }

    public function getPotionCounter(): ?int
    {
        return $this->potionCounter;
    }

    public function setPotionCounter(int $potionCounter): self
    {
        $this->potionCounter = $potionCounter;

        return $this;
    }

    public function getWeapon(): ?string
    {
        return $this->weapon;
    }

    public function setWeapon(?string $weapon): self
    {
        $this->weapon = $weapon;

        return $this;
    }
    
    public function insertPlayer(ManagerRegistry $doc) {
        $em = $doc->getManager();
        $em->persist($this);

            try {
                $em->flush();
                return new Response("Se han salvado los datos correctamente");
            } catch(\Exception $e) {
                return new Response("Error al guardar los datos");
            }        
    }

    /**
     * @return Collection|Skill[]
     */
    public function getLearnedSkills(): Collection
    {
        return $this->learnedSkills;
    }

    public function addLearnedSkill(Skill $learnedSkill): self
    {
        if (!$this->learnedSkills->contains($learnedSkill)) {
            $this->learnedSkills[] = $learnedSkill;
        }

        return $this;
    }

    public function removeLearnedSkill(Skill $learnedSkill): self
    {
        $this->learnedSkills->removeElement($learnedSkill);

        return $this;
    }

    /**
     * @return Collection|Quest[]
     */
    public function getQuestDone(): Collection
    {
        return $this->questDone;
    }

    public function addQuestDone(Quest $questDone): self
    {
        if (!$this->questDone->contains($questDone)) {
            $this->questDone[] = $questDone;
        }

        return $this;
    }

    public function removeQuestDone(Quest $questDone): self
    {
        $this->questDone->removeElement($questDone);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
