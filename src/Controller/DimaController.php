<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Contriller;

class DimaController extends AbstractController
{
    /**
     * @Route("/dima", name="dima")
     */
    public function index()
    {
        $articles = ['Art1','Art2'];
        return $this->render('dima/index.html.twig',  
    array( 'articles' => $articles)
    );
    }
}
