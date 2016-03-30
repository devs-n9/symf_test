<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('AppBundle:Product')->findAll();
        return $this->render('products/index.html.twig', [
            'products'   => $products
        ]);
    }
    
    /**
     * @Route("/product/create", name="newproduct")
     */
    public function createAction(Request $request)
    {
        if($request->isMethod("POST")){
            
            $name = $request->request->get('name');
            $categoryId = $request->request->get('category');
            $product = new Product();
            $product->setName($name);
            $product->setCategory($categoryId);

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
        }
        
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AppBundle:Category')->findAll();
        return $this->render('products/create.html.twig', [
            'categories' => $category
        ]);
    }
    
    
}
