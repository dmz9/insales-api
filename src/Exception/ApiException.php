<?php

namespace InsalesApi\Exception;
class ApiException extends \Exception
{
	private $debugInfo = null;

	public function setDebugInfo($mixed)
	{
		$this->debugInfo = $mixed;
	}

	public function getDebugInfo($print = false, $prettyPrint = false)
	{
		if ($print) {
			if ($prettyPrint) {
				print_r("<pre>");
				print_r($this->debugInfo);
				print_r("</pre>");
			} else {
				print_r($this->debugInfo);
			}
		}
		return $this->debugInfo;
	}
}