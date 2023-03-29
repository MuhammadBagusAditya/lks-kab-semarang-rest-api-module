<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Regional;
use App\Models\Spot;
use App\Models\User;
use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                "id_card_number" => "3309172203060002",
                "name" => "muhammad bagus aditya",
                "born_date" => "2006-03-22",
                "gender" => "male",
                "address" => "Reksosari, Suruh, Semarang",
                "password" => bcrypt("bagusaditya"),
                "regional_id" => 1,
            ],
            [
                "id_card_number" => "3309172203060001",
                "name" => "lutfi alvaro",
                "born_date" => "2006-02-26",
                "gender" => "male",
                "address" => "Tengaran, Salatiga",
                "password" => bcrypt("lutfi"),
                "regional_id" => 1,
            ],
            [
                "id_card_number" => "3309172203060003",
                "name" => "nathanael okta",
                "born_date" => "2005-12-10",
                "gender" => "male",
                "address" => "Bandung",
                "password" => bcrypt("nael"),
                "regional_id" => 2,
            ],
            [
                "id_card_number" => "3309172203060004",
                "name" => "ilham maulana",
                "born_date" => "2007-01-01",
                "gender" => "male",
                "address" => "Bandung",
                "password" => bcrypt("ilham"),
                "regional_id" => 2,
            ],
            [
                "id_card_number" => "3309172203060005",
                "name" => "adeliya",
                "born_date" => "2005-11-04",
                "gender" => "female",
                "address" => "Surabaya",
                "password" => bcrypt("adeliya"),
                "regional_id" => 3,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $regionals = [
            [
                "province" => "Central Java",
                "district" => "Semarang"
            ],
            [
                "province" => "West Java",
                "district" => "Bandung"
            ],
            [
                "province" => "East Java",
                "district" => "Surabaya"
            ],
        ];

        foreach ($regionals as $regional) {
            Regional::create($regional);
        }

        $spots = [
            [
                "name" => "Purnawati Hospital",
                "address" => "Salatiga",
                "serve" => 2,
                "capacity" => 15,
                "regional_id" => 1,
                "available_vaccines" => json_encode([
                    "Sinovac" => false,
                    "AstraZeneca" => true,
                    "Moderna" => false,
                    "Pfizer" => true,
                    "Sinnopharm" => true
                ])
            ],
            [
                "name" => "Diponegoro Hospital",
                "address" => "Semarang",
                "serve" => 3,
                "capacity" => 30,
                "regional_id" => 1,
                "available_vaccines" => json_encode([
                    "Sinovac" => true,
                    "AstraZeneca" => true,
                    "Moderna" => true,
                    "Pfizer" => true,
                    "Sinnopharm" => true
                ])
            ],
            [
                "name" => "Kartini Hospital",
                "address" => "Surabaya",
                "serve" => 3,
                "capacity" => 20,
                "regional_id" => 3,
                "available_vaccines" => json_encode([
                    "Sinovac" => true,
                    "AstraZeneca" => true,
                    "Moderna" => false,
                    "Pfizer" => false,
                    "Sinnopharm" => true
                ])
            ],
            [
                "name" => "Soekarno Hospital",
                "address" => "Surabaya",
                "serve" => 3,
                "capacity" => 35,
                "regional_id" => 3,
                "available_vaccines" => json_encode([
                    "Sinovac" => false,
                    "AstraZeneca" => false,
                    "Moderna" => true,
                    "Pfizer" => true,
                    "Sinnopharm" => true
                ])
            ],
            [
                "name" => "Hatta Hospital",
                "address" => "Bandung",
                "serve" => 1,
                "capacity" => 10,
                "regional_id" => 2,
                "available_vaccines" => json_encode([
                    "Sinovac" => true,
                    "AstraZeneca" => true,
                    "Moderna" => false,
                    "Pfizer" => false,
                    "Sinnopharm" => false
                ])
            ],
        ];

        foreach ($spots as $spot) {
            Spot::create($spot);
        }

        $vaccinations = [
            [
                "id_card_number" => "3309172203060001",
                "spot_id" => 1,
                "vaccine" => "Sinovac",
                "vaccinator" => "Dr. Pramu"
            ],
            [
                "id_card_number" => "3309172203060003",
                "spot_id" => 1,
                "vaccine" => "Sinovac",
                "vaccinator" => "Dr. Pramu"
            ],
            [
                "id_card_number" => "3309172203060004",
                "spot_id" => 1,
                "vaccine" => "Sinovac",
                "vaccination_at" => "2023-03-10",
                "vaccinator" => "Dr. Pramu"
            ],
            [
                "id_card_number" => "3309172203060005",
                "spot_id" => 3,
                "vaccine" => "Pfizer",
                "vaccinator" => "Dr. Wisnu"
            ],
        ];

        //foreach ($vaccinations as $vaccination) {
        //    Vaccination::create($vaccination);
        //}
    }
}
