<?php

use Illuminate\Database\Seeder;
use App\Models\Cliente;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {
      $this->truncateTables([
        'clientes'
      ]);

      $this->call(ClientesTableSeeder::class);
    }

    //ELiminar registros de la DDBB
    public function truncateTables(array $tables)
    {
      foreach ($tables as $table) {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table($table)->truncate();
        //DB::statement('SET FOREIGN_KEY_CHECKS=1');
      }
    }
}
