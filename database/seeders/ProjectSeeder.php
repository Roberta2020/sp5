<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pr1 = new Project();
        $pr1->project_name = "Hagia Sophia";
        $pr1->project_employees = "Laura";
        $pr1->save();

        $pr2 = new Project();
        $pr2->project_name = "The Guggenheim";
        $pr2->project_employees = "Roberta";
        $pr2->save();

    }
}

