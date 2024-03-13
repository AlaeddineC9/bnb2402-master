<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'All Users')
            ->setEntityLabelInSingular('User')
            ->setEntityLabelInPlural('Users')
            ->setSearchFields(['name'])
            ->setDefaultSort(['id' => 'DESC'])
            ;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ;
    }

 
    public function configureFields(string $pageName): iterable
    {
       return [
            FormField::addPanel('User Information'),
            TextField::new('firstname')
                ->setLabel('👤 First Name')
                ->setHelp('Set the first name of the user'),
            TextField::new('lastname')
                ->setLabel('👤 Last Name')
                ->setHelp('Set the last name of the user'),
                TextField::new('addresse')
                ->setLabel(' Address')
                ->setHelp('Set the address of the user'),
                IntegerField::new('rating')
                ->setLabel('rating')
                ->setHelp('How many rating do you give?'),
            TextField::new('phone')
                ->setLabel('phone')
                ->setHelp('Set the phone number')
                    ->hideOnIndex(),
                    TextField::new('city')
                ->setLabel('City')
                ->setHelp('Set the city of the user'),
                TextField::new('country')
                ->setLabel('country')
                ->setHelp('Set the country of the user'),

           
           
           
        ];
    
    }
  
}
