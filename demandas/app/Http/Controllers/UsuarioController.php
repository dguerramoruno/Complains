<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Denuncia;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function mostrarFormulario()
    {
        $denunciaId = session('denuncia_id');
        if(!$denunciaId){
            return redirect()->back()->with('error','No hay denuncia registrada');
        }
        $denuncia = Denuncia::find($denunciaId);
        $selectedTab = 'denuncia-password';
        return view('denuncia.passwordCreate',compact('denuncia','selectedTab'));
    }

    public function createUser(Request $request)
    {
        // Validaciones de datos del formulario
        $request->validate([
            'denuncia_id' => 'required|exists:denuncias,id',
            'password' => 'required|min:6|confirmed',
        ]);

        // Recupera la denuncia desde la base de datos
        $denuncia = Denuncia::findOrFail($request->denuncia_id);

        // Crea un nuevo usuario
        $user = new User([
            'expedient' => $denuncia->id,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $user->save();
        Auth::login($user);
        // Redirige a donde quieras después de crear el usuario
        return redirect("/");
    }
}
?>