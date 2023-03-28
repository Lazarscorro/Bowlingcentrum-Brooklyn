<?php
class Order
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getOrders()
    {
        $this->db->query("SELECT `Id`, `Naam`, `Opmerking` FROM `Pakketten`;");

        return $this->db->resultSet();;
    }

    public function getSingleOrder($id)
    {
        $this->db->query("SELECT `Id`, `Naam`, `Opmerking` FROM `Pakketten` WHERE `Id` = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateOrder($post)
    {
        $this->db->query("UPDATE `Pakketten` SET `Naam` = :naam WHERE `Id` = :id;");
        if (isset($post['Id'])) {
            $this->db->bind(':id', $post['Id'], PDO::PARAM_INT);
        } else {
            return false;
        }

        // Check if username, email or role are set and for each bind the value to the query
        $binds = [
            ':naam' => $post['Naam']
        ];

        foreach ($binds as $key => $value) {
            if (isset($value)) {
                $this->db->bind($key, $value, PDO::PARAM_STR);
            }
        }

        return $this->db->execute();
    }

    public function createOrder($postData)
    {
        $this->db->query("INSERT INTO `Pakketten` (`Naam`, `Opmerking`) VALUES (:nm, :opm);");
        $this->db->bind(':nm', $postData['Naam'], PDO::PARAM_STR);
        $this->db->bind(':opm', $postData['Opmerking'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function deleteOrder($id)
    {
        $this->db->query("DELETE FROM `Pakketten` WHERE `Id` = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}
