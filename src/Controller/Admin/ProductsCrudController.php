<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }
  
    public function configureCrud(Crud $crud): Crud
    {
      return $crud
        ->setEntityLabelInPlural('Produits')
        ->setEntityLabelInSingular('Produit')
        
        ->setPageTitle("index", "Game Store - Administration des produits")
        ->setDateTimeFormat('short', 'short')
        
        ->setPaginatorPageSize(10);
    }
    
    public function configureFields(string $pageName): iterable
    {
      return [
        IdField::new('id')
          ->hideOnForm(),
        TextField::new('name'),
        TextEditorField::new('description'),
        MoneyField::new('price')
          ->setCurrency('EUR'),
        IntegerField::new('stock'),
        AssociationField::new('categories'),
        AssociationField::new('images')
        ->hideOnIndex(),
        DateTimeField::new('createdAt')
          ->hideOnForm()
      ];
    }
    
}
