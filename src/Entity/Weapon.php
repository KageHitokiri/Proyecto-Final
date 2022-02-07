<?php

namespace App\Entity;

use App\Repository\WeaponRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ORM\Entity(repositoryClass=WeaponRepository::class)
 */
class Weapon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $weaponName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $weaponType;

    /**
     * @ORM\Column(type="integer")
     */
    private $minDamage;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxDamage;

    /**
     * @ORM\Column(type="integer")
     */
    private $staminaConsumption;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeaponName(): ?string
    {
        return $this->weaponName;
    }

    public function setWeaponName(string $weaponName): self
    {
        $this->weaponName = $weaponName;

        return $this;
    }

    public function getWeaponType(): ?string
    {
        return $this->weaponType;
    }

    public function setWeaponType(string $weaponType): self
    {
        $this->weaponType = $weaponType;

        return $this;
    }

    public function getMinDamage(): ?int
    {
        return $this->minDamage;
    }

    public function setMinDamage(int $minDamage): self
    {
        $this->minDamage = $minDamage;

        return $this;
    }

    public function getMaxDamage(): ?int
    {
        return $this->maxDamage;
    }

    public function setMaxDamage(int $maxDamage): self
    {
        $this->maxDamage = $maxDamage;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function insertWeapon(ManagerRegistry $doc) {
        $em = $doc->getManager();
        foreach($this->weapons as $w) {            
            $weapon = new Weapon();
            $weapon->setWeaponName($w["weapon_name"]);
            $weapon->setWeaponType($w["weapon_type"]);
            $weapon->setMinDamage($w["min_damage"]);
            $weapon->setMaxDamage($w["max_damage"]);
            $weapon->setStaminaConsumption($w["stamina_consumption"]);
            $weapon->setDescription($w["description"]);            

            $em->persist($weapon);

            try {
                $em->flush();
                return new Response("Se han salvado los datos correctamente");
            } catch(\Exception $e) {
                return new Response("Error al guardar los datos");
            }
        }
    }
}
