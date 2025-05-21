<?php
namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Models\Oferta;
use App\Models\Visitante;
use App\Models\Ingreso;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // -----------------------------
        // PRIMERA GRÁFICA: Entradas por día (comunidad y visitantes)
        // -----------------------------
        $dias          = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        $comunidadData = [];
        $visitanteData = [];

        foreach ($dias as $i => $dia) {
            $fecha           = Carbon::now()->startOfWeek()->addDays($i + 1); // lunes a sábado
            // $comunidadData[] = Comunidad::whereDate('created_at', $fecha->toDateString())->count();
            $visitanteData[] = Ingreso::where('id_institucional')->whereDate('created_at', $fecha->toDateString())->count();
            // $visitanteData[] = \App\Models\Visitante::whereDate('created_at', $fecha->toDateString())->count();
            $comunidadData[] = Ingreso::where('id_visitante')->whereDate('created_at', $fecha->toDateString())->count();
        }

        // -----------------------------
        // SEGUNDA GRÁFICA: Estudiantes por oferta en la semana
        // -----------------------------
        $ofertas    = Oferta::all();
        $labels     = $ofertas->pluck('oferta');
        $diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

        $dataset = [];

        foreach ($ofertas as $oferta) {
            $data = [];

            foreach (range(1, 6) as $i) {
                $fecha    = Carbon::now()->startOfWeek()->addDays($i);
                // $cantidad = Comunidad::whereDate('created_at', $fecha->toDateString())
                $cantidad_id = Ingreso::where('id_visitante')->whereDate('created_at', $fecha->toDateString());
                $cantidad = Comunidad::whereId('id_institucional', $cantidad_id)->whereDate('created_at', $fecha->toDateString())
                    ->where('id_oferta', $oferta->id_oferta)
                    ->count();
                $data[] = $cantidad;
            }

            $dataset[] = [
                'label'           => $oferta->oferta,
                'data'            => $data,
                'borderWidth'     => 1,
                'backgroundColor' => 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ',0.6)',
            ];
        }

        // ============== Funcionalidad para solo mostrar los contenedores númericos
        // Fecha del sistema (solo la parte de la fecha, sin hora)
        $hoy = Carbon::now()->toDateString(); // yyyy-mm-dd

        // Contar registros que fueron creados hoy
        // $comunidadCount = Comunidad::whereDate('created_at', $hoy)->count();
        $visitanteCount = Ingreso::where('id_institucional')->whereDate('created_at', $hoy)->count();
        // $visitanteCount = Visitante::whereDate('created_at', $hoy)->count();
        $comunidadCount = Ingreso::where('id_visitante')->whereDate('created_at', $hoy)->count();

        return view('index', [
            'comunidads'    => $comunidadCount,
            'visitantes'    => $visitanteCount,
            'dias'          => $dias,
            'comunidadData' => $comunidadData,
            'visitanteData' => $visitanteData,
            'diasSemana'    => $diasSemana,
            'labels'        => $labels,
            'dataset'       => $dataset,
        ]);
    }
}
