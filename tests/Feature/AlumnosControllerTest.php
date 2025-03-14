<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnosControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_muestra_listado(): void
    {
        $response = $this->get(route('alumnos.index'));

        $response->assertStatus(200);
    }
    /**@test */
    public function muestra_formulario():void{
        
    }
}
