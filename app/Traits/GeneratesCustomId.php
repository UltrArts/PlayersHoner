<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

trait GeneratesCustomId
{
    protected static function bootGeneratesCustomId()
    {
        static::creating(function ($model) {
            try {
                $year = date('Y');
                $prefix = $year * 10000;

                // Busca o maior ID que começa com o prefixo do ano atual
                $lastId = DB::table($model->getTable())
                            ->where('id', '>=', $prefix)
                            ->where('id', '<', $prefix + 10000)
                            ->max('id');

                $newId = $lastId ? $lastId + 1 : $prefix + 1;

                $model->id = $newId;
            } catch (QueryException $e) {
                // Log or handle the exception
                // This will prevent the creation if there's a database error
                throw new \Exception('Failed to generate custom ID: '. $e->getMessage());
            }
        });
    }
}
