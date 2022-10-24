<?php

namespace App\Controller;

use App\Entity\TypeOfBook;
use App\Form\TypeOfBookType;
use App\Repository\TypeOfBookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/type-of-book')]
class AdminTypeOfBookController extends AbstractController
{
    #[Route('/', name: 'app_admin_type_of_book_index', methods: ['GET'])]
    public function index(TypeOfBookRepository $typeOfBookRepository): Response
    {
        return $this->render('admin_type_of_book/index.html.twig', [
            'type_of_books' => $typeOfBookRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_type_of_book_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeOfBookRepository $typeOfBookRepository): Response
    {
        $typeOfBook = new TypeOfBook();
        $form = $this->createForm(TypeOfBookType::class, $typeOfBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeOfBookRepository->save($typeOfBook, true);

            return $this->redirectToRoute('app_admin_type_of_book_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_type_of_book/new.html.twig', [
            'type_of_book' => $typeOfBook,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_type_of_book_show', methods: ['GET'])]
    public function show(TypeOfBook $typeOfBook): Response
    {
        return $this->render('admin_type_of_book/show.html.twig', [
            'type_of_book' => $typeOfBook,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_type_of_book_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeOfBook $typeOfBook, TypeOfBookRepository $typeOfBookRepository): Response
    {
        $form = $this->createForm(TypeOfBookType::class, $typeOfBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeOfBookRepository->save($typeOfBook, true);

            return $this->redirectToRoute('app_admin_type_of_book_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_type_of_book/edit.html.twig', [
            'type_of_book' => $typeOfBook,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_type_of_book_delete', methods: ['POST'])]
    public function delete(Request $request, TypeOfBook $typeOfBook, TypeOfBookRepository $typeOfBookRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeOfBook->getId(), $request->request->get('_token'))) {
            $typeOfBookRepository->remove($typeOfBook, true);
        }

        return $this->redirectToRoute('app_admin_type_of_book_index', [], Response::HTTP_SEE_OTHER);
    }
}
