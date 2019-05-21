<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 20/05/19
 * Time: 16:44
 */

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/category", name="category_form")
     */
    public function add(EntityManagerInterface $entityManager, Request $request) : Response
    {
        $category = new Category();
        $form = $this->createForm(
            CategoryType::class, $category
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();
        }

        return $this->render('blog/form.html.twig',
            ['form' => $form->createView()]);
    }
}
