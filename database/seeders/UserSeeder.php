<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                User::insert([

                [
                    'name'=>'admin',
                    'email'=>'admin@yopmail.com',
                    'password'=>Hash::make('superadmin'),
                    'role'=>'admin',
                    'is_active'=>'1',
                    'created_at'=>'1987-05-04 12:25:24',
                    'updated_at'=>'1997-06-05 01:25:45',
                 ],
                 [
                     'name'=>'customer',
                     'email'=>'customer@yopmail.com',
                     'password'=>Hash::make('customer'),
                     'role'=>'customer',
                     'is_active'=>'1',
                     'created_at'=>'1989-05-04 12:25:24',
                     'updated_at'=>'1999-06-05 01:25:45',
                  ],
                  [
                    'name'=>'customer1',
                    'email'=>'customer1@yopmail.com',
                    'password'=>Hash::make('customer1'),
                    'role'=>'customer',
                    'is_active'=>'1',
                    'created_at'=>'1989-05-04 12:25:24',
                    'updated_at'=>'1999-06-05 01:25:45',
                 ],
                 [
                    'name'=>'customer2',
                    'email'=>'customer2@yopmail.com',
                    'password'=>Hash::make('customer2'),
                    'role'=>'customer',
                    'is_active'=>'1',
                    'created_at'=>'1989-05-04 12:25:24',
                    'updated_at'=>'1999-06-05 01:25:45',
                 ],
                 [
                    'name'=>'deliveryAgent1',
                    'email'=>'deliveryAgent1@yopmail.com',
                    'password'=>Hash::make('deliveryAgent1'),
                    'role'=>'deliveryAgent',
                    'is_active'=>'1',
                    'created_at'=>'1984-05-04 12:25:24',
                    'updated_at'=>'1994-06-05 01:25:45',
                 ],
                 [
                    'name'=>'deliveryAgent2',
                    'email'=>'deliveryAgent2@yopmail.com',
                    'password'=>Hash::make('deliveryAgent2'),
                    'role'=>'deliveryAgent',
                    'is_active'=>'1',
                    'created_at'=>'1984-05-04 12:25:24',
                    'updated_at'=>'1994-06-05 01:25:45',
                 ],
                  [
                     'name'=>'deliveryAgent',
                     'email'=>'deliveryAgent@yopmail.com',
                     'password'=>Hash::make('deliveryAgent'),
                     'role'=>'deliveryAgent',
                     'is_active'=>'1',
                     'created_at'=>'1984-05-04 12:25:24',
                     'updated_at'=>'1994-06-05 01:25:45',
                  ],


            ]);
        //User::factory()->count(250)->create();
    }
}
