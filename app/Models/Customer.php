<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory; // Přidání HasFactory trait

    protected $table = 'customers'; // Nastavení správného názvu tabulky



    /**
     * Customer finding according first letters of a surname
     */
    public function searchCustomerForAutocomplete($lastname)
    {
        $sql = "SELECT * FROM customers c WHERE c.lastname LIKE ?";

        return DB::select($sql,["$lastname%"]);

    }
}
