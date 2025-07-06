<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.plantilla')]
class Register extends Component
{
    public string $nombres = '';
    public string $apellidos = '';
    public string $correo = '';
    public string $celular = '';
    public string $pais = '';
    public string $dni = '';
    public string $genero = '';
    public string $cumple = '';
    public string $contrasena = '';
    public string $confirmar_contrasena = '';
    public bool $acepto_terminos = false;
    public bool $acepto_promociones = false;

    public function register(): void
    {
        // Validar campos
        $validated = $this->validate([
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email'],
            'celular' => ['required', 'string', 'max:20'],
            'pais' => ['required', 'string', 'max:2'],
            'dni' => ['required', 'string', 'size:8', 'unique:' . User::class . ',dni'],
            'genero' => ['required', 'string', 'in:M,F'],
            'cumple' => ['required', 'date', 'before_or_equal:-18 years'],
            'contrasena' => ['required', 'string', Rules\Password::defaults()],
            'confirmar_contrasena' => ['required', 'same:contrasena'],
            'acepto_terminos' => ['accepted'],
        ]);

        // Validar reCAPTCHA deshabilitado
        // $this->validateRecaptcha();

        // Crear usuario
        $user = User::create([
            'name' => $validated['nombres'] . ' ' . $validated['apellidos'],
            'email' => $validated['correo'],
            'phone' => $validated['celular'],
            'country' => $validated['pais'],
            'dni' => $validated['dni'],
            'gender' => $validated['genero'],
            'birthdate' => $validated['cumple'],
            'password' => Hash::make($validated['contrasena']),
            'promo_optin' => $this->acepto_promociones ?? false,
        ]);

        event(new Registered($user));
        Auth::login($user);

        $this->redirect(route('pagina.principallog', absolute: false), navigate: true);
    }

    /**
     * Validar reCAPTCHA (deshabilitado)
     */
    private function validateRecaptcha(): void
    {
        // reCAPTCHA deshabilitado
        return;
    }

    /**
     * Manejar errores específicos de reCAPTCHA
     */
    private function handleRecaptchaError(array $errorCodes): void
    {
        $errorMessages = [
            'missing-input-secret' => 'Error de configuración del servidor.',
            'invalid-input-secret' => 'Clave secreta de reCAPTCHA inválida.',
            'missing-input-response' => 'Por favor confirma que no eres un robot.',
            'invalid-input-response' => 'Respuesta de reCAPTCHA inválida.',
            'bad-request' => 'Solicitud mal formada.',
            'timeout-or-duplicate' => 'La respuesta ya no es válida. Inténtalo de nuevo.',
        ];

        $message = 'Falló la verificación de reCAPTCHA.';
        
        if (!empty($errorCodes)) {
            $firstErrorCode = $errorCodes[0];
            $message = $errorMessages[$firstErrorCode] ?? $message;
        }

        $this->addError('g-recaptcha-response', $message);
    }

    /**
     * Resetear reCAPTCHA cuando hay errores
     */
    public function resetRecaptcha(): void
    {
        $this->dispatch('reset-recaptcha');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}