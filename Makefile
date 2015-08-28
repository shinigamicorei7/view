PHPCS := ./vendor/squizlabs/php_codesniffer/scripts/phpcs
PHPCFB := ./vendor/squizlabs/php_codesniffer/scripts/phpcbf
PHPUNIT := ./vendor/phpunit/phpunit/phpunit
PHP_STANDARD ?= PEAR

.PHONY: tests
tests:
	$(PHPCS) --standard=$(PHP_STANDARD) --ignore=test/cache/ src/ tests/
	$(PHPUNIT) -v --bootstrap vendor/autoload.php tests/

.PHONY: autofix
autofix:
	$(PHPCFB) --standard=$(PHP_STANDARD) --ignore=test/cache/ src/ tests/