<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\DistritoController;
use App\Http\Controllers\EstadosDeSimpatiaController;
use App\Http\Controllers\ColoniaController;
use App\Http\Controllers\SectoresController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ComunicacionController;
use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\EleccionesController;
use App\Http\Controllers\CandidatosPorEleccionController;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\OpcionRespuestaController;
use App\Http\Controllers\RespuestaOMController;

use App\Http\Controllers\HistorialEstadoSimpatiaController;
use App\Http\Controllers\LiderController;
use App\Http\Controllers\SimpatizanteController;

use App\Http\Controllers\RespuestaUsuarioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/roles', [RolController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RolController::class, 'create'])->name('roles.create');
Route::post('/roles', [RolController::class, 'store'])->name('roles.store');
Route::get('/roles/{rol}/edit', [RolController::class, 'edit'])->name('roles.edit');
Route::get('/roles/{id}', [RolController::class, 'show'])->name('roles.show');
Route::put('/roles/{rol}', [RolController::class, 'update'])->name('roles.update');
Route::delete('/roles/{rol}', [RolController::class, 'destroy'])->name('roles.destroy');







// Ruta para mostrar el formulario de creación de usuarios
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Ruta para guardar un nuevo usuario
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Ruta para mostrar la lista de usuarios
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Ruta para mostrar los detalles de un usuario específico
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

// Ruta para mostrar el formulario de edición de un usuario
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Ruta para actualizar los datos de un usuario
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Ruta para eliminar un usuario
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



Route::get('/distritos', [DistritoController::class, 'index'])->name('distritos.index');
Route::get('/distritos/create', [DistritoController::class, 'create'])->name('distritos.create');
Route::post('/distritos', [DistritoController::class, 'store'])->name('distritos.store');
Route::get('/distritos/{distrito}', [DistritoController::class, 'show'])->name('distritos.show');
Route::get('/distritos/{distrito}/edit', [DistritoController::class, 'edit'])->name('distritos.edit');
Route::put('/distritos/{distrito}', [DistritoController::class, 'update'])->name('distritos.update');
Route::delete('/distritos/{distrito}', [DistritoController::class, 'destroy'])->name('distritos.destroy');
//-------------------------------------------------



Route::get('/estados-de-simpatia', [EstadosDeSimpatiaController::class, 'index'])->name('estadosdesimpatia.index');
Route::get('/estados-de-simpatia/create', [EstadosDeSimpatiaController::class, 'create'])->name('estadosdesimpatia.create');
Route::post('/estados-de-simpatia', [EstadosDeSimpatiaController::class, 'store'])->name('estadosdesimpatia.store');
Route::get('/estados-de-simpatia/{id}', [EstadosDeSimpatiaController::class, 'show'])->name('estadosdesimpatia.show');
Route::get('/estados-de-simpatia/{id}/edit', [EstadosDeSimpatiaController::class, 'edit'])->name('estadosdesimpatia.edit');
Route::put('/estados-de-simpatia/{id}', [EstadosDeSimpatiaController::class, 'update'])->name('estadosdesimpatia.update');
Route::delete('/estados-de-simpatia/{id}', [EstadosDeSimpatiaController::class, 'destroy'])->name('estadosdesimpatia.destroy');


Route::get('/colonias', [ColoniaController::class, 'index'])->name('colonias.index');
Route::get('/colonias/create', [ColoniaController::class, 'create'])->name('colonias.create');
Route::post('/colonias', [ColoniaController::class, 'store'])->name('colonias.store');
Route::get('/colonias/{id}', [ColoniaController::class, 'show'])->name('colonias.show');
Route::get('/colonias/{id}/edit', [ColoniaController::class, 'edit'])->name('colonias.edit');
Route::put('/colonias/{id}', [ColoniaController::class, 'update'])->name('colonias.update');
Route::delete('/colonias/{id}', [ColoniaController::class, 'destroy'])->name('colonias.destroy');


