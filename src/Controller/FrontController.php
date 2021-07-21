<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Image;
use App\Entity\Menace;
use App\Entity\User;
use App\Entity\Story;
use App\Repository\StoryRepository;
use App\Repository\ImageRepository;
use App\Repository\UserRepository;
use App\Repository\MenaceRepository;
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
     * @Route("/story/{slug}", name="show_story")
     */
    public function ShowStory(Story $story): Response
    {
        return $this->render('front/show_story.html.twig', [
            'story' => $story,
        ]);
    }
}
