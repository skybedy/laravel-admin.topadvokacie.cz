<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SignatureVerification extends Model
{

    protected $table = 'books_on_signature_authenticity_declarations';

    public function fetchAll()
    {
        $sql = "SELECT
                    b.id,DATE_FORMAT(b.signature_created_date, '%e.%c.%Y') AS formatted_signature_created_date ,c.firstname,c.lastname
                FROM
                    $this->table b, customers c
                WHERE
                    b.customer_id = c.id
                ORDER BY
                    b.signature_created_date DESC";

        return DB::select($sql);
    }

    public function fetchById($id)
    {
        $sql = "SELECT
                    b.id,DATE_FORMAT(b.signature_created_date, '%e.%c.%Y') AS formatted_signature_created_date ,c.firstname,c.lastname,DATE_FORMAT(c.date_of_birth, '%e.%c.%Y') AS date_of_birth
                FROM
                     $this->table b, customers c
                WHERE
                    b.id = ? AND
                    b.customer_id = c.id";

        return DB::select($sql,[ $id ]);
    }

}
