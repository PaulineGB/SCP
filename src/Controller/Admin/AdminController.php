<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Entity\Menace;
use App\Entity\Story;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admindarkside", name="admindarkside")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(StoryCrudController::class)->generateUrl());
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/admin.css');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="http://scp-wiki.wdfiles.com/local--files/unfounded-hub/UnFounded.png" style="width:25%;"> FONDATION SCP');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Retour sur le site', 'fa fa-home', 'home');
        yield MenuItem::linkToRoute('Déconnexion', 'fa fa-sign-out', 'logout');
        yield MenuItem::section('Menu');
        yield MenuItem::linkToCrud('Rapports SCP', '', Story::class);
        yield MenuItem::linkToCrud('Menaces', '', Menace::class);
        yield MenuItem::linkToCrud('Images', '', Image::class);
        yield MenuItem::linkToCrud('Accréditations', '', User::class);
    }
}