Route::get('/sectores', [SectoresController::class, 'index'])->name('sectores.index');
Route::get('/sectores/create', [SectoresController::class, 'create'])->name('sectores.create');
Route::post('/sectores', [SectoresController::class, 'store'])->name('sectores.store');
Route::get('/sectores/{id}', [SectoresController::class, 'show'])->name('sectores.show');
Route::get('/sectores/{id}/edit', [SectoresController::class, 'edit'])->name('sectores.edit');
Route::put('/sectores/{id}', [SectoresController::class, 'update'])->name('sectores.update');
Route::delete('/sectores/{id}', [SectoresController::class, 'destroy'])->name('sectores.destroy');


Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index');
Route::get('/personas/create', [PersonaController::class, 'create'])->name('personas.create');
Route::post('/personas', [PersonaController::class, 'store'])->name('personas.store');
Route::get('/personas/{id}', [PersonaController::class, 'show'])->name('personas.show');
Route::get('/personas/{id}/edit', [PersonaController::class, 'edit'])->name('personas.edit');
Route::put('/personas/{id}', [PersonaController::class, 'update'])->name('personas.update');
Route::delete('/personas/{id}', [PersonaController::class, 'destroy'])->name('personas.destroy');

Route::get('/comunicaciones', [ComunicacionController::class, 'index'])->name('comunicaciones.index');
Route::get('/comunicaciones/create', [ComunicacionController::class, 'create'])->name('comunicaciones.create');
Route::post('/comunicaciones', [ComunicacionController::class, 'store'])->name('comunicaciones.store');
Route::get('/comunicaciones/{id}', [ComunicacionController::class, 'show'])->name('comunicaciones.show');
Route::get('/comunicaciones/{id}/edit', [ComunicacionController::class, 'edit'])->name('comunicaciones.edit');
Route::put('/comunicaciones/{id}', [ComunicacionController::class, 'update'])->name('comunicaciones.update');
Route::delete('/comunicaciones/{id}', [ComunicacionController::class, 'destroy'])->name('comunicaciones.destroy');

Route::get('/candidatos', [CandidatosController::class, 'index'])->name('candidatos.index');
Route::get('/candidatos/create', [CandidatosController::class, 'create'])->name('candidatos.create');
Route::post('/candidatos', [CandidatosController::class, 'store'])->name('candidatos.store');
Route::get('/candidatos/{id}', [CandidatosController::class, 'show'])->name('candidatos.show');
Route::get('/candidatos/{id}/edit', [CandidatosController::class, 'edit'])->name('candidatos.edit');
Route::put('/candidatos/{id}', [CandidatosController::class, 'update'])->name('candidatos.update');
Route::delete('/candidatos/{id}', [CandidatosController::class, 'destroy'])->name('candidatos.destroy');





Route::get('/elecciones', [EleccionesController::class, 'index'])->name('elecciones.index');
Route::get('/elecciones/create', [EleccionesController::class, 'create'])->name('elecciones.create');
Route::post('/elecciones', [EleccionesController::class, 'store'])->name('elecciones.store');
Route::get('/elecciones/{id}', [EleccionesController::class, 'show'])->name('elecciones.show');
Route::get('/elecciones/{id}/edit', [EleccionesController::class, 'edit'])->name('elecciones.edit');
Route::put('/elecciones/{id}', [EleccionesController::class, 'update'])->name('elecciones.update');
Route::delete('/elecciones/{id}', [EleccionesController::class, 'destroy'])->name('elecciones.destroy');


