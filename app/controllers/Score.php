<?php
// PersoonController.php
class Score extends Controller
{
  public $PersoonModel;

  public function __construct()
  {
    $this->PersoonModel = new PersoonModel();
  }

  public function index()
  {
    $personen = $this->PersoonModel->get_personen_scores_reserveringen();
    require_once 'views/persoon/index.php';
  }

  public function create()
  {
    require_once 'views/persoon/create.php';
  }

  public function store()
  {
    $naam = $_POST['naam'];
    $achternaam = $_POST['achternaam'];
    $leeftijd = $_POST['leeftijd'];

    $this->PersoonModel->createPersoon($naam, $achternaam, $leeftijd);

    header('Location: index.php');
  }

  public function edit($id)
  {
    $persoon = $this->PersoonModel->getPersoonById($id);

    require_once 'views/persoon/edit.php';
  }
  // Testcase persoonbyid
  //   public function showPersoon($id) {
  //     $persoon = $this->PersoonModel->getPersoonById($id);
  //     $this->view('persoon/show', ['persoon' => $persoon]);
  // }

  public function update()
  {
    $id = $_POST['id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $leeftijd = $_POST['leeftijd'];

    $this->PersoonModel->updatePersoon($id, $voornaam, $achternaam, $leeftijd);

    header('Location: index.php');
  }

  public function delete($id)
  {
    $this->PersoonModel->deletePersoon($id);

    header('Location: index.php');
  }
}