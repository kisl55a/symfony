<?php

namespace App\Controller;
use App\Entity\Dima;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Contriller;
use Symfony\Component\HttpFoundation\Response;

class DimaController extends AbstractController
{
    /**
     * @Route("/dima", name="dima")
     */
    public function index()
    {
        $articles = $this->getDoctrine()->getRepository
        (Dima::class)->findAll();
        return $this->render('dima/index.html.twig',  
    array( 'articles' => $articles)
    );
    }
     /**
      * @Route("/show/{id}", name="dima_show")
      */
      public function show($id){
          $article = $this->getDoctrine()->getRepository
          (Dima::class)->find($id);

          return $this->render('dima/show.html.twig',array('article' => $article));
      }
    // /**
    //  * @Route("/article/save")
    //  */
    // public function save() {
    //       $entityManager = $this->getDoctrine()->getManager();
    //       $article = new Dima();
    //       $article->setTitle('Article Two');
    //       $article->setBody('This is the body for article two');
    //       $entityManager->persist($article);
    //       $entityManager->flush();
    //       return new Response('Saved an article with the id of  '.$article->getId());
    //     }
}
