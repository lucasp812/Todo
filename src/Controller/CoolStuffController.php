<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
 
class CoolStuffController extends AbstractController
{
    /**
     * @Route("/cool/stuff", name="app_cool_stuff")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CoolStuffController.php',
        ]);
    }

  /**
 * @Route("/blog/{slug}", name="slug", requirements={"slug"="\S+"})
 */

    public function slug(string $slug): JsonResponse
    {
      return $this->json([
      'message' => 'page blog'.$slug,
      'path' => 'src/Controller/CoolStuffController.php',
    ]);
    }
     /** 
    *@Route("/blog/carte",name="carte")
    */
    public function carte(): JsonResponse
    {
      return $this->json("carte");
    }
      /** 
    *@Route("/blog/{page}",name="page",  requirements={"page"="\d+"})
    */
    public function page(int $page): JsonResponse
    {
        return $this->json([
            'message' => 'page '.$page,
            'path' => 'src/Controller/CoolStuffController.php',
        ]);

    }
}

