<?php

namespace App\Controller;

use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontHomeController extends AbstractController
{
    #[Route('/', name: 'app_front')]
    #[Route('/home', name: 'app_front_home')]

    public function index(HomeRepository $homeRepository): Response
    {
        $content = $homeRepository->findOneBy(['isActive' => true ]);
        return $this->render('front_home/index.html.twig', [
            'controller_name' => 'FrontHomeController',
            'contenu' => $content,
        ]);
    }
}
