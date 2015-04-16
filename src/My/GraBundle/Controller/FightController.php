<?php

namespace My\GraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\GraBundle\Entity\Items2;
use My\GraBundle\Entity\Heroes2;
use My\GraBundle\Entity\Monsters;
use Symfony\Component\HttpFoundation\Request;
use My\GraBundle\Form\Type\ItemType;


    /**
     * @Route("/game/play/{nick}/fight")
     * 
     */
class FightController extends Controller 
{
    /**
     * @Route("/new",name="url_fight")
     * 
     */
    public function newAction($nick)
    {
        $heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        if($heroes === NULL){}//jak nie istnieje taki to najpierw stworz
        $currentherostamina=$heroes->getStamina();
        $monster=$this->getDoctrine()->getRepository('MyGraBundle:Monsters')->findOneById('1');
        $monsterstamina= $monster->getReqStamina();
        $monstername = $monster->getName();
        if($currentherostamina >= $monsterstamina){
            if($currentherostamina === 100){
                $heroes->setTimestamp(new \DateTime());
            }
            $currentherostamina -= $monsterstamina;
            $heroes->setStamina($currentherostamina);
            $currentheroexp = $heroes->getExp();
            $monsterexp = $monster->getExp();
            $currentheroexp += $monsterexp;
            $heroes->setExp($currentheroexp);
            $monsteritem = $monster->getItem();
            $gainitem = $this->getDoctrine()->getRepository('MyGraBundle:Items2')->findOneById($monsteritem);            
            $heroes->setItemtemp($gainitem);
            $gold = $heroes->getGold();
            $gold += $monsterstamina * 10;
            $heroes->setGold($gold);
            $dm = $this->getDoctrine()->getManager();
            $dm->persist($heroes);
            $dm->flush();
            return $this->render('Fight.html.twig', array('monstername'=>$monstername));
        }
        return $this->render('Fighterror.html.twig');
        
    }
    
}
