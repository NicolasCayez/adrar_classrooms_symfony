<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('ID')->hideOnForm();
        yield TextField::new('Email');
        yield TextField::new('Nom');
        yield TextField::new('Prenom');
        yield ChoiceField::new('Roles')->allowMultipleChoices()->setChoices(['USER' => 'ROLE_USER','ADMIN' => 'ROLE_ADMIN','TATAYOYOOO' => 'TATAYOYO']);
        yield TextField::new('Image');
        yield TextField::new('Password');
    }
}
