<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validar reCAPTCHA
        $recaptchaResponse = $request->input('g-recaptcha-response');
        
        if (!$recaptchaResponse) {
            return back()->withErrors(['g-recaptcha-response' => 'Por favor confirma que no eres un robot.']);
        }

        // Verificar reCAPTCHA con Google
        $recaptchaSecret = config('services.recaptcha.secret');
        $recaptchaVerification = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecret,
            'response' => $recaptchaResponse,
            'remoteip' => $request->ip(),
        ]);

        $recaptchaData = $recaptchaVerification->json();

        if (!$recaptchaData['success']) {
            $errorMessages = [
                'missing-input-secret' => 'Error de configuración del servidor.',
                'invalid-input-secret' => 'Clave secreta de reCAPTCHA inválida.',
                'missing-input-response' => 'Por favor confirma que no eres un robot.',
                'invalid-input-response' => 'Respuesta de reCAPTCHA inválida.',
                'bad-request' => 'Solicitud mal formada.',
                'timeout-or-duplicate' => 'La respuesta ya no es válida. Inténtalo de nuevo.',
            ];

            $errorCode = $recaptchaData['error-codes'][0] ?? 'unknown';
            $errorMessage = $errorMessages[$errorCode] ?? 'Falló la verificación de reCAPTCHA.';

            return back()->withErrors(['g-recaptcha-response' => $errorMessage]);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'No tienes permisos de administrador.']);
            }
        }

        return back()->withErrors(['email' => 'Las credenciales no son válidas.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
