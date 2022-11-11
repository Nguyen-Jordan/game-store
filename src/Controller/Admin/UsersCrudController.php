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
          ArrayField::new('roles', 'Rôle')
            ->hideOnIndex(),
          TextField::new('Firstname', 'Prénom'),
          TextField::new('Lastname', 'Nom'),
          TextField::new('email', 'E-mail')
            ->hideOnForm(),
          TextField::new('address', 'Adresse'),
          TextField::new('zipcode', 'Code postal'),
          TextField::new('city', 'Ville'),
          DateTimeField::new('createdAt', 'Date de création')
            ->hideOnForm()
        ];
    }
}
