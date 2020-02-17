<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = <<<SQL
            UPDATE fs.graphs SET user_id = 5 WHERE user_id = 0;
        SQL;

        DB::update($query);

    }
}
