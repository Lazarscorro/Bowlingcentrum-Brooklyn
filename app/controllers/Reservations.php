<?php
class Reservations extends Controller
{
  public function index()
  {
    $this->view('reservations/reservation');
  }
}