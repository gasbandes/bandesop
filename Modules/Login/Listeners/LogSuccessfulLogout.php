<?php

namespace Modules\Login\Listeners;
use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Login\Entities\Login;




class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     *
     * @return voi d
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {

        try {

             $token = Login::where('user_id', \Auth::user()->id)->get();
             $lastToken = $token->last();

             $login = $event->user->logins()->where('session_token', $lastToken->session_token)->first();


             $user = \App\Models\User::find(\Auth::user()->id);
             $user->is_actived = false;
             $user->save();


                $login->logout_at = \Carbon\Carbon::now();
                $login->save();

                $log = new \Modules\Log\Entities\Log();
                $log->user_id =\Auth::user()->id;
                $log->descripcion = 'El usuario: '.\Auth::user()->name.' Ha cerrado sesión a las  '
                            . date('H:i:s'). ' del día '.date('d/m/Y');
                $log->dia = date('w');
                $log->mes = date('m');
                $log->ano = date('Y');
                $log->save();

                \Alert::alert('¡Vuelve pronto!', 'Su sesión ha finalizado satisfactoriamente.', 'success');
                return redirect()->to('/login');

            } catch (\Exception $e) {

                \Alert::alert('¡Vuelve pronto!', 'Su sesión ha finalizado satisfactoriamente.', 'success');
                return redirect()->to('/login');

        }

        
    }
}
