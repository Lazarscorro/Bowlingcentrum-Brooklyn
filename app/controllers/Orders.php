<?php
	class Orders extends Controller
	{
        private $orderModel;

		public function __construct() 
		{           
			$this->orderModel = $this->model('Order');
		}

		public function index() 
		{
            // Load the view
			$this->view('orders/index');
		}

        public function overview() 
		{
            // Get orders
            $data = ['orders' => $this->orderModel->getOrders()];

            // Load the view
			$this->view('orders/overview', $data);
		}

        public function create() 
		{
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                try {
                  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          
                  $this->orderModel->createOrder($_POST);
          
                  header('Location: ' . URLROOT . '/orders/overview');
                } catch (PDOException $e) {
                  echo 'Er is iets misgegaan tijdens het aanmaken van de bestelling (PDOException)';
                  header('Refresh: 2; url=' . URLROOT . '/orders/overview');
                }
            } else {
                // Load the view
			    $this->view('orders/create');
            }
		}

        public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // Update the data with the form data
                $UpdatedOrders = $this->orderModel->updateOrder($_POST);

                // Get orders
                $orders = $this->orderModel->getOrders();

                // If the order is updated successfully go back to the overview with a success message
                if ($UpdatedOrders) {
                    $data = [
                        'success' => 'De bestelling is succesvol gewijzigd',
                        'orders' => $orders
                    ];

                    // Load the view
                    $this->view('orders/update', $data);
                } else {
                    $data = [
                        'error' => 'Er is een fout opgetreden tijdens het bewerken van de bestelling. De bestelling is niet gewijzigd',
                        'orders' => $orders
                    ];

                    // Load the view
                    $this->view('orders/update', $data);
                }
            } catch (PDOException $e) {
                // Show the error message
                echo 'Er is iets misgegaan tijdens het bewerken van een order (PDOException)';
                header('Refresh: 2; url=' . URLROOT . '/orders/overview');
            }
        } else {
            $row = $this->orderModel->getSingleOrder($id);

            $data = ['row' => $row];

            $this->view('orders/overview', $data);
        }
    }

    public function delete($id)
    {
        // Delete the order
        $this->orderModel->deleteOrder($id);

        $data = [
            'deleteStatus' => "De bestelling met id $id is verwijderd",
            'orders' => $this->orderModel->getOrders()
        ];

        $this->view('orders/overview', $data);
    }
}