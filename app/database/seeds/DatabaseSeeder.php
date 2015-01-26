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
	}
}
