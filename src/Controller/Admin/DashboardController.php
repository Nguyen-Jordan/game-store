<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\Coupons;
use App\Entity\CouponsTypes;
use App\Entity\Images;
use App\Entity\Products;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Game Store - Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('E-commerce');
  
        yield MenuItem::section('Utilisateurs');
        yield MenuItem::subMenu('Actions', 'fa fa-bars')->setSubItems([
          MenuItem::linkToCrud('Liste des utilisateurs', 'fas fa-user', Users::class)
        ]);
        
        yield MenuItem::section('catégories');
        yield MenuItem::subMenu('Actions', 'fa fa-bars')->setSubItems([
          MenuItem::linkToCrud('Liste des catégories', 'fas fa-eye', Categories::class),
          MenuItem::linkToCrud('Ajouter une catégorie', 'fas fa-plus', Categories::class)->setAction(Crud::PAGE_NEW)
        ]);
    
        yield MenuItem::section('Produits');
        yield MenuItem::subMenu('Actions', 'fa fa-bars')->setSubItems([
          MenuItem::linkToCrud('Liste des produits', 'fas fa-eye', Products::class),
          MenuItem::linkToCrud('Ajouter un produit', 'fas fa-plus', Products::class)->setAction(Crud::PAGE_NEW),
          MenuItem::linkToCrud('Liste des images', 'fas fa-eye', Images::class),
          MenuItem::linkToCrud('Ajouter une image', 'fas fa-plus', Images::class)->setAction(Crud::PAGE_NEW)
        ]);
  
        yield MenuItem::section('Coupons');
        yield MenuItem::subMenu('Actions', 'fa fa-bars')->setSubItems([
          MenuItem::linkToCrud('Liste des coupons', 'fas fa-eye', Coupons::class),
          MenuItem::linkToCrud('Liste des types de coupons', 'fas fa-eye', CouponsTypes::class),
          MenuItem::linkToCrud('Ajouter un coupons', 'fas fa-plus', Coupons::class)->setAction(Crud::PAGE_NEW),
          MenuItem::linkToCrud('Ajouter un type de coupon', 'fas fa-plus', CouponsTypes::class)->setAction(Crud::PAGE_NEW)
        ]);
    }
}
