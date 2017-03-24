<?php

namespace BigodonBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PainelController extends Controller
{
    /**
     * @Route("/Painel")
     */
    public function indexAction() 
    {
        return $this->render('BigodonBundle:Painel:index.html.twig');
    }
}
