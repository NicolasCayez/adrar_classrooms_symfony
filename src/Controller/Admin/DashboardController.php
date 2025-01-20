<?php

namespace App\Controller\Admin;

use App\Entity\Chapitres;
use App\Entity\Cours;
use App\Entity\Langages;
use App\Entity\Niveaux;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use SebastianBergmann\Diff\Chunk;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
        $roles = $this->getUser()->getRoles();
        $isAdmin = false;
        foreach ($roles as &$role) {
            if ($role == "ROLE_ADMIN") {
                $isAdmin = true;
            }
        }
        if ($isAdmin) {
            $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
            return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());
        } else {
            return $this->redirectToRoute("app_home");
        }
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Adrar Classrooms Symfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::section('Gestion utilisateurs');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-id-card', User::class);
        yield MenuItem::section('Gestion cours');
        yield MenuItem::linkToCrud('Cours', 'fa fa-book', Cours::class);
        yield MenuItem::linkToCrud('Chapitres', 'fa fa-pie-chart', Chapitres::class);
        yield MenuItem::linkToCrud('Langages', 'fa fa-language', Langages::class);
        yield MenuItem::linkToCrud('Niveaux', 'fa fa-level-up', Niveaux::class);
    }
}
