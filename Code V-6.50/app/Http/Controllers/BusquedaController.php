<?php
namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Models\Visitante;
use App\Models\Ingreso;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    public function index()
    {
        return view('buscar.buscar');
    }


    public function buscar(Request $request)
    {
        $ingreso = new Ingreso();

        $request->validate([
            'identificador' => 'required|string|max:300', // Aumenta el tamaño máximo para URLs
        ]);

        $identificador = $request->input('identificador');

        // Verificar si es una URL
        if (filter_var($identificador, FILTER_VALIDATE_URL)) {
            // Extraer el id entre 'datos=' y '='
            if (preg_match('/datos=([^=]+)=/', $identificador, $matches)) {
                $id = $matches[1];
            } else {
                return response()->json(['error' => 'No se encontró un identificador válido en la URL.'], 400);
            }
        } else {
            // Caso de identificador numérico directo
            $id = $identificador;
        }
        
        // Buscar en comunidad
        $comunidad = Comunidad::with(['oferta', 'puesto'])->where('id_institucional', $id)->first();
        if ($comunidad) {
            $ingreso->id_institucional = $id;
            $ingreso->save();
            return response()->json([
                'tipo' => 'comunidad',
                'nombre' => $comunidad->nombre,
                'apellido_paterno' => $comunidad->apellido_paterno,
                'apellido_materno' => $comunidad->apellido_materno,
                'id_oferta' => $comunidad->oferta->oferta ?? 'No asignada',
                'id_puesto' => $comunidad->puesto->puesto ?? 'Sin puesto asignado',
                'fotografia' => $comunidad->fotografia
            ]);
        }        

        // Buscar en visitante
        $visitante = Visitante::where('id_visitante', $id)->first();
        if ($visitante) {
            $ingreso->id_visitante = $id;
            $ingreso->save();            
            return response()->json([
                'tipo'   => 'visitante',
                'nombre' => $visitante->nombre,
                'apellido_paterno' => $visitante->apellido_paterno,
                'apellido_materno' => $visitante->apellido_materno,                
                'motivo' => $visitante->motivo,
                'genero' => $visitante->genero,
            ]);
        }

        return response()->json(['error' => 'ID no encontrado.'], 404);
    }
// public function buscar(Request $request)
// {
//     $request->validate([
//         'identificador' => 'required|string|max:300', // Aumenta el tamaño máximo para URLs
//     ]);

//     $identificador = $request->input('identificador');

//     // Verificar si es una URL
//     if (filter_var($identificador, FILTER_VALIDATE_URL)) {
//         // Extraer el id entre 'datos=' y '='
//         if (preg_match('/datos=([^=]+)=/', $identificador, $matches)) {
//             $id = $matches[1];
//         } else {
//             return response()->json(['error' => 'No se encontró un identificador válido en la URL.'], 400);
//         }
//     } else {
//         // Caso de identificador numérico directo
//         $id = $identificador;
//     }

//     // Buscar en comunidad
//     $comunidad = Comunidad::with(['oferta', 'puesto'])->where('id_institucional', $id)->first();
//     if ($comunidad) {
//         return response()->json([
//             'tipo' => 'comunidad',
//             'nombre' => $comunidad->nombre,
//             'apellido_paterno' => $comunidad->apellido_paterno,
//             'apellido_materno' => $comunidad->apellido_materno,
//             'id_oferta' => $comunidad->oferta->oferta ?? 'No asignada',
//             'id_puesto' => $comunidad->puesto->puesto ?? 'Sin puesto asignado',
//             'fotografia' => $comunidad->fotografia
//         ]);
//     }        

//     // Buscar en visitante
//     $visitante = Visitante::where('id_visitante', $id)->first();
//     if ($visitante) {
//         return response()->json([
//             'tipo'   => 'visitante',
//             'nombre' => $visitante->nombre,
//             'apellido_paterno' => $visitante->apellido_paterno,
//             'apellido_materno' => $visitante->apellido_materno,                
//             'motivo' => $visitante->motivo,
//             'genero' => $visitante->genero,
//         ]);
//     }

//     return response()->json(['error' => 'ID no encontrado.'], 404);
// }


    // public function buscar(Request $request)
    // {
    //     $request->validate([
    //         'identificador' => 'required|string|max:20',
    //     ]);

    //     $id = $request->input('identificador');

    //     // Buscar en comunidad
    //     $comunidad = Comunidad::with(['oferta', 'puesto'])->where('id_institucional', $id)->first();

    //     if ($comunidad) {
    //         return response()->json([
    //             'tipo' => 'comunidad',
    //             'nombre' => $comunidad->nombre,
    //             'apellido_paterno' => $comunidad->apellido_paterno,
    //             'apellido_materno' => $comunidad->apellido_materno,
    //             'id_oferta' => $comunidad->oferta->oferta ?? 'No asignada',
    //             'id_puesto' => $comunidad->puesto->puesto ?? 'Sin puesto asignado',
    //             'fotografia' => $comunidad->fotografia
    //         ]);
    //     }        

    //     $visitante = Visitante::where('id_visitante', $id)->first();
    //     if ($visitante) {
    //         return response()->json([
    //             'tipo'   => 'visitante',
    //             'nombre' => $visitante->nombre,
    //             'apellido_paterno' => $visitante->apellido_paterno,
    //             'apellido_materno' => $visitante->apellido_materno,                
    //             'motivo' => $visitante->motivo,
    //             'genero' => $visitante->genero,
    //         ]);
    //     }

    //     return response()->json(['error' => 'ID no encontrado.'], 404);
    // }
}
