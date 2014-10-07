<?php

namespace demo;

class Greeter {
	public static function greet() {
		date_default_timezone_set("UTC");
		$hours = (int) date("G");

		if ($hours > 17) {
			return "Good Evening";
		}

		if ($hours > 12) {
			return "Good Afternoon";
		}

		return "Good Morning";
	}
}
