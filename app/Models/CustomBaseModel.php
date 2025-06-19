<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomBaseModel extends Model
{
    /**
     * Aktualizuje záznam pomocí Query Builderu.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public static function updateRecord($id, array $data)
    {
        return DB::table((new static)->getTable())
            ->where('id', $id)
            ->update($data);
    }



}
