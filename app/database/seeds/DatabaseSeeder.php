<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// Disable Foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		//Static
		$this->call('CountriesSeeder');
		$this->call('ProductCategoryTableSeeder');
		$this->call('ProductBrandTableSeeder');
		$this->call('ProductStatusTableSeeder');
		$this->call('ProductTypeTableSeeder');
		$this->call('PaymentMethodTableSeeder');
		$this->call('TransactionStatusTableSeeder');

		//Relation
		$this->call('UserTableSeeder');
		$this->call('ProfileTableSeeder');
		$this->call('ProductTableSeeder');

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
