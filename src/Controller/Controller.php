<?php


namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Controller extends  AbstractController
{


    /**
     * @Route("/geta")
     */
    public function guzzleGetff()

    {
        $client = new Client([

            'base_uri' => 'http://127.0.0.1:8000',

        ]);
        $response = $client->request('GET', '/RecupererArticles');
        $body = $response->getBody();
        $arr = json_decode($body, true);
        return $this->render('getapi/guzzele.html.twig', [
            'arr' => $arr
        ]);
    }

    /**
     * @Route("/post")
     */
    public function guzzlePosts(Request $request)

    {
        if (isset($_POST['submit'])) {
            $client = new Client([

                'base_uri' => 'http://127.0.0.1:8000',

            ]);
            $data = $request->request->all();

            $response = $client->request('POST', '/articlesPost', [
                'json' => [

                    'title' => $data['title'],

                    'contenu' => $data['contenu'],

                    'auteur' => $data['auteur'],
                    'datePublication' => $data['datePublication'],
                ],

                'verify' => false,

            ]);
            dd($response);
            $body = $response->getBody();
            $arr = json_decode($body, true);
            //$response_body = json_decode($response->getBody(), true

            // echo 'envoyer';
        }
        return $this->render('form/guzzele.html.twig');
    }
    /**
     * @Route("/postform")
     */
    public function guzzlePostForm()

    {
        $client = new Client([

            'base_uri' => 'http://127.0.0.1:8000', [
                'json' => [
                    'title' => '1',
                    'auteur' => 'Developer',
                    'datepublication' => 'bonjour'
                ]

            ]
        ]);
        $response = $client->request('GET', 'RecupererArticles');
        $body = $response->getBody();
        $arr = json_decode($body, true);
        return $this->render('getapi/guzzele.html.twig', [
            'arr' => $arr
        ]);
    }



    /**
     * @Route("/post")
     */
    public function guzzlePost()

    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'jsonplaceholder.typicode.com/posts', [
            'json' => [
                'userId' => '1',
                'title' => 'Developer',
                'body' => 'bonjour'
            ]
        ]);

        $body = $response->getBody();
        $arr = json_decode($body, true);
        return $this->render('post/guzzele.html.twig', [
            'arr' => $arr
        ]);
    }



    /**
     * @Route("/put")
     */
    public function guzzlePut()

    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('PUT', 'jsonplaceholder.typicode.com/posts/2', [
            'json' => [
                'userId' => '2',
                'title' => 'rami',
                'body' => 'ok'
            ]
        ]);

        $body = $response->getBody();
        $arr = json_decode($body, true);
        return $this->render('put/guzzele.html.twig', [
            'arr' => $arr
        ]);
    }





    /**
     * @Route("/delete")
     */
    public function guzzledelete()

    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'DELETE',
            'jsonplaceholder.typicode.com/posts/2'
        );

        $body = $response->getBody();
        $arr = json_decode($body, true);
        return new Response('Delete');
    }
}
