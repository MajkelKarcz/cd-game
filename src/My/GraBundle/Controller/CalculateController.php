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
     * @Route("/game/play/{nick}/calculate")
     * 
     */
class CalculateController extends Controller 
{
    /**
     * @Route("/new",name="url_calculate")
     * 
     */
    public function newAction($nick)
    {
        
        $heroes = $this->getDoctrine()->getRepository('MyGraBundle:Heroes2')->findOneByName($nick);
        $heroesstamina = $heroes->getStamina();
        if($heroesstamina < 100){
            $now = new \DateTime();
            $heroestime = $heroes->getTimestamp();
            $diff = $now->diff($heroestime)->s;
            $heroesstamina += $diff;
            if($heroesstamina>100)$heroesstamina = 100;
            $heroes->setStamina($heroesstamina);
            $dm = $this->getDoctrine()->getManager();
            $dm->persist($heroes);
            $dm->flush();
        
        }
        return $this->render('Calculate.html.twig');
    }
}
