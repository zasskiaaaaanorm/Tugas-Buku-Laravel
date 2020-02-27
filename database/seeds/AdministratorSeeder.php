<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@larashop.test";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("larashop");
        $administrator->avatar = "0.png";
        $administrator->address = "Sarmili, Bintaro, Tangerang Selatan";
        $administrator->phone = "0812345678";

        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");

        $administrator =  new \App\Category;
        $administrator->name = "Zaskia";
        $administrator->slug = "slug";
        $administrator->roles = json_encode(["ADMIN / CUSTOMER"]);
        $administrator->image = "0.png";
        
        $administrator->save();

        $this->command->info("Category Customer berhasil diinsert");
    }
}