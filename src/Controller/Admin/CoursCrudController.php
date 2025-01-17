<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use App\Entity\Niveaux;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cours::class;
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
        yield TextField::new('Titre');
        yield TextField::new('Synopsis');
        yield AssociationField::new('id_niveau')
            ->setQueryBuilder(
                fn(ORMQueryBuilder $queryBuilder) => $queryBuilder->getEntityManager()->getRepository(Niveaux::class)->findAll()
            );
        yield TextField::new('Temps_Estime');
        yield TextField::new('Image');
        yield DateField::new('Date');
        yield ChoiceField::new('Cree')->setChoices(['OUI' => 1, 'NON' => 0]);
    }
}
