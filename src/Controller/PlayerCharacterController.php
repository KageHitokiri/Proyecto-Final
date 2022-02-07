<?php

namespace App\Controller;

use App\Entity\PlayerCharacter;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
    public function createCharacter(Request $request): Response
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

        $player->insertPlayer($this->doc);
    }
}