Route::get('/candidatos_por_eleccion', [CandidatosPorEleccionController::class, 'index'])->name('candidatos_por_eleccion.index');
Route::get('/candidatos_por_eleccion/create', [CandidatosPorEleccionController::class, 'create'])->name('candidatosporeleccion.create');
Route::post('/candidatos_por_eleccion', [CandidatosPorEleccionController::class, 'store'])->name('candidatos_por_eleccion.store');
Route::get('/candidatos_por_eleccion/{id}', [CandidatosPorEleccionController::class, 'show'])->name('candidatos_por_eleccion.show');
Route::get('/candidatos_por_eleccion/{id}/edit', [CandidatosPorEleccionController::class, 'edit'])->name('candidatos_por_eleccion.edit');
Route::put('/candidatos_por_eleccion/{id}', [CandidatosPorEleccionController::class, 'update'])->name('candidatos_por_eleccion.update');
Route::delete('/candidatos_por_eleccion/{id}', [CandidatosPorEleccionController::class, 'destroy'])->name('candidatos_por_eleccion.destroy');




use App\Http\Controllers\TipoComunicacionController;


Route::get('/tipos_comunicaciones', [TipoComunicacionController::class, 'index'])->name('tipos_comunicaciones.index');
Route::get('/tipos_comunicaciones/create', [TipoComunicacionController::class, 'create'])->name('tipos_comunicaciones.create');
Route::post('/tipos_comunicaciones', [TipoComunicacionController::class, 'store'])->name('tipos_comunicaciones.store');
Route::get('/tipos_comunicaciones/{id}', [TipoComunicacionController::class, 'show'])->name('tipos_comunicaciones.show');
Route::get('/tipos_comunicaciones/{id}/edit', [TipoComunicacionController::class, 'edit'])->name('tipos_comunicaciones.edit');
Route::put('/tipos_comunicaciones/{id}', [TipoComunicacionController::class, 'update'])->name('tipos_comunicaciones.update');
Route::delete('/tipos_comunicaciones/{id}', [TipoComunicacionController::class, 'destroy'])->name('tipos_comunicaciones.destroy');



Route::get('/cuestionarios', [CuestionarioController::class, 'index'])->name('cuestionarios.index');
Route::get('/cuestionarios/create', [CuestionarioController::class, 'create'])->name('cuestionarios.create');
Route::post('/cuestionarios', [CuestionarioController::class, 'store'])->name('cuestionarios.store');
Route::get('/cuestionarios/{id}', [CuestionarioController::class, 'show'])->name('cuestionarios.show');
Route::get('/cuestionarios/{idCuestionario}/edit', [CuestionarioController::class, 'edit'])->name('cuestionarios.edit');
Route::put('/cuestionarios/{id}', [CuestionarioController::class, 'update'])->name('cuestionarios.update');
Route::delete('/cuestionarios/{id}', [CuestionarioController::class, 'destroy'])->name('cuestionarios.destroy');



use App\Http\Controllers\TipoPreguntaController;

Route::get('/tipo_preguntas', [TipoPreguntaController::class, 'index'])->name('tipo_preguntas.index');
Route::get('/tipo_preguntas/create', [TipoPreguntaController::class, 'create'])->name('tipo_preguntas.create');
Route::post('/tipo_preguntas', [TipoPreguntaController::class, 'store'])->name('tipo_preguntas.store');
Route::get('/tipo_preguntas/{id}', [TipoPreguntaController::class, 'show'])->name('tipo_preguntas.show');
Route::get('/tipo_preguntas/{id}/edit', [TipoPreguntaController::class, 'edit'])->name('tipo_preguntas.edit');
Route::put('/tipo_preguntas/{id}', [TipoPreguntaController::class, 'update'])->name('tipo_preguntas.update');
Route::delete('/tipo_preguntas/{id}', [TipoPreguntaController::class, 'destroy'])->name('tipo_preguntas.destroy');

Route::get('/tipo_preguntas/{id}/preguntas', [TipoPreguntaController::class, 'preguntas'])->name('tipo_preguntas.preguntas');
Route::post('/tipo_preguntas/{id}/preguntas', [TipoPreguntaController::class, 'guardarPreguntas'])->name('tipo_preguntas.guardar_preguntas');



