<?php


namespace App\Domain\Blog\Responder;


use App\Application\Entity\Article;

class RedirectReadArticlesResponder
{

    /**
     * @var Article
     */
    private Article $article;

    /**
     * RedirectReadArticlerResponder constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }






}