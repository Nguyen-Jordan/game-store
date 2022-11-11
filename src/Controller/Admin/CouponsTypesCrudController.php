<?php

namespace App\Controller\Admin;

use App\Entity\CouponsTypes;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CouponsTypesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CouponsTypes::class;
    }
  
    public function configureCrud(Crud $crud): Crud
    {
      return $crud
        ->setEntityLabelInPlural('Type des coupons')
        ->setEntityLabelInSingular('type de coupon')
        
        ->setPageTitle("index", "Game Store - Administration de types de coupons.")
        ->setDateTimeFormat('short', 'short')
        
        ->setPaginatorPageSize(10);
    }
    
    public function configureFields(string $pageName): iterable
    {
      return [
        IdField::new('id')
          ->hideOnForm(),
        TextField::new('name', 'Nom de type de coupon'),
      ];
    }
}
