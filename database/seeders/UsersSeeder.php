<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Ali',
                'email' => 'ali@gmail.com',
                'password' => bcrypt('12341234'),
                'image' => 'https://i.pinimg.com/736x/80/c3/d3/80c3d3b65ea77b492ac0e3eb03b1d94f.jpg',
                'role' => 'user',
            ],
            [
                'id' => 2,
                'name' => 'Fanes',
                'email' => 'fanes@gmail.com',
                'password' => bcrypt('22223333'),
                'image' => 'https://thenubianmessage.com/wp-content/uploads/2019/08/DSC_8631_col.jpg',
                'role' => 'admin',
            ],
            [
                'id' => 3,
                'name' => 'alwi',
                'email' => 'alwi@gmail.com',
                'password' => bcrypt('22224444'),
                'image' => 'https://static8.depositphotos.com/1035372/853/i/450/depositphotos_8532954-stock-photo-ugly-man.jpg',
                'role' => 'user',
            ],
            [
                'id' => 4,
                'name' => 'winsen',
                'email' => 'winsen@gmail.com',
                'password' => bcrypt('22225555'),
                'image' => 'https://images.unsplash.com/photo-1499996860823-5214fcc65f8f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dWdseSUyMHBlb3BsZXxlbnwwfHwwfHx8MA%3D%3D',
                'role' => 'admin',
            ],
            [
                'id' => 5,
                'name' => 'jovan',
                'email' => 'jovan@gmail.com',
                'password' => bcrypt('admin123'),
                'image' => 'https://www.shutterstock.com/image-photo/wet-plate-photo-ancient-strange-260nw-2485887859.jpg',
                'role' => 'admin',
            ]
        ]);
    }
}
