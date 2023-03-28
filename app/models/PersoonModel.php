<?php

class PersoonModel
{

    private $db;

    public function get_personen_scores_reserveringen()
    {
        $this->db->select('persoon.*, score.score, reservering.datum');
        $this->db->from('persoon');
        $this->db->join('scorePerPersoon', 'persoon.id = scorePerPersoon.persoon_id');
        $this->db->join('score', 'scorePerPersoon.score_id = score.id');
        $this->db->join('reserveringPerPersoon', 'persoon.id = reserveringPerPersoon.persoon_id');
        $this->db->join('reservering', 'reserveringPerPersoon.reservering_id = reservering.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllPersonen()
    {
        $query = "SELECT * FROM persoon";
        $result = $this->db->query($query);

        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function createPersoon($voornaam, $achternaam, $leeftijd)
    {
        $this->db->query('INSERT INTO persoon (voornaam, achternaam, leeftijd) VALUES(:voornaam, :achternaam, :leeftijd)');
        // Bind values
        $this->db->bind(':voornaam', $voornaam);
        $this->db->bind(':achternaam', $achternaam);
        $this->db->bind(':leeftijd', $leeftijd);

        // Execute
        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return -1; // Return -1 on failure
        }
    }

    public function getPersoonById($id)
    {
        $query = "SELECT * FROM persoon WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function updatePersoon($id, $voornaam, $achternaam, $leeftijd)
    {
        $query = "UPDATE persoon SET voornaam = :voornaam, achternaam = :achternaam, leeftijd = :leeftijd WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':voornaam', $voornaam, PDO::PARAM_STR);
        $stmt->bindValue(':achternaam', $achternaam, PDO::PARAM_STR);
        $stmt->bindValue(':leeftijd', $leeftijd, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deletePersoon($persoonId)
    {
        // Prepare statement
        $this->db->query('DELETE FROM persoon WHERE id = :id');

        // Bind values
        $this->db->bind(':id', $persoonId);

        // Execute statement
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
