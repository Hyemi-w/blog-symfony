<?php

namespace App\Controller;

use App\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    /**
     * @param Tag $tag
     *
     * @Route("/tag/{name}", name="tag_show")
     * @return Response
     */
    public function index(Tag $tag) : Response
    {
        $articles = $tag->getArticles();
        return $this->render('tag/index.html.twig',
            [
            'articles' => $articles,
            'tag' => $tag,
        ]
        );
    }
}
