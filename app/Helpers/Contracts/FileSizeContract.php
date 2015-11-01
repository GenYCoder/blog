<?php
	namespace App\Helpers\Contracts;

	Interface FileSizeContract
	{
		public function formatSizeUnits($bytes);
	}