<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Dump extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            $data = [
                // 'no'  => $i + 1,
                // 'id'  => $faker->uuid,
                'nama' => $faker->name,
                'asal_sekolah' => $faker->streetAddress,
                'no_telp' => $faker->phoneNumber,
                'status_pembayaran' => 'pending',
                'program' => 'Reguler',
                'program_studi' => 'Bisnis Digital',
                'created_at' => $faker->dateTimeBetween($startDate = '-2 weeks', $endDate = 'now')->format('Y-m-d h:i:s'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 weeks', $endDate = 'now')->format('Y-m-d h:i:s'),
                'email' => $faker->email,
                'slug' => $faker->word,
                'status' => $faker->numberBetween(0, 2),
            ];
            $this->db->table('prospect')->insert($data);
        }
    }
}
