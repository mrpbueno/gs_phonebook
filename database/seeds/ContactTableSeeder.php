<?php

use App\Contact;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = (int)$this->command->ask('How many contacts do you need? (Test only)', 0);
        $this->command->info("Creating {$count} contact.");
        factory(Contact::class, $count)->create();
        $this->command->info('Contact Created!');
    }
}
