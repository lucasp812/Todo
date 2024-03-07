<?php

namespace App\Controller;
use App\Entity\Todo;
use App\Form\TodoType;
use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\TodoFilterType;



/**
 * @Route("/todo")
 */
class TodoController extends AbstractController
{
    /**
     * @Route("/", name="app_todo_index", methods={"GET", "POST"})
     */
    public function index(TodoRepository $todoRepository, Request $request): Response
    {
        $form = $this->createForm(TodoFilterType::class);
        $form->handleRequest($request);
        $orderby=$request->query->get('orderby');
        $order=$request->query->get('order');

        if($order == 'ASC'){
            $n = 'DESC';
        }else{
            $n ='ASC';
        }

        if($orderby == 'ASC'){
            $idOrder = 'DESC';
        }else{
            $idOrder ='ASC';
        }
    
    
        return $this->render('todo/index.html.twig', [
            'todos' => $todoRepository->findAllOrdered($order,$orderby),
            "order"=> $n,
            "orderby"=>$idOrder,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="app_todo_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TodoRepository $todoRepository): Response
    {
        $todo = new Todo();
        $form = $this->createForm(TodoType::class, $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $todoRepository->add($todo, true);

            return $this->redirectToRoute('app_todo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('todo/new.html.twig', [
            'todo' => $todo,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_todo_show", methods={"GET"})
     */
    public function show(Todo $todo): Response
    { 
        dump($todo);    
        return $this->render('todo/show.html.twig', [
            'todo' => $todo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_todo_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Todo $todo, TodoRepository $todoRepository): Response
    {
        $form = $this->createForm(TodoType::class, $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $todoRepository->add($todo, true);

            return $this->redirectToRoute('app_todo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('todo/edit.html.twig', [
            'todo' => $todo,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/change-update", name="app_todo_change-update", methods={"GET", "POST"})
     */
    public function ChangeStatus(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $status = $doctrine->getRepository(todo::class)->findOneBy(["id" => $id]);
        if($status->isDone()== 1){
            $status->setDone(0) ;

        }
        else {$status->setDone(1) ;
       
    }
    $entityManager->persist($status);

    $entityManager->flush();

    return $this->json(['message' => "oui"]);

}


    /**
     * @Route("/{id}", name="app_todo_delete", methods={"POST"})
     */
    public function delete(Request $request, Todo $todo, TodoRepository $todoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$todo->getId(), $request->request->get('_token'))) {
            $todoRepository->remove($todo, true);
        }

        return $this->redirectToRoute('app_todo_index', [], Response::HTTP_SEE_OTHER);
    }
}
