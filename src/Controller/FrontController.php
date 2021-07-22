<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Image;
use App\Entity\Menace;
use App\Entity\User;
use App\Entity\Story;
use App\Form\StoryType;
use App\Repository\StoryRepository;
use App\Repository\ImageRepository;
use App\Repository\UserRepository;
use App\Repository\MenaceRepository;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Form;
use App\Service\Slugify;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\RouterInterface;
use DateTime;

class FrontController extends AbstractController
{
    private ObjectRepository $storyRepo;
    private ObjectRepository $imageRepo;
    private ObjectRepository $menaceRepo;
    private ObjectRepository $userRepo;

    public function __construct(
        StoryRepository $storyRepo,
        ImageRepository $imageRepo,
        MenaceRepository $menaceRepo,
        UserRepository $userRepo
    ) {
        $this->storyRepo = $storyRepo;
        $this->imageRepo = $imageRepo;
        $this->menaceRepo = $menaceRepo;
        $this->userRepo = $userRepo;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('front/home.html.twig', [
            'stories' => $this->storyRepo->findAll(),
        ]);
    }

    /**
     * @Route("/page2", name="page2")
     */
    public function page2(): Response
    {
        return $this->render('front/page2.html.twig', [
            'stories' => $this->storyRepo->findAll(),
        ]);
    }

    /**
     * @Route("/page3", name="page3")
     */
    public function page3(): Response
    {
        return $this->render('front/page3.html.twig', [
            'stories' => $this->storyRepo->findAll(),
        ]);
    }

    /**
     * @Route("/scp", name="scp")
     */
    public function scp(): Response
    {
        return $this->render('front/page3.html.twig', [
            'stories' => $this->storyRepo->findAll(),
        ]);
    }

    /**
     * @Route("/story/new", name="story_new", methods={"GET","POST"})
     */
    public function new(Request $request, Slugify $slugify): Response
    {
        $date = new DateTime('09/06/2020');
        $date->format('Y-m-d');

        $story = new Story();
        $form = $this->createForm(StoryType::class, $story);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $slug = $slugify->generate($story->getTitle());
            $story->setSlug($slug);
            $story->setCreatedAt($date);
            $story->setUser($this->getUser());
            $entityManager->persist($story);
            $entityManager->flush();

            $story->setIsValidated(false);
            $entityManager->persist($story);
            $entityManager->flush();

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front/new.html.twig', [
            'story' => $story,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/story/{slug}", name="story_show", methods={"GET"})
     */
    public function show(Story $story): Response
    {
        return $this->render('front/show.html.twig', [
            'story' => $story,
        ]);
    }

    /**
     * @Route("/mon-compte", methods={"GET"}, name="app_profile")
     */
    public function profile(): Response
    {
        $user = $this->getUser();

        return $this->render('security/user_profile.html.twig', [
            'user' => $user,
        ]);
    }
}
