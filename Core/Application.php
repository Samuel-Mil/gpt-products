<?php

namespace App\Core;

use Dotenv\Dotenv;

class Application
{
    public static Application $app;
    public static string $ROOT_DIR;
    public static string $layout = "main";
    public ?Controller $controller = null;
    public View $view;
    public Database $db;
    public Request $request;
    public Response $response;
    public Router $router;
    public Session $session;

    public function __construct(string $path)
    {
        self::$app = $this;
        self::$ROOT_DIR = $path;
        $this->loadEnvVars($path);

        $this->view = new View();
        $this->db = new Database();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->session = new Session();
    }


    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setResponseCode($e->getCode());
            die('<h2>'. $e->getMessage() .'</h2>');
        }
    }

    private function loadEnvVars(string $path)
    {
        $dotenv = Dotenv::createImmutable($path);
        $dotenv->load();
    }
}
