<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('session', 'database', 'form_validation', 'email', 'upload', 'encrypt');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'html', 'form', 'common', 'file', 'cookie', 'security');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('CommonModal');
