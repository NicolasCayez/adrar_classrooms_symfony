<?php

namespace App\Controller\Admin;

use App\Entity\Chapitres;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ChapitresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chapitres::class;
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
        yield IdField::new('ID')->hideWhenCreating();

        yield TextField::new('Id_Cours'); // A changer
        
        yield TextField::new('Titre');
        yield TextField::new('Contenu');
        yield NumberField::new('Position');
    }
}
