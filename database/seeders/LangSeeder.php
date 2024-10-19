<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Modules\Entity\Model\SysLang\SysLang;

class LangSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {

    SysLang::create(['sys_key' => "ru", 'name' => "Русский",]);
    SysLang::create(['sys_key' => "en", 'name' => "Английский",]);


  }
}