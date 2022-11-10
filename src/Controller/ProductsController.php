<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/produits', name: 'products_')]
class ProductsController extends AbstractController
{
   #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig');
    }
    
    #[Route('/{slug}', name: 'detail')]
    public function detail(Products $products): Response
    {
      return $this->render('products/index.html.twig', [
        'product' => $products
      ]);
    }
}
