<?php
class Contact
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }
  //get all contacts
  public function getContacts()
  {
    $this->db->query("SELECT * FROM `Contact`;");

    return $this->db->resultSet();;
  }
  //get one contact
  public function getSingleContact($id)
  {
    $this->db->query("SELECT * FROM `Contact` WHERE `Id` = :id;");
    $this->db->bind(':id', $id, PDO::PARAM_INT);

    return $this->db->single();
  }
  //update contacts
  public function updateContact($post)
  {
    $this->db->query("UPDATE `Contact` SET `Email` = :email, `Mobile` = :mobile, WHERE `Id` = :id;");
    $this->db->bind(':id', $post['id'], PDO::PARAM_INT);
    $this->db->bind(':email', $post['email'], PDO::PARAM_STR);
    $this->db->bind(':mobile', $post['mobile'], PDO::PARAM_INT);

    return $this->db->execute();
  }
  //delete contacts
  public function deleteContact($id)
  {
    $this->db->query("DELETE FROM `Contact` WHERE `Id` = :id;");
    $this->db->bind(':id', $id, PDO::PARAM_INT);

    return $this->db->execute();
  }
  //create contacts
  public function createContact()
  {
    $this->db->query("INSERT INTO `Contact` (`Email`, `Mobile`) VALUES (:email, :mobile);");
    $this->db->bind(':email', $_POST['email'], PDO::PARAM_STR);
    $this->db->bind(':mobile', $_POST['mobile'], PDO::PARAM_INT);

    return $this->db->execute();
  }
}