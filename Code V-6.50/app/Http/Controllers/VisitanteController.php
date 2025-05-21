<?php
namespace App\Http\Controllers;

use App\Models\Visitante;
use App\Services\IdGeneratorService;
use App\Models\Ingreso;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource. Retorna todos los registros
     */
    // public function index(Request $request): View
    // {

    //     $visitantes = Visitante::all()->sortByDesc('id');// SELETE FROM, mostramos la información pero ordenando como sera mostrada, en que orden.

    //     return view('visitante.index', ['visitantes'=>$visitantes]);

    //     // $visitantes = Visitante::paginate();

    //     // return view('visitante.index', compact('visitantes'))
    //     //     ->with('i', ($request->input('page', 1) - 1) * $visitantes->perPage());
    // }
    public function index(): View
    {
        // Obtener la hora actual del sistema
        $horaActual = Carbon::now();

        // Calcular el límite de tiempo (4 horas antes)
        $limite = $horaActual->subHours(4);

        // Obtener solo los registros creados después del límite
        $visitantes = Visitante::where('created_at', '>=', $limite)
            ->orderByDesc('id')
            ->get();

        return view('visitante.index', ['visitantes' => $visitantes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $visitante = new Visitante();

        return view('visitante.create', compact('visitante'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validamos que todos los campos tienen información
        $request->validate([
            'nombre'           => 'required',
            'apellido_paterno' => 'required',
            'motivo'           => 'required',
            'menor'            => 'required',
        ]);

        $visitante = new Visitante();
        $ingreso = new Ingreso();

        // Llamamos los name del formulario
        $id_visitante     = IdGeneratorService::generateVisitanteId();
        $visitante->id_visitante     = $id_visitante;
        $ingreso->id_visitante     = $id_visitante;
        $visitante->nombre           = $request->nombre;
        $visitante->apellido_paterno = $request->apellido_paterno;
        $visitante->motivo           = $request->motivo;

        if ($request->apellido_materno != "") {
            $visitante->apellido_materno = $request->apellido_materno;
        }

        if ($request->menor == "Menor") {
            $visitante->menor = '1';
        } else {
            $visitante->menor = '0';
        }

        $visitante->reactivacion = '0';

        // Ruta personalizada por visitante
        // $customPath = 'visitantes_2025/' . $visitante->id_visitante . '/identificacion/';// Indica que hay otra carpeta dentro
        $customPath = 'visitantes_2025/' . $visitante->id_visitante;

        // Guardar la identificación
        if ($request->hasFile('file')) {
            // Almacenar el archivo dentro de la carpeta 'visitantes_2025, sin personalizar.
            // $pathIdentificacion = $request->file('file')->store('visitantes_2025', 'public');
            // $visitante->identificacion = $pathIdentificacion;

            // Personalisando la ruta donde se guardara la identificación
            $file     = $request->file('file');
            $filename = 'identificacion_' . Str::random(15) . '.' . $file->getClientOriginalExtension(); // Nombre de la imagen personalizado

            // Guarda la imagen en la carpeta correspondiente
            $pathIdentificacion        = $file->storeAs($customPath, $filename, 'public');
            $visitante->identificacion = $pathIdentificacion;
        
        }elseif($request->numIdenFile != "" && is_numeric($request->numIdenFile)){
            $visitante->numIdenFile = $request->numIdenFile;
        }else{
            // Validamos que todos los campos tienen información
            $request->validate([
                'numIdenFile' => 'required'
            ]);            
        }


                                                                    // Generar imagen QR y guardarla en la misma carpeta
        $qrFileName   = '/qr_' . $visitante->id_visitante . '.png'; // Nombre personalizado del qr
        // https://registroescolar.uacm.edu.mx/app/inicio/index/consultarInformacion?datos=VvK8zHNmUm6PAS/+uc87oqYG09+i/ZEBl6REm0X0O0g=
        
        $urlQR = 'https://registroescolar.uacm.edu.mx/app/inicio/index/consultarInformacion?datos=' . $visitante->id_visitante.'=';
        // $qrImage      = QrCode::format('png')->color(70, 11, 24)->size(250)->generate((string) $visitante->id_visitante);
        
        $qrImage      = QrCode::format('png')->color(70, 11, 24)->size(250)->generate((string) $urlQR);
        $qrCustomName = $customPath . $qrFileName;
        Storage::disk('public')->put($customPath . $qrFileName, $qrImage);
        // Guardar la ruta del QR
        $visitante->code_qr = $customPath . $qrFileName;

        // $visitante->fechas_impresion = date($format = 'Y-m-d H:m:s');
        // Agregar la nueva fecha actual
        $fechas[] = Carbon::now()->format('Y-m-d H:i:s');

        // Guardar el array como JSON en el campo
        $visitante->fechas_impresion = json_encode($fechas);

        $visitante->save(); // Guardamos la información en la DB
        $ingreso->save(); // Guardamos la información en la DB

                                                                                                                       // return Redirect::route('visitantes.index')->with('success', 'Visitante created successfully.');
        return redirect()->route('visitante.index')->with('mensaje', 'Se registro al miembro de la manera correcta.'); // Envíamos a la vista, una vez guardada la infromación
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $visitante = Visitante::find($id);

        return view('visitante.show', compact('visitante'));
    }

    public function generarPDF($id)
    {
        $visitante = Visitante::findOrFail($id);

        // Cargar imagen QR (ya debe estar en 'storage/app/public/visitantes_2025/{id_visitante}/qr.png')
        $uacmPath   = basename('images/uacm.png');
        $qrPath     = 'visitantes_2025/' . $visitante->id_visitante . '/' . basename($visitante->code_qr);

        $qrFullPath = storage_path('app/public/' . $qrPath);
        $uacmFullPath = storage_path('app/public/' . $uacmPath);

        $qrBase64   = base64_encode(file_get_contents($qrFullPath));
        $uacmBase64   = base64_encode(file_get_contents($uacmFullPath));

        $qrDataUri  = 'data:image/png;base64,' . $qrBase64;
        $uacmDataUri  = 'data:image/png;base64,' . $uacmBase64;

        $fecha = Carbon::now()->format('Y-m-d H:i:s');
        
        // Guardar fecha en fechas_impresion
        $fechas = $visitante->fechas_impresion ?? [];
        if (! is_array($fechas)) {
            $fechas = json_decode($fechas, true) ?? [];
        }

        $fechas[]                    = Carbon::now()->format('Y-m-d H:i:s');
        $visitante->fechas_impresion = json_encode($fechas);
        $visitante->save();

        $pdf = Pdf::loadView('visitante.pdf', compact('visitante', 'qrDataUri', 'uacmDataUri', 'fecha'));
        return $pdf->stream('visitante_' . $visitante->id . '.pdf');
    }

}
