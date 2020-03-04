<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\DB;

class EnviarCorreo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'envia:correo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia correo de felicitaciones';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $clientes = DB::table('clientes')->whereMonth('fecha_nacimiento', date("n"))->whereDay('fecha_nacimiento', date("j"))->get();

      foreach ($clientes as $cliente) {
        $data = array('name'=> $cliente->nombre);

        Mail::send('mail', $data, function ($message) use($cliente){

            $message->to($cliente->correo, $cliente->nombre)->subject('FELIZ CUMPLEAÑOS!!!');
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
        });
      }
    }
}
