<?php
require 'vendor/autoload.php';
use Symfony\Component\HttpFoundation\Response;
$app = new \Silex\Application();

$app->get('/', function () use ($app) {
  $mysql_db_info = getenv('OPENSHIFT_MYSQL_DB_PASSWORD') ? getenv('OPENSHIFT_MYSQL_DB_PASSWORD') : "UNAVAILABLE";
  $pg_db_info = getenv('OPENSHIFT_POSTGRESQL_DB_PASSWORD') ? getenv('OPENSHIFT_POSTGRESQL_DB_PASSWORD') : "UNAVAILABLE";
  $mongodb_info = getenv('OPENSHIFT_MONGODB_DB_PASSWORD') ? getenv('OPENSHIFT_MONGODB_DB_PASSWORD') : "UNAVAILABLE";
  $legacy_db_info = getenv('LEGACY_DB_PASSWORD') ? getenv('LEGACY_DB_PASSWORD') : "UNAVAILABLE";
  return new Response( "<p>MySQL DB password: {$mysql_db_info}\n<p>Postgres DB password: {$pg_db_info}\n<p>MongoDB password: {$mongodb_info}\n<p>Legacy DB password: {$legacy_db_info}");
});

$app->run();
?>
