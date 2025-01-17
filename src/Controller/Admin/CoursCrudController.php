<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use App\Entity\Niveaux;
use App\Repository\NiveauxRepository;
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Field\ChoiceFormField;
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
        yield AssociationField::new('id_niveau')
            ->setLabel('Niveau')
            ->setQueryBuilder(
                fn(ORMQueryBuilder $queryBuilder) => $queryBuilder->getEntityManager()->getRepository(Niveaux::class)->findAll()
            );
        // $niveaux = new Niveaux;
        // yield ChoiceField::new('niveau')
        //     ->setFormType(ChoiceType::class)
        //     ->setTranslatableChoices(
        //     );







        yield TextField::new('Temps_Estime');
        yield TextField::new('Image');
        yield DateField::new('Date');
        yield ChoiceField::new('Cree')
            ->setChoices(['OUI' => 1, 'NON' => 0]);
    }
}
