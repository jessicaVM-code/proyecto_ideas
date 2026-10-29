<?php
namespace Database\Seeders;
use App\Models\Idea;
use Illuminate\Database\Seeder;
class IdeaSeeder extends Seeder
{
    public function run(): void
    {
        Idea::firstOrCreate([
            'titulo' => 'Aplicación para organizar citas
            veterinarias',
            'descripcion' => 'Sistema para registrar y organizar
            citas de mascotas.',
            'estado' => 'registrada',
            'autor' => 'Jose',
            'categoria_id' => 1
        ]);
        
        Idea::firstOrCreate([
            'titulo' => 'Plataforma para cursos en línea',
            'descripcion' => 'Sistema para ofrecer cursos y
            materiales educativos.',
            'estado' => 'en revisión',
            'autor' => 'Pedro',
            'categoria_id' => 2
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Plataforma para cursos presenciales',
            'descripcion' => 'Sistema para ofrecer cursos y materiales educativos presenciales.',
            'estado' => 'registrada',
            'autor' => 'Susy',
            'categoria_id' => 2
        ]);

        Idea::firstOrCreate(
            ['titulo' => 'Sistema de control de inventarios'],
            [
                'descripcion' => 'Aplicación para administrar productos y existencias de pequeños negocios.',
                'estado' => 'aprobada',
                'autor' => 'Carlos',
                'categoria_id' => 1
            ]
        );

        Idea::firstOrCreate(
            ['titulo' => 'Aplicación de recordatorios personales'],
            [
                'descripcion' => 'Aplicación para registrar tareas y recibir recordatorios de actividades.',
                'estado' => 'rechazada',
                'autor' => 'Mariana',
                'categoria_id' => 1,
                'observacion' => 'La propuesta es muy similar a aplicaciones existentes y no presenta características nuevas.'
            ]
        );

        Idea::firstOrCreate(
            ['titulo' => 'Sistema de préstamo de libros'],
            [
                'descripcion' => 'Sistema para registrar préstamos y devoluciones de libros en una biblioteca escolar.',
                'estado' => 'aprobada',
                'autor' => 'Ana',
                'categoria_id' => 2
            ]
        );

        Idea::firstOrCreate(
            ['titulo' => 'Plataforma de intercambio de apuntes'],
            [
                'descripcion' => 'Espacio donde los estudiantes pueden compartir materiales y apuntes de sus materias.',
                'estado' => 'rechazada',
                'autor' => 'Luis',
                'categoria_id' => 2,
                'observacion' => 'No se especifica cómo se revisará la calidad y confiabilidad de los materiales compartidos.'
            ]
        );

        Idea::firstOrCreate(
            ['titulo' => 'Aplicación para recordar medicamentos'],
            [
                'descripcion' => 'Aplicación que permite programar recordatorios para tomar medicamentos.',
                'estado' => 'registrada',
                'autor' => 'Sofía',
                'categoria_id' => 3
            ]
        );

        Idea::firstOrCreate(
            ['titulo' => 'Sistema de citas médicas'],
            [
                'descripcion' => 'Sistema para registrar pacientes y administrar citas en un consultorio.',
                'estado' => 'aprobada',
                'autor' => 'Fernando',
                'categoria_id' => 3
            ]
        );

        Idea::firstOrCreate(
            ['titulo' => 'Plataforma de consejos de salud'],
            [
                'descripcion' => 'Sitio web donde los usuarios pueden publicar y consultar consejos sobre salud.',
                'estado' => 'rechazada',
                'autor' => 'Daniela',
                'categoria_id' => 3,
                'observacion' => 'No se contempla la validación de la información por profesionales de la salud.'
            ]
        );

        Idea::firstOrCreate(
            ['titulo' => 'Aplicación para localizar centros de reciclaje'],
            [
                'descripcion' => 'Aplicación que muestra centros de reciclaje cercanos y los materiales que reciben.',
                'estado' => 'en revisión',
                'autor' => 'Roberto',
                'categoria_id' => 4
            ]
        );

        Idea::firstOrCreate(
            ['titulo' => 'Sistema de monitoreo del consumo de agua'],
            [
                'descripcion' => 'Sistema para registrar y consultar el consumo de agua en los hogares.',
                'estado' => 'aprobada',
                'autor' => 'Gabriela',
                'categoria_id' => 4
            ]
        );

        Idea::firstOrCreate(
            ['titulo' => 'Red social para compartir fotografías de plantas'],
            [
                'descripcion' => 'Plataforma donde los usuarios pueden publicar fotografías de plantas.',
                'estado' => 'rechazada',
                'autor' => 'Miguel',
                'categoria_id' => 4,
                'observacion' => 'La propuesta no establece una relación clara con la protección del medio ambiente.'
            ]
        );
    }
}