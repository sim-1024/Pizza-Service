<?php
declare(strict_types=1);
require_once 'App/Core/BaseController.php';
require_once 'App/Model/OrderingModel.php';
require_once 'App/Core/Router.php';

class ApiController extends BaseController
{
    private function getData(): array
    {
        $data = [];
        $router = new Router();
        $route = $router->getRoute();
        $resource = $route['resource'];
        $id = $route['parameter'];

        if ($resource === 'ordering') {
            $orderingModel = new OrderingModel();
        } else {
            http_response_code(404);
            exit;
        }

        if (isset($_SESSION["ordering_id"])) {
            if ($id && (int)$id !== (int)$_SESSION["ordering_id"]) {
                http_response_code(404);
                return $data;
            }
            $id = (int)($id ?: $_SESSION["ordering_id"]);
            $ordering = $orderingModel->getOrderingById($id);
            if ($ordering) {
                $data = $ordering;
            } else {
                http_response_code(404);
            }
        } else {
            http_response_code(404);
        }

        return $data;
    }

    public function generateResponse(): void
    {
        $data = $this->getData();
        $this->renderJson($data);
    }

    public function handleRequest(): void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "GET") {
            http_response_code(405);
        } else {
            $this->generateResponse();
        }
    }
}