<?php
// PersoonController.php

class Score extends Controller
{
  private $persoonModel;

  public function __construct()
  {
    $this->persoonModel = new PersoonModel();
  }

  public function index()
  {
    $personen = $this->persoonModel->get_personen_scores_reserveringen();
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

    $this->persoonModel->createPersoon($naam, $achternaam, $leeftijd);

    header('Location: index.php');
  }

  public function edit($id)
  {
    $persoon = $this->persoonModel->getPersoonById($id);

    require_once 'views/persoon/edit.php';
  }
  // Testcase persoonbyid
  //   public function showPersoon($id) {
  //     $persoon = $this->persoonModel->getPersoonById($id);
  //     $this->view('persoon/show', ['persoon' => $persoon]);
  // }

  public function update()
  {
    $id = $_POST['id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $leeftijd = $_POST['leeftijd'];

    $this->persoonModel->updatePersoon($id, $voornaam, $achternaam, $leeftijd);

    header('Location: index.php');
  }

  public function delete($id)
  {
    $this->persoonModel->deletePersoon($id);

    header('Location: index.php');
  }
}