<?php

namespace App\Controller;
use App\Entity\Dima;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Contriller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
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
    array('articles' => $articles)
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
       /**
     * @Route("/new", name="new_article")
     * Method({"GET","POST"})
     */
    public function new(Request $request) {
        $article = new Dima();
        $form = $this->createFormBuilder($article)
        ->add('title',TextType:: class, array('attr' =>
         array('class' => 'form-control')))
        ->add('body', TextareaType::class, array('required' => false,
        'attr' => array('class' => 'form-control')
        ))
        ->add('save',SubmitType::class, array(
            'label' => 'Create',
            'attr' => array('class' => 'btn btn-rtimary mt-3')
        ))
        ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('dima');
        }
        return $this->render('dima/new.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/dima/delete/{id}")
     *  Method({"DELETE"})
     */
    public function delete(Request $request, $id){
        $article = $this->getDoctrine()->getRepository
        (Dima::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        return $this->redirectToRoute('dima');
    }
    /**
      * @Route("/edit/{id}", name="edit")
      */
    public function edit(Request $request, $id) {
        $article = new Dima();
        $article = $this->getDoctrine()->getRepository
        (Dima::class)->find($id);
        $form = $this->createFormBuilder($article)
        ->add('title',TextType:: class, array('attr' =>
         array('class' => 'form-control')))
        ->add('body', TextareaType::class, array('required' => false,
        'attr' => array('class' => 'form-control')
        ))
        ->add('save',SubmitType::class, array(
            'label' => 'Create',
            'attr' => array('class' => 'btn btn-rtimary mt-3')
        ))
        ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) { 
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('dima');
        }
        return $this->render('dima/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
