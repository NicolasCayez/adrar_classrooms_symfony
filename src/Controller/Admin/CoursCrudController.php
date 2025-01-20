<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use App\Entity\Langages;
use App\Entity\Niveaux;
use App\Repository\NiveauxRepository;
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Field\ChoiceFormField;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;

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
        yield IdField::new('ID')
            ->hideWhenCreating();
        yield TextField::new('Titre');
        yield TextField::new('Synopsis');

        yield AssociationField::new('id_langages')
            ->onlyOnForms()
            ->setLabel('Langages du cours')
            ->setQueryBuilder(
                fn(ORMQueryBuilder $queryBuilder) => $queryBuilder->getEntityManager()->getRepository(Langages::class)->findAll()
            );

        yield ArrayField::new('id_langages')
        ->hideOnForm()
        ->setLabel('Langages du cours');

        yield AssociationField::new('id_niveau')
            ->setLabel('Niveau du cours')
            ->setQueryBuilder(
                fn(ORMQueryBuilder $queryBuilder) => $queryBuilder->getEntityManager()->getRepository(Niveaux::class)->findAll()
            );
        yield IntegerField::new('Temps_Estime');
        yield TextField::new('Image');
        yield DateField::new('Date');
        yield ChoiceField::new('Cree')
            ->setChoices(['OUI' => 1, 'NON' => 0]);
    }


}
