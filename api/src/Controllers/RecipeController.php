<?php

namespace App\Controllers;
use PDO;

class RecipeController
{

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function get($request, $response, $args)
    {
        $article = $this->container->get('db')->query(
            "SELECT * FROM recipes"
        );
        $articles = $article->fetchAll(PDO::FETCH_OBJ);

        return $response->withStatus(200)->withJson($articles);
    }

    public function post($request, $response, $args)
    {
        $body = $request->getParsedBody();

        if (!isset($body['title'], $body['steps'])) {
            return $response->withStatus(404);
        }

        $article = $this->container->get('db')->prepare(
            "INSERT INTO recipes (title, steps) VALUES (:title, :steps)"
        );
        $article->execute([
            'title' => $body['title'],
            'steps' => $body['steps']
        ]);

        return $response->withStatus(200);
    }

    public function delete($request, $response, $args)
    {
        $article = $this->container->get('db')->prepare(
            "DELETE FROM recipes WHERE id = :id"
        );
        $article->execute(['id' => $args['id']]);

        return $response->withStatus(200);
    }

    public function update($request, $response, $args)
    {
        $body = $request->getParsedBody();

        $article = $this->container->get('db')->prepare(
            "UPDATE recipes SET title = :title , steps = :steps WHERE id = :id"
        );

        $article->execute([
            'title' => $body['title'],
            'steps' => $body['steps'],
            'id' => $args['id']
        ]);
        $article = $this->getArticle($args['id']);
        return $response->withStatus(200)->withJson($article);
    }
}
