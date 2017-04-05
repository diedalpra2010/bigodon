<?php

namespace BigodonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $servicos = $em->getRepository('BigodonBundle:Servico')
                ->findby(array(),array('nome'=> 'ASC'));
        
       
         $dtinicio =  new \DateTime("+1 day");
         $interval = new \DateInterval("P1D");
         $dtFim =  new \DateTime("+11 day");
        
         $periodo = new \DatePeriod($dtinicio, $interval,$dtFim);
         
         
        
        return $this->render('BigodonBundle:Default:index.html.twig', array(
            'servicos' => $servicos,
            'datas' => $periodo
        ));
    }
    /**
     * @Route("/profissionais")
     */
    public function profissionaisAction(Request $request)
    {
        $idServico = $request->get("servico");
         $em = $this->getDoctrine()->getManager();
         
          $barbeiro = $em->getRepository('BigodonBundle:Barbeiro')
                ->findby(array("servico" => $idServico), array('nome'=> 'ASC'));
        
          //Forma direta de acessar as informações
          //foreach($barbeiro as $barb)
          //{
          //$novo["nome"] = $barb->Nome();
          //$novo[] = $_novo;
          //}
       return $this->json($barbeiro); //forma via classes
    }
     /**
     * @Route("/horarios")
     */
    public function horariosAction(Request $request)
    {
        $dtSelecionada = $request->get('dia');
        
         $dtinicio = new \DateTime($dtSelecionada);
         $dtinicio->setTime(9,0,0);
         $dtFim    = new \DateTime($dtSelecionada);
         $dtFim->setTime(18,0,0);
         $interval = new \DateInterval("PT30M");
         $periodo  = new \DatePeriod($dtinicio, $interval,$dtFim);
         
         foreach ($periodo as $dia)
         {
             $dias["hora"] = $dia->format('H:i');
             $dias['disponivel'] =TRUE;
             $listaHorarios[] = $dias;
         }
        return $this->json($listaHorarios); //forma via classes
    }
}
