.PHONY: tests
tests: test_score_keeper_kata test_gilded_rose_refactoring_kata

.PHONY: test_score_keeper_kata
test_score_keeper_kata:
	cd score-keeper-kata && composer install && ./vendor/bin/phpunit --colors --testsuite scorekeeper

.PHONY: test_gilded_rose_refactoring_kata
test_gilded_rose_refactoring_kata:
	cd gilded-rose-refactoring-kata && ruby gilded_rose_tests.rb