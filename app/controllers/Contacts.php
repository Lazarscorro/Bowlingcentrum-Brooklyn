<?php
class Contacts extends Controller
{

  private $contactModel;

  public function __construct()
  {
    $this->contactModel = $this->model('Contact');
  }

  public function index()
  {
    // Get countries
    $contacts = $this->contactModel->getContacts();

    // Make the data available in the view
    $rows = '';
    foreach ($contacts as $value) {
      $rows .= "<tr>
                  <td>$value->Id</td>
                  <td>" . $value->Email . "</td>
                  <td>" . $value->Mobile . "</td>
                  <td><a href='" . URLROOT . "/contacts/update/$value->Id'>update</a></td>
                  <td><a href='" . URLROOT . "/contacts/delete/$value->Id'>delete</a></td>
                </tr>";
    }

    $data = [
      'title' => '<h1>Contacten overzicht</h1>',
      'contacts' => $rows
    ];

    // Load the view
    $this->view('contacts/index', $data);
  }

  public function update($id = null)
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      try {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Update the data with the form data
        $this->contactModel->updateContact($_POST);

        // Redirect to the index page
        header('Location: ' . URLROOT . '/contacts/index');
      } catch (PDOException $e) {
        // Show the error message
        echo 'Er is iets misgegaan tijdens het bewerken van een contact (PDOException)';
        header('Refresh: 2; url=' . URLROOT . '/contact/index');
      }
    } else {
      $row = $this->contactModel->getSingleContact($id);

      $data = [
        'title' => '<h1>Update contactenoverzicht</h1>',
        'row' => $row
      ];

      $this->view('contacts/update', $data);
    }
  }

  public function delete($id)
  {
    $this->contactModel->deleteContact($id);

    $data = ['deleteStatus' => "Het contact met id $id is verwijderd"];

    $this->view('contacts/delete', $data);

    header('Refresh: 2; URL=' . URLROOT . '/contacts/index');
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      try {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $this->contactModel->createContacts($_POST);

        header('Location: ' . URLROOT . '/contacts/index');
      } catch (PDOException $e) {
        echo 'Er is iets misgegaan tijdens het aanmaken van het land (PDOException)';
        header('Refresh: 2; url=' . URLROOT . '/contacts/index');
      }
    } else {
      $data = ['title' => '<h1>Nieuw contact toevoegen</h1>'];

      $this->view('contacts/create', $data);
    }
  }
}
