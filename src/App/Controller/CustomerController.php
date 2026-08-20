<?php
declare(strict_types=1);
require_once 'App/Core/BaseController.php';
require_once 'App/Model/OrderingModel.php';

class CustomerController extends BaseController
{
    public function processData(): void {}

    private function getData(): array
    {
        // SESSION wird in index.php gestartet.
        if (isset($_SESSION["ordering_id"])) {
            $orderingModel = new OrderingModel();
            return $orderingModel->getOrderingById($_SESSION["ordering_id"]);
        }
        return [];
    }

    public function generateResponse(): void
    {
        $data = $this->getData();
        $this->renderHtml('App/View/customer.view.php', ['data' => $data]);
    }

    public function handleRequest(): void
    {
        $this->processData();
        $this->generateResponse();
    }
}