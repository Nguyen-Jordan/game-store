<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }
    
    public function configureCrud(Crud $crud): Crud
    {
      return $crud
        ->setEntityLabelInPlural('Utilisateurs')
        ->setEntityLabelInSingular('Utilisateur')
        
        ->setPageTitle("index", "Game Store - Administration des utilisateurs")
        ->setDateTimeFormat('short', 'short')
        
        ->setPaginatorPageSize(10);
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
          IdField::new('id')
          ->hideOnForm(),
          ArrayField::new('roles')
            ->hideOnIndex(),
          TextField::new('Firstname'),
          TextField::new('Lastname'),
          TextField::new('email')
            ->hideOnForm(),
          TextField::new('address'),
          TextField::new('zipcode'),
          TextField::new('city'),
          DateTimeField::new('createdAt')
            ->hideOnForm()
        ];
    }
}
