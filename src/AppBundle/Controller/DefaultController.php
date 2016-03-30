<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Category;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AppBundle:Category')->findAll();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'categories' => $category
        ]);
    }
    
    /**
     * @Route("/category/new")
     */
    public function newAction()
    {
        $category = new Category();
        $category->setName('newcatogory');
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();
        
        $data = [
            'message' => 'NEW DATA SUCCESS ADD'
        ];
            
        return new JsonResponse($data);
    }
    
    /**
     * @Route("/category/{category}", name="category")
     */
    public function categoryAction($category = "")
    {
        $data = [
            'category' => $category
        ];
            
        return new JsonResponse($data);
    }
}
