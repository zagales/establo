.PHONY: tests
tests: test_score_keeper_kata

.PHONY: test_score_keeper_kata
test_score_keeper_kata:
	cd score-keeper-kata && composer install && ./vendor/bin/phpunit --colors --testsuite scorekeeper