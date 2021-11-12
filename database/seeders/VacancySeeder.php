<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vacancies')->insert([
            'name' => 'Vacante num 1',
            'slug' => Str::slug('Vacante num 1'),
            'folio' => '1312561',
            'descripcion' => 'Consequat ipsum reprehenderit fugiat eiusmod fugiat excepteur excepteur enim nostrud reprehenderit sint labore in. Reprehenderit eu sunt laboris sint aliquip. Lorem sint qui est reprehenderit qui nisi.',
            'acta' => 0,
            'ine' => 0,
            'cv' => 1,
            'ced_prof' => 0,
            'ced_esp' => 0,
            'doc_migr' => 1,
            'cert_med' => 0,
            'cert_prep' => 0,
            'cert_prep_tec' => 0,
            'curp' => 1,
            'licencia_manejo' => 1,
            'comprobante_domicilio' => 0,
            'category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('vacancies')->insert([
            'name' => 'Vacante num 2',
            'slug' => Str::slug('Vacante num 2'),
            'folio' => '1312562',
            'descripcion' => 'Consequat ipsum reprehenderit fugiat eiusmod fugiat excepteur excepteur enim nostrud reprehenderit sint labore in. Reprehenderit eu sunt laboris sint aliquip. Lorem sint qui est reprehenderit qui nisi.',
            'acta' => 0,
            'ine' => 0,
            'cv' => 1,
            'ced_prof' => 0,
            'ced_esp' => 0,
            'doc_migr' => 1,
            'cert_med' => 0,
            'cert_prep' => 0,
            'cert_prep_tec' => 0,
            'curp' => 1,
            'licencia_manejo' => 1,
            'comprobante_domicilio' => 0,
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('vacancies')->insert([
            'name' => 'Vacante num 3',
            'slug' => Str::slug('Vacante num 3'),
            'folio' => '1312563',
            'descripcion' => 'Consequat ipsum reprehenderit fugiat eiusmod fugiat excepteur excepteur enim nostrud reprehenderit sint labore in. Reprehenderit eu sunt laboris sint aliquip. Lorem sint qui est reprehenderit qui nisi.',
            'acta' => 0,
            'ine' => 0,
            'cv' => 1,
            'ced_prof' => 0,
            'ced_esp' => 0,
            'doc_migr' => 1,
            'cert_med' => 0,
            'cert_prep' => 0,
            'cert_prep_tec' => 0,
            'curp' => 1,
            'licencia_manejo' => 1,
            'comprobante_domicilio' => 0,
            'category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('vacancies')->insert([
            'name' => 'Vacante num 4',
            'slug' => Str::slug('Vacante num 4'),
            'folio' => '1312564',
            'descripcion' => 'Consequat ipsum reprehenderit fugiat eiusmod fugiat excepteur excepteur enim nostrud reprehenderit sint labore in. Reprehenderit eu sunt laboris sint aliquip. Lorem sint qui est reprehenderit qui nisi.',
            'acta' => 0,
            'ine' => 0,
            'cv' => 1,
            'ced_prof' => 0,
            'ced_esp' => 0,
            'doc_migr' => 1,
            'cert_med' => 0,
            'cert_prep' => 0,
            'cert_prep_tec' => 0,
            'curp' => 1,
            'licencia_manejo' => 1,
            'comprobante_domicilio' => 0,
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        //
    }
}
