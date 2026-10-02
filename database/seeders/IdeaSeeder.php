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
            'descripcion' => 'Sistema para ofrecer cursos y
            materiales educativos presenciales.',
            'estado' => 'registrada',
            'autor' => 'Susy',
            'categoria_id' => 2
        ]);
    }
}