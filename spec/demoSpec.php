<?php

use demo\Greeter;
use kahlan\plugin\Monkey;

describe("Demo", function() {
	it('should demonstrate simple assertions', function() {
		expect(2 + 2)->toEqual(4);
	});

	it('should demonstrate not assertions', function() {
		expect(2 + 2)->not->toEqual(5);
	});

	describe("nested suites", function() {
		beforeEach(function() {
			$this->_variable = 0;
		});

		it('should initialise the variable', function() {
			expect($this->_variable)->toEqual(0);
			$this->_variable += 1;
		});

		it('should call beforeEach before parallel calls', function() {
			expect($this->_variable)->toEqual(0);
		});
	});

	it('should close over properties', function() {
		$fn = function() {
			var_dump($this->_variable);
		};

		expect($fn)->toThrow();
	});

	describe('Greeter', function() {
		it('should say good evening', function() {
			expect(Greeter::greet())->toEqual('Good Evening');
		});

		it('should say good afternoon', function() {
			Monkey::patch('date', function() {
				return "14";
			});

			expect(Greeter::greet())->toEqual('Good Afternoon');
		});

		it('should say good morning', function() {
			Monkey::patch('date', function() {
				return "11";
			});

			expect(Greeter::greet())->toEqual('Good Morning');
		});
	});
});
