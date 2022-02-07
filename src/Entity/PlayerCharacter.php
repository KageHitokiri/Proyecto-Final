<?php

namespace App\Entity;

use App\Repository\PlayerCharacterRepository;
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
    
    public function insertPlayer(ManagerRegistry $doc) {
        $em = $doc->getManager();
        foreach($this->players as $p) {
            $player = new PlayerCharacter();
            $player->setCharacterName($p["character_name"]);
            $player->setDamage($p["damage"]);
            $player->setMaxHp($p["max_hp"]);
            $player->setHp($p["hp"]);
            $player->setMaxStamina($p["max_stamina"]);
            $player->setStamina($p["stamina"]);
            $player->setMaxEssence($p["max_essence"]);
            $player->setEssence($p["essence"]);
            $player->setExp($p["exp"]);            
            $player->setGold($p["gold"]);
            $player->setPotionCounter($p["potion_counter"]);

            $em->persist($player);

            try {
                $em->flush();
                return new Response("Se han salvado los datos correctamente");
            } catch(\Exception $e) {
                return new Response("Error al guardar los datos");
            }
        }
    }

}
