<?php

namespace App\Http\Controllers;

use App\Models\AsignacionAula;
use App\Models\AsignacionPrevia;
use App\Models\Aula;
use Illuminate\Http\Request;
use App\Models\Historial;

class AsignacionAulaController extends Controller
{
    public function confirmarAsignaciones(Request $request)
    {
        // Obtener los datos del formulario
        $confirmaciones = $request->input('confirmar', []);

        // Recorrer las asignaciones seleccionadas
        foreach ($confirmaciones as $asignacionId => $confirmado) {
            if ($confirmado) {
                // Obtener la asignación de aula
                $asignacionAula = AsignacionAula::find($asignacionId);

                if ($asignacionAula) {
                    // Crear un nuevo historial con los datos necesarios
                    $historial = new Historial([
                        'asignacion_aulas_id' => $asignacionAula->id,
                        'user_id' => auth()->user()->id,
                        'fecha' => now(),
                    ]);

                    // Guardar el historial
                    $historial->save();

                    // Aquí puedes realizar otras acciones si es necesario
                }
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
    public function vaciarHistorials()
    {
        // Elimina todos los registros en la tabla historials
        Historial::truncate();

        return redirect()->back()->with('success', 'Tabla historials vaciada correctamente.');
    }
}
