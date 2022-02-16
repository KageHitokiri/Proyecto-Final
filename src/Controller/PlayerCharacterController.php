<?php

namespace App\Controller;

use App\Entity\PlayerCharacter;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Serializer;

class PlayerCharacterController extends AbstractController
{
    private $doc;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doc = $doctrine;            
    }

    /**
     * @Route("/player/create", name="player_character")
     */
    public function createCharacter(): Response
    {        
        $player = new PlayerCharacter();        
        $this->test($player);

        return new Response($player->getId());        
    }

    /**
     * @Route("/player/update/{id}", name="updatePlayer")
     **/
    public function updatePlayer(ManagerRegistry $doc, $id) {
        $repo = $doc->getRepository(PlayerCharacter::class);
        $player = $repo->find($id);
        $this->test($player);

        return new Response($id);
    }

    public function test($player){
        $json = file_get_contents('php://input');        
        $playerData = json_decode($json, false);

        $player->setCharacterName($playerData->name);
        $player->setRace($playerData->race);
        $player->setDamage($playerData->damage);
        $player->setMaxHp($playerData->maxHp);
        $player->setHp($playerData->hp);
        $player->setMaxStamina($playerData->maxStamina);
        $player->setStamina($playerData->stamina);
        $player->setMaxEssence($playerData->maxEssence);
        $player->setEssence($playerData->essence);
        $player->setExp($playerData->exp);            
        $player->setGold($playerData->gold);
        $player->setPotionCounter($playerData->potionCounter);
        $player->setWeapon($playerData->weapon);

        $player->insertPlayer($this->doc);
    }
    public function jsonSerialize($player)
    {
        return array(
            'id' => $player->getId(),
            'race' => $player->getRace(),
            'name' => $player->getCharacterName(),
            'damage' => $player->getDamage(),
            'maxHp' => $player->getMaxHp(),
            'hp' => $player->getHp(),
            'maxStamina' => $player->getMaxStamina(),
            'stamina' => $player->getStamina(),
            'maxEssence' => $player->getMaxEssence(),
            'essence' => $player->getEssence(),
            'exp' => $player->getExp(),
            'gold' => $player->getGold(),
            'potionCounter' => $player->getPotionCounter(),
            'weapon' => $player->getWeapon(),            
        );
    }
    /**
     * @Route("/player/search/{id}", name="searchPlayer")
     **/
    public function playerFind(ManagerRegistry $doc, $id) {
        $repo = $doc->getRepository(PlayerCharacter::class);
        $player = $repo->find($id);
        $object = json_encode($this->jsonSerialize($player));        

        return new Response($object);
    }

    /**
     * @Route("/player/user/{id}", name="searchByUser")
     **/
    public function findByUser(ManagerRegistry $doc, $id) {
        
        $characters = $this->getUser()->getPlayerCharacters();

        foreach ($characters as $character){
            echo $character->getId();
        }
        exit;

        return new Response($characters);
    }
    
}
