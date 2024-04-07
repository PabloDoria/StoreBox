<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccesoCuenta;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Aquí se llama al método para enviar el correo electrónico
        $this->enviarEmailAcceso($user->email);

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Envía un correo electrónico de acceso a la cuenta.
     *
     * @param  string  $email
     * @return void
     */
    protected function enviarEmailAcceso($email)
    {
        $nombreSitio = config('app.name'); // Obtener el nombre de la aplicación desde la configuración
    
        // Obtener la hora y fecha actual
        $hora = now()->format('H:i:s');
        $fecha = now()->format('Y-m-d');
    
        // Contenido del correo electrónico
        $contenidoCorreo = "Buen día estimado usuario,
    
    Hace un instante se ha ingresado a tu cuenta en StoreBox usando este correo electrónico. Se te notifica para asegurar que fuiste tú quien ha accedido a las $hora del $fecha.
    
    Esperamos seguir manteniendo la seguridad de las cuentas asociadas a nuestro servicio.";
    
        // Envía el correo electrónico utilizando la clase Mail de Laravel
        Mail::raw($contenidoCorreo, function ($message) use ($email, $nombreSitio) {
            $message->to($email)
                    ->subject('Acceso a tu cuenta de StoreBox');
        });
    }
    
}
