<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {

        if ($this->getUser()) {
            // if logged in, $usernames will be the username
            $usernames = $this->getUser()->getUsername();
        } else {
            // if not logged in, $usernames will be null
            $usernames = null;
            return $this->redirectToRoute('app_login');
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'usernames' => $usernames,
        ]);
    }
}