Route::get('/preguntas', [PreguntaController::class, 'index'])->name('preguntas.index');
Route::get('/preguntas/create', [PreguntaController::class, 'create'])->name('preguntas.create');
Route::post('/preguntas', [PreguntaController::class, 'store'])->name('preguntas.store');
Route::get('preguntas/{idPregunta}', [PreguntaController::class, 'show'])->name('preguntas.show');
Route::get('/preguntas/{idPregunta}/edit', [PreguntaController::class, 'edit'])->name('preguntas.edit');
Route::put('/preguntas/{idPregunta}', [PreguntaController::class, 'update'])->name('preguntas.update');
Route::delete('preguntas/{idPregunta}', [PreguntaController::class, 'destroy'])->name('preguntas.destroy');
Route::get('cuestionarios/verPreguntas/{idCuestionario}', [CuestionarioController::class, 'verPreguntas'])->name('cuestionarios.verPreguntas');


Route::get('/opcionesrespuestas', [OpcionRespuestaController::class, 'index'])->name('opcionesrespuestas.index');
Route::get('/opcionesrespuestas/create', [OpcionRespuestaController::class, 'create'])->name('opcionesrespuestas.create');
Route::get('/opcionesrespuestas/getPreguntas', [OpcionRespuestaController::class, 'getPreguntas'])->name('opcionesrespuestas.getPreguntasByCuestionario');
Route::post('/opcionesrespuestas/storeRespuestas', [OpcionRespuestaController::class, 'storeRespuestas'])->name('opcionesrespuestas.storeRespuestas');


Route::post('/opcionesrespuestas', [OpcionRespuestaController::class, 'store'])->name('opcionesrespuestas.store');
Route::get('/opcionesrespuestas/{id}', [OpcionRespuestaController::class, 'show'])->name('opcionesrespuestas.show');
Route::get('/opcionesrespuestas/{id}/edit', [OpcionRespuestaController::class, 'edit'])->name('opcionesrespuestas.edit');
Route::put('/opcionesrespuestas/{id}', [OpcionRespuestaController::class, 'update'])->name('opcionesrespuestas.update');
Route::delete('/opcionesrespuestas/{id}', [OpcionRespuestaController::class, 'destroy'])->name('opcionesrespuestas.destroy');


Route::get('/respuestas_om', [RespuestaOMController::class, 'index'])->name('respuestas_om.index');
Route::get('/respuestas_om/create', [RespuestaOMController::class, 'create'])->name('respuestas_om.create');
Route::post('/respuestas_om', [RespuestaOMController::class, 'store'])->name('respuestas_om.store');
Route::get('/respuestas_om/{idOM}', [RespuestaOMController::class, 'show'])->name('respuestas_om.show');
Route::get('/respuestas_om/{idOM}/edit', [RespuestaOMController::class, 'edit'])->name('respuestas_om.edit');
Route::put('/respuestas_om/{idOM}', [RespuestaOMController::class, 'update'])->name('respuestas_om.update');
Route::delete('/respuestas_om/{idOM}', [RespuestaOMController::class, 'destroy'])->name('respuestas_om.destroy');

use App\Http\Controllers\CuestionariosUsuarioController;

Route::get('/cuestionarios_usuario', [CuestionariosUsuarioController::class, 'index'])->name('cuestionarios_usuario.index');
Route::get('/cuestionarios_usuario/create', [CuestionariosUsuarioController::class, 'create'])->name('cuestionarios_usuario.create');
Route::post('/cuestionarios_usuario', [CuestionariosUsuarioController::class, 'store'])->name('cuestionarios_usuario.store');
Route::get('/cuestionarios_usuario/{id}', [CuestionariosUsuarioController::class, 'show'])->name('cuestionarios_usuario.show');
Route::get('/cuestionarios_usuario/{id}/edit', [CuestionariosUsuarioController::class, 'edit'])->name('cuestionarios_usuario.edit');
Route::put('/cuestionarios_usuario/{id}', [CuestionariosUsuarioController::class, 'update'])->name('cuestionarios_usuario.update');
Route::delete('/cuestionarios_usuario/{id}', [CuestionariosUsuarioController::class, 'destroy'])->name('cuestionarios_usuario.destroy');
Route::get('cuestionarios/{idCuestionario}/agregar-preguntas', [CuestionarioController::class, 'agregarPreguntas'])->name('cuestionarios.agregar_preguntas');
Route::get('/cuestionarios/{idCuestionario}/ver-preguntas', [CuestionarioController::class, 'verPreguntas'])->name('cuestionarios.ver_preguntas');
Route::post('/cuestionarios/{idCuestionario}/guardar_preguntas', [CuestionarioController::class, 'guardarPreguntas'])->name('cuestionarios.guardar_preguntas');


