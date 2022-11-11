<?php

namespace App\Controller\Admin;

use App\Entity\Coupons;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CouponsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Coupons::class;
    }
  
    public function configureCrud(Crud $crud): Crud
    {
      return $crud
        ->setEntityLabelInPlural('Coupons')
        ->setEntityLabelInSingular('Coupon')
        
        ->setPageTitle("index", "Game Store - Administration des coupon")
        ->setDateTimeFormat('short', 'short')
        
        ->setPaginatorPageSize(10);
    }
    
    public function configureFields(string $pageName): iterable
    {
      return [
        IdField::new('id')
          ->hideOnForm(),
        TextField::new('code'),
        TextEditorField::new('description'),
        IntegerField::new('discount', 'Remise'),
        IntegerField::new('max_usage', 'Nombre maximum d\'utilisation'),
        DateTimeField::new('validity', 'Date de validité'),
        BooleanField::new('is_valid', 'Actif'),
        AssociationField::new('coupons_types', 'Type de coupon'),
        DateTimeField::new('created_at', 'Date de création')
        ->hideOnForm(),
      ];
    }
}
