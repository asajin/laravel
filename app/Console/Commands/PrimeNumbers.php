<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use App\Services\Calculator;

class PrimeNumbers extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'prime-numbers';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $number = $this->argument('number');
        for($i = 0; $i<10; $i++)
        {
            echo ' --'.$i;
        }
        
        $calc = new Calculator();
        $sum = $calc->add(3, 4);
        
        $this->comment('num -- '.$number);
        $this->info('sum -- '.$sum);
		//
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['number', InputArgument::REQUIRED, 'max number.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}

}
