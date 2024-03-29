<?php

namespace App\Controller\Admin;

use App\Entity\Booking;
use App\Entity\Equipment;
use App\Entity\Favorite;
use App\Entity\Offer;
use App\Entity\Review;
use App\Entity\User;
use App\Repository\BookingRepository;
use App\Repository\OfferRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    private UserRepository $userRepository;
    private OfferRepository  $offerRepository;
    private BookingRepository  $bookingRepository;
    public function __construct(
        UserRepository $userRepository,
        OfferRepository $offerRepository,
        BookingRepository $bookingRepository
    ) {
        $this->userRepository = $userRepository;
        $this->offerRepository = $offerRepository;
        $this->bookingRepository= $bookingRepository;
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $users= $this->userRepository->findAll();
        $bookings= $this->bookingRepository->findAll() ;
        $offers= $this->offerRepository->findAll() ;
        return $this->render('admin/dashboard.html.twig',[
          'users' => $users ,
           'bookings'=>$bookings,
           'offers'=>$offers,
         ]);
    
        
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
       
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bnb2402 Master');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-list', User::class);
        
        yield MenuItem::linkToCrud('Bookings', 'fas fa-list', Booking::class);
        yield MenuItem::linkToCrud('Equipements', 'fas fa-list', Equipment::class);
        yield MenuItem::linkToCrud('Favorites', 'fas fa-list', Favorite::class);
        yield MenuItem::linkToCrud('Offers', 'fas fa-list', Offer::class);
        yield MenuItem::linkToCrud('Reviews', 'fas fa-list', Review::class);
        yield MenuItem::linkToRoute('Back to website', 'fa fa-arrow-left', 'app_home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
