<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\DataBaseController;

class MainController extends Controller
{
    // private $funciones_control_base_datos = new DataBaseController;
    public function pruebas(Request $modificar_cliente)
    {
        $funciones_control_base_datos = new DataBaseController;
        $clientes = $funciones_control_base_datos->obtener_clientes();
        if ($modificar_cliente['selectClientes'] == '') {
            return view('pruebas')->with('clientes', $clientes);
        }
        dump($modificar_cliente);

        // Accedemos a cada recurso de la request:
        // foreach ($modificar_cliente->request as $key => $value) {
        //     dump($key);
        //     dump($value);
        // }

        // $id_cliente = $modificar_cliente['selectClientes'];
        $id_cliente = 'is3137';

        $datos_cliente_seleccionado = $funciones_control_base_datos->obtener_datos_cliente($id_cliente);
        $platos_cliente_seleccionado = $funciones_control_base_datos->obtener_platos_cliente($id_cliente);
        $textos_cliente_seleccionado = $funciones_control_base_datos->obtener_texto_dietas_cliente($id_cliente);
        $pesos_cliente_seleccionado = $funciones_control_base_datos->obtener_datos_pesos_grafico($id_cliente);
        // dump($platos_cliente_seleccionado);
        // dump($datos_cliente_seleccionado);
        // dump($textos_cliente_seleccionado);
        // dump($pesos_cliente_seleccionado);
        return view('pruebas')->with('clientes', $clientes)->with('cliente_seleccionado', $datos_cliente_seleccionado)->with('platos_cliente_seleccionado', $platos_cliente_seleccionado)->with('textos_cliente_seleccionado', $textos_cliente_seleccionado)->with('pesos_cliente_seleccionado', $pesos_cliente_seleccionado);
    }

    public function index()
    {
        return view('inicio');
    }

    public function midieta(Request $id_buscado)
    {
        if ($id_buscado['id_cliente_buscado'] == '') {
            return view('midieta');
        }
        $funciones_control_base_datos = new DataBaseController;
        $id_cliente = $id_buscado['id_cliente_buscado'];
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        if ($cliente_existe) {
            $datos_cliente_grafico = $funciones_control_base_datos->obtener_datos_pesos_grafico($id_cliente);
            $platos_cliente = $funciones_control_base_datos->obtener_platos_cliente($id_cliente);
            $texto_cliente = $funciones_control_base_datos->obtener_texto_dietas_cliente($id_cliente);
            return view('midieta')->with('peso_cliente', $datos_cliente_grafico)->with('platos', $platos_cliente)->with('texto_dietas', $texto_cliente);
        } else {
            return view('midieta')->with('mensaje', 'No existe');
        }
    }

    public function nuevadieta(Request $nuevo_cliente)
    {
        $funciones_control_base_datos = new DataBaseController;
        $id_cliente = $nuevo_cliente->id_cliente;
        if ($id_cliente == '') {
            return view('nuevadieta');
        }
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        $cliente_nuevo = [
            "id_cliente" => $nuevo_cliente->id_cliente,
            "nombre_apellidos" => $nuevo_cliente->nombre_apellidos,
            "telefono" => $nuevo_cliente->telefono,
            "email" => $nuevo_cliente->email,
            "direccion" => $nuevo_cliente->direccion,
            "fecha_inicio" => $nuevo_cliente->fecha_inicio,
            "peso_inicial" => $nuevo_cliente->peso_inicial,
            "peso_final_1" => $nuevo_cliente->peso_final_1,
            "peso_final_2" => $nuevo_cliente->peso_final_2
        ];
        if ($cliente_existe) {
            return view('nuevadieta')->with('cliente_existe', true)->with('cliente_nuevo', $cliente_nuevo);
        } else {
            $cliente_guardado = $funciones_control_base_datos->guardar_cliente_nuevo($cliente_nuevo);
            return view('nuevadieta')->with('cliente_guardado', $cliente_guardado);
        }
    }

    public function clientes(Request $id_buscado)
    {
        $funciones_control_base_datos = new DataBaseController;
        $clientes = $funciones_control_base_datos->obtener_clientes();
        if ($id_buscado['selectClientes'] == '') {
            return view('conectado')->with('clientes', $clientes);
        }
        $id_cliente = $id_buscado['selectClientes'];
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        if ($cliente_existe) {
            $datos_cliente_grafico = $funciones_control_base_datos->obtener_datos_pesos_grafico($id_cliente);
            $platos_cliente = $funciones_control_base_datos->obtener_platos_cliente($id_cliente);
            $texto_cliente = $funciones_control_base_datos->obtener_texto_dietas_cliente($id_cliente);
            return view('conectado')->with('clientes', $clientes)->with('peso_cliente', $datos_cliente_grafico)->with('platos', $platos_cliente)->with('texto_dietas', $texto_cliente);
        } else {
            return view('conectado')->with('mensaje', 'No existe');
        }
    }

    public function mensajes()
    {
        $funciones_control_base_datos = new DataBaseController;
        $mensajes_internos = $funciones_control_base_datos->obtener_mensajes_internos();
        $mensajes_externos = $funciones_control_base_datos->obtener_mensajes_externos();
        return view('mensajes')->with('mensajes_internos', $mensajes_internos)->with('mensajes_externos', $mensajes_externos);
    }

    public function comenzarmiplan(Request $id_buscado)
    {
        if ($id_buscado['id_cliente_buscado'] == '') {
            return view('comenzarmiplan');
        }
        $funciones_control_base_datos = new DataBaseController;
        $id_cliente = $id_buscado['id_cliente_buscado'];
        $cliente_existe = $funciones_control_base_datos->comprobar_cliente_existe($id_cliente);
        if ($cliente_existe) {
            $preguntas_clientes = $funciones_control_base_datos->obtener_preguntas_iniciales_cliente($id_cliente);
            return view('comenzarmiplan')->with('preguntas_clientes', $preguntas_clientes)->with('id_cliente', $id_buscado);
        } else {
            return view('comenzarmiplan')->with('mensaje', 'No existe');
        }
    }
}
