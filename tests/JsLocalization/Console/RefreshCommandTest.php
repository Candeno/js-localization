<?php

use Mockery as m;
use JsLocalization\Console\RefreshCommand;

class RefreshCommandTest extends TestCase
{
	public function tearDown(): void
	{
		m::close();

		parent::tearDown();
	}

	public function testNoLocalesConfigException()
	{
		Config::set('js-localization.locales', null);

		$this->expectException(Exception::class);

		$this->runCommand();
	}

	protected function runCommand()
	{
		$cmd = new RefreshCommand();

		$cmd->setLaravel(app(Illuminate\Contracts\Foundation\Application::class));

		$cmd->run(
			new Symfony\Component\Console\Input\ArrayInput([]),
			new Symfony\Component\Console\Output\NullOutput()
		);
	}
}
