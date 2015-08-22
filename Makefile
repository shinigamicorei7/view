PHPUNIT := ./vendor/phpunit/phpunit/phpunit

tests:
	$(PHPUNIT) -v --bootstrap vendor/autoload.php test