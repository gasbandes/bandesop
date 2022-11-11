<?php

namespace Modules\Login\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Login\Entities\Login as LoginModel;;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
     public function handle(Login $event)
    {
        $login = $login = new LoginModel;
        $login->user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $login->session_token = session('_token');
        $login->ip_address = $_SERVER['REMOTE_ADDR'];
        $login->login_at = \Carbon\Carbon::now();  
        $event->user->logins()->save($login);


        $user = \App\Models\User::find(\Auth::user()->id);
        $user->is_actived = true;
        $user->save();

        $log = new \Modules\Log\Entities\Log();
        $log->user_id =\Auth::user()->id;
        $log->descripcion = 'El usuario: '.\Auth::user()->name.' Ha Iniciado sesión a las  '
                    . date('H:i:s'). ' del día '.date('d/m/Y');
        $log->dia = date('w');
        $log->mes = date('m');
        $log->ano = date('Y');
        $log->save();

         \Alert::alert('¡Bienvenido(a)!', 'Has iniciado sesión en nuestra aplicación', 'success');

        
    }
}
