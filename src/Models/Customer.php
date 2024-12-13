<?php

namespace App\Models;

use App\Models\BaseModel;
use \PDO;

class Customer extends BaseModel
{
    public function all()
    {
        $sql = "SELECT * FROM customers";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, '\App\Models\Customer');
    }

    public function getCustomer($id)
    {
        $sql = "SELECT * FROM customers WHERE id=:id";
        $statement = $this->db->prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetchObject('\App\Models\Customer');
    }

    public function update()
    {
        $sql = "UPDATE customers
                SET
                    first_name=:first_name,
                    last_name=:last_name,
                    email=:email,
                    phone=:phone
                WHERE id=:id";
        $statement = $this->db->prepare($sql);
        return $statement->execute([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'id' => $this->id
        ]);
    }
}
