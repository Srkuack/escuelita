<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Alumno;

class AlumnosControllerTest extends TestCase
{
    use RefreshDatabase; // Esto asegura que cada prueba se ejecute en una base de datos limpia.

    // Mostrar la lista de alumnos
    public function test_muestra_listado(): void
    {
        $response = $this->get(route('alumnos.index'));
        $response->assertStatus(200);
    }

    // Mostrar el formulario de creación
    public function test_muestra_formulario_para_crear_alumno(): void
    {
        $response = $this->get(route('alumnos.create'));
        $response->assertStatus(200);
    }

    // Mostrar el formulario para editar un alumno
    public function test_muestra_formulario_para_editar_alumno(): void
    {
        $alumno = Alumno::factory()->create(); // Crear un alumno en la base de datos

        $response = $this->get(route('alumnos.edit', $alumno->id)); // Usar el id del alumno
        $response->assertStatus(200);
    }

    // Mostrar los datos de un alumno
    public function test_muestra_datos_de_un_alumno(): void
    {
        $alumno = Alumno::factory()->create(); // Crear un alumno en la base de datos

        $response = $this->get(route('alumnos.show', $alumno->id)); // Usar el id del alumno
        $response->assertStatus(200);
        $response->assertSee($alumno->nombre); // Asegurarse de que el nombre del alumno esté en la vista
    }

    // Crear un nuevo alumno
    public function test_crear_nuevo_alumno(): void
    {
        $alumno = Alumno::factory()->make(); // Crear un alumno en memoria (sin guardar en la DB)

        $response = $this->post(route('alumnos.store'), $alumno->toArray()); // Enviar el formulario para crear

        $this->assertDatabaseHas('alumnos', $alumno->only(['nombre', 'correo', 'fecha_nacimiento', 'ciudad'])); // Verificar que el alumno fue guardado

        $response->assertRedirect(route('alumnos.index')); // Verificar que redirige correctamente
    }

    // Editar un alumno
    public function test_editar_alumno(): void
    {
        $alumno = Alumno::factory()->create(); // Crear y guardar el alumno

        // Modificar algunos datos del alumno
        $alumno->nombre = 'Nuevo Nombre';
        $alumno->correo = 'nuevo@correo.com';

        $response = $this->put(route('alumnos.update', $alumno), $alumno->toArray()); // Pasa el objeto completo

        // Verificar que los nuevos datos fueron guardados en la DB
        $this->assertDatabaseHas('alumnos', [
            'id' => $alumno->id,
            'nombre' => 'Nuevo Nombre',
            'correo' => 'nuevo@correo.com'
        ]);

        //$response->assertRedirect(route('alumnos.index')); // Verificar redirección
    }

    // Eliminar un alumno
    public function test_eliminar_alumno(): void
    {
        $alumno = Alumno::factory()->create(); // Crear un alumno y guardarlo en la base de datos

        $response = $this->delete(route('alumnos.destroy', $alumno->id)); // Enviar solicitud para eliminar

        // Verificar que el alumno ya no está en la base de datos
        $this->assertDatabaseMissing('alumnos', ['id' => $alumno->id]);

        $response->assertRedirect(route('alumnos.index')); // Verificar redirección
    }
}
