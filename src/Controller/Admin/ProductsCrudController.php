<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
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
        TextField::new('name', 'Nom'),
        SlugField::new('slug')
          ->setTargetFieldName('name')
          ->hideOnIndex(),
        TextEditorField::new('description', 'Description'),
        MoneyField::new('price', 'Prix')
          ->setCurrency('EUR'),
        IntegerField::new('stock'),
        AssociationField::new('categories', 'Catégorie du produit'),
        CollectionField::new('images')
          ->allowDelete(true)
          ->renderExpanded()
          ->setEntryIsComplex()
          ->useEntryCrudForm(ImagesCrudController::class),
        DateTimeField::new('createdAt', 'Date de création')
          ->hideOnForm()
      ];
    }
    
}
