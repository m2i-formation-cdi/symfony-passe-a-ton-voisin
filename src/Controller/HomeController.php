<?php

namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return Response
     */
    public function indexAction(LoggerInterface $logger, AdapterInterface $cache){

        //Récupération de la liste de tous les messages
        $messageList = $cache->getItem('m');

        if(! $messageList->isHit()){
            $messageRepository = $this->getDoctrine()->getRepository("App:Message");
            $data = $messageRepository->findBy([],["closed" =>"DESC"]);

            $messageList->set($data);
            $cache->save($messageList);
        }

        dump($messageList);

        $logger->info("Je suis passé par la maison",[self::class]);
        return $this->render("home/index.html.twig", ["messageList"=> $messageList]);
    }

}