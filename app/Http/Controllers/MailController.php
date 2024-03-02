<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $names = Auth::user()->name;
        // Configuración del servidor IMAP
        $correo = Auth::user()->email;
        $contrasena = 'farea321*.*';
        $nombreServidor = setting('emailconfig.Servidor');
        $puerto = setting('emailconfig.puerto');
        $protocolo = setting('emailconfig.encriptacion');
        $bandeja = 'INBOX';

        // Construir la cadena del servidor IMAP
        $servidor = sprintf('{%s:%d/imap/%s}%s', $nombreServidor, $puerto, $protocolo, $bandeja);
        
        // Intentar abrir la conexión IMAP
        $conexion = imap_open($servidor, $correo, $contrasena);

        // Verificar si la conexión fue exitosa
        if (!$conexion) {
            die('No se pudo abrir la conexión IMAP');
        }

        // Obtener información sobre los correos electrónicos (aquí puedes personalizar según tus necesidades)
        $correos = imap_search($conexion, 'ALL');

        // Obtener detalles de cada correo
        $detallesCorreos = [];
        foreach ($correos as $correoId) {
            $headerInfo = imap_headerinfo($conexion, $correoId);

            // Asegurarse de que la clave 'date' esté definida
            $date = isset($headerInfo->date) ? date('Y-m-d H:i:s', strtotime($headerInfo->date)) : 'Fecha no disponible';

            // Obtener el 'message_id' desde el encabezado del correo
            $messageId = isset($headerInfo->message_id) ? $headerInfo->message_id : 'ID no disponible';

            $detallesCorreo = imap_fetch_overview($conexion, $correoId, 0);

            // Verificar si la clave 'subject' existe antes de intentar acceder a ella
            $detallesCorreo['subject'] = isset($detallesCorreo['subject']) ? mb_convert_encoding($detallesCorreo['subject'], 'UTF-8', 'auto') : 'Asunto no disponible';

            // Verificar si la clave 'from' existe antes de intentar acceder a ella
            $detallesCorreo['from'] = isset($detallesCorreo['from']) ? mb_convert_encoding($detallesCorreo['from'], 'UTF-8', 'auto') : 'Remitente no disponible';

            $detallesCorreos[] = $detallesCorreo;

            // $detallesCorreos[] = [
            //     'message_id' => $messageId,
            //     'subject' => $detallesCorreo['subject'],
            //     'from' => $detallesCorreo['from'],
            //     'date' => $date,
            // ];
        }

        // Ordenar los correos por fecha de más reciente a más antiguo
        usort($detallesCorreos, function ($a, $b) {
            // Verificar si las claves 'date' existen antes de intentar acceder a ellas
            $timestampA = isset($a['date']) ? strtotime($a['date']) : 0;
            $timestampB = isset($b['date']) ? strtotime($b['date']) : 0;

            return $timestampB - $timestampA;
        });

        // Paginar los correos
        $perPage = 50; // Número de correos por página
        $currentPage = LengthAwarePaginator::resolveCurrentPage('page');

        $correosPaginados = new LengthAwarePaginator(
            array_slice($detallesCorreos, ($currentPage - 1) * $perPage, $perPage),
            count($detallesCorreos),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        // Cerrar la conexión IMAP
        imap_close($conexion);
        // Pasar los resultados a una vista
        //return view('correo.lista', ['correos' => $detallesCorreos]);


        return view('mails.browse', compact('names'), ['correos' => $correosPaginados]);
    }

    public function list()
    {
        $paginate = request('paginate') ?? 25;
        $user = Auth::user()->email;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
