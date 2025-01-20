<?php

namespace App\Controller\Admin;

use App\Entity\Chapitres;
use App\Entity\Cours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;

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

        yield AssociationField::new('id_cours')
            ->onlyOnForms()
            ->setLabel('Langages du cours')
            ->setQueryBuilder(
                fn(ORMQueryBuilder $queryBuilder) => $queryBuilder->getEntityManager()->getRepository(Cours::class)->findAll()
            );
        
        yield TextField::new('Titre');
        yield TextEditorField::new('Contenu');
        yield NumberField::new('Position');
    }
}
