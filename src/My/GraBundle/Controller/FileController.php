<?php

namespace My\GraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use My\GraBundle\Entity\Items2;
use Symfony\Component\HttpFoundation\Request;
use My\GraBundle\Form\Type\ItemType;
use My\GraBundle\Entity\Document;



    /**
     * @Route("/file")
     * 
     */
class FileController extends Controller 
{
    /**
     * @Route("/upload", name = "url_upload")
     * 
     */
    public function uploadAction(Request $request)
{
    $document = new Document();
    $form = $this->createFormBuilder($document)
        ->add('name')
        ->add('file')
        ->getForm();

    $form->handleRequest($request);

    if ($form->isValid()) {
         $em = $this->getDoctrine()->getManager();

    $em->persist($document);
    $em->flush();

    //return $this->redirectToRoute(...);
    }

    return $this->render('upload.html.twig', array('form' => $form->createView()));
}
}