Route::get('/respuestas_usuario/create/{idCU}', [RespuestaUsuarioController::class, 'create'])->name('respuestas_usuario.create');


// Rutas de Respuestas de Usuario
Route::get('/respuestas_usuario', [RespuestaUsuarioController::class, 'index'])->name('respuestas_usuario.index');
Route::get('/respuestas_usuario/create', [RespuestaUsuarioController::class, 'create'])->name('respuestas_usuario.create');
Route::post('/respuestas_usuario', [RespuestaUsuarioController::class, 'store'])->name('respuestas_usuario.store');
Route::get('/respuestas_usuario/{idRU}', [RespuestaUsuarioController::class, 'show'])->name('respuestas_usuario.show');
Route::get('/respuestas_usuario/{idRU}/edit', [RespuestaUsuarioController::class, 'edit'])->name('respuestas_usuario.edit');
Route::put('/respuestas_usuario/{idRU}', [RespuestaUsuarioController::class, 'update'])->name('respuestas_usuario.update');
Route::delete('/respuestas_usuario/{idRU}', [RespuestaUsuarioController::class, 'destroy'])->name('respuestas_usuario.destroy');




Route::get('/preguntas/{idCuestionario}', [CuestionarioController::class, 'verPreguntas'])->name('ruta.preguntas');



Route::get('/historialestadossimpatia', [HistorialEstadoSimpatiaController::class, 'index'])->name('historialestadossimpatia.index');
Route::get('/historialestadossimpatia/create', [HistorialEstadoSimpatiaController::class, 'create'])->name('historialestadossimpatia.create');
Route::post('/historialestadossimpatia', [HistorialEstadoSimpatiaController::class, 'store'])->name('historialestadossimpatia.store');
Route::get('/historialestadossimpatia/{id}', [HistorialEstadoSimpatiaController::class, 'show'])->name('historialestadossimpatia.show');
Route::get('/historialestadossimpatia/{id}/edit', [HistorialEstadoSimpatiaController::class, 'edit'])->name('historialestadossimpatia.edit');
Route::put('/historialestadossimpatia/{id}', [HistorialEstadoSimpatiaController::class, 'update'])->name('historialestadossimpatia.update');
Route::delete('/historialestadossimpatia/{id}', [HistorialEstadoSimpatiaController::class, 'destroy'])->name('historialestadossimpatia.destroy');



Route::get('/simpatizantes', [SimpatizanteController::class, 'index'])->name('simpatizantes.index');
Route::get('/simpatizantes/create', [SimpatizanteController::class, 'create'])->name('simpatizantes.create');
Route::post('/simpatizantes', [SimpatizanteController::class, 'store'])->name('simpatizantes.store');
Route::get('/simpatizantes/{id}', [SimpatizanteController::class, 'show'])->name('simpatizantes.show');
Route::get('/simpatizantes/{id}/edit', [SimpatizanteController::class, 'edit'])->name('simpatizantes.edit');
Route::put('/simpatizantes/{id}', [SimpatizanteController::class, 'update'])->name('simpatizantes.update');
Route::delete('/simpatizantes/{id}', [SimpatizanteController::class, 'destroy'])->name('simpatizantes.destroy');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('can:home')->name('home');
