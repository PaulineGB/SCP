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
use Doctrine\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\RouterInterface;

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
     * @Route("/story/new", name="story_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $story = new Story();
        $form = $this->createForm(StoryType::class, $story);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($story);
            $entityManager->flush();

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('story/new.html.twig', [
            'story' => $story,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/story/{slug}", name="story_show", methods={"GET"})
     */
    public function show(Story $story): Response
    {
        return $this->render('story/show.html.twig', [
            'story' => $story,
        ]);
    }

    /**
     * @Route("/story/{slug}/edit", name="story_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Story $story): Response
    {
        $form = $this->createForm(StoryType::class, $story);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('story_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('story/edit.html.twig', [
            'story' => $story,
            'form' => $form->createView(),
        ]);
    }
}
