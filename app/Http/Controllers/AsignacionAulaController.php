<?php

namespace App\Http\Controllers;

use App\Models\AsignacionAula;
use App\Models\AsignacionAulaDia;
use App\Models\AsignacionPrevia;
use App\Models\Aula;
use Illuminate\Http\Request;
use App\Models\Historial;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\DB;

class AsignacionAulaController extends Controller
{
    // public function confirmarAsignaciones(Request $request)
    // {
    //     // Obtener los datos del formulario
    //     $confirmaciones = $request->input('confirmar', []);

    //     // Recorrer las asignaciones seleccionadas
    //     foreach ($confirmaciones as $asignacionId => $confirmado) {
    //         if ($confirmado) {
    //             // Obtener la asignación de aula
    //             $asignacionAula = AsignacionAula::find($asignacionId);

    //             if ($asignacionAula) {
    //                 // Crear un nuevo historial con los datos necesarios
    //                 $historial = new Historial([
    //                     'asignacion_aulas_id' => $asignacionAula->id,
    //                     'user_id' => auth()->user()->id,
    //                     'fecha' => now(),
    //                 ]);

    //                 // Guardar el historial
    //                 $historial->save();

    //                 // Aquí puedes realizar otras acciones si es necesario
    //             }
    //         }
    //     }

    //     // Realizar otras acciones según sea necesario

    //     // Redireccionar o devolver una respuesta
    //     return redirect()->back()->with('success', 'Asignaciones confirmadas exitosamente.');
    // }

    public function confirmarAsignaciones(Request $request)
{
    // Obtener los datos del formulario
    $asignaciones = $request->input('confirmar', []);

    foreach ($asignaciones as $asignacionId => $confirmar) {
        // Obtener la asignación de aula
        $asignacionAula = AsignacionAula::find($asignacionId);

        if ($asignacionAula && $confirmar) {
            // Crear un nuevo historial con los datos necesarios
            $historial = new Historial([
                'materia' => optional($asignacionAula->asignacion_previas->materias)->nombre,
                'docente' => optional($asignacionAula->asignacion_previas->docentes)->nombre,
                'turno' => optional($asignacionAula->asignacion_previas->turnos)->nombre,
                'aula' => optional($asignacionAula->aulas)->nombre,
                'capacidad' => optional($asignacionAula->aulas)->capacidad,
                'dias' => implode(', ', $asignacionAula->dias->pluck('dia')->toArray()),
                'cantidad_dias' => $request->input("cantidad_dias.$asignacionId"),
                'cantidad_estudiantes' => $request->input("cantidad_estudiantes.$asignacionId"),
                'confirmado' => $confirmar,
                'user_id' => auth()->user()->id, // Puedes ajustar esto según cómo obtienes el ID del usuario
                'fecha' => now(), // Fecha actual
            ]);

            // Guardar el historial
            $historial->save();

            // Aquí puedes realizar otras acciones si es necesario
        }
    }

    // Realizar otras acciones según sea necesario

    // Redireccionar o devolver una respuesta
    return redirect()->back()->with('success', 'Asignaciones confirmadas exitosamente.');
}

    public function vaciarAsignacionPrevia()
    {
        AsignacionPrevia::truncate();

        return redirect()->back()->with('success', 'Tabla asignacionPrevia vaciada correctamente.');
    }

    public function vaciarAsignacionAula()
    {
        AsignacionAula::truncate();

        return redirect()->back()->with('success', 'Tabla asignacionAula vaciada correctamente.');
    }
    public function vaciarAsignacionAulaDia()
    {
        // Elimina todos los registros en la tabla asignacion_aula_dia
        DB::table('asignacion_aula_dia')->truncate();
    
        return redirect()->back()->with('success', 'Registros en la tabla asignacion_aula_dia eliminados correctamente.');
    }
   
}
