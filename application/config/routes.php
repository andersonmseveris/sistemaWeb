<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Pessoas_controller/consultarUltimosCadastros';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Pessoas Controller 
$route['desaparecidos'] = 'Pessoas_controller/listarDesaparecidos';
$route['consulta/(:num)'] = 'Pessoas_controller/consultarDesaparecidos/$1';
$route['cadastroPessoa'] = 'Pessoas_controller/cadastroPessoa';
$route['consultarDesaparecidosFiltro'] = 'Pessoas_controller/consultarDesaparecidosFiltro';
$route['emailViEstaPessoa/(:num)'] = 'Pessoas_controller/emailViEstaPessoa/$1';
$route['emailCadastroIndevido/(:num)'] = 'Pessoas_controller/emailCadastroIndevido/$1';
$route['encontrados'] = 'Pessoas_controller/listarEncontrados';
$route['download'] = 'Pessoas_controller/download';
$route['dashboard'] = 'Pessoas_controller/dashboard';

//Captcha Controller
$route['captcha'] = 'Captcha_controller/form';
$route['refresh'] = 'Captcha_controller/captcha_refresh';
$route['create'] = 'Captcha_controller/create_captcha';
$route['setting'] = 'Captcha_controller/captcha_setting';
$route['captcha/json'] = 'Captcha_controller/json';
$route['captcha/getJson'] = 'Captcha_controller/getJson';

//Navegação página
$route['cadastro'] = 'Page/cadastro';
$route['infoApoio'] = 'Page/infoApoio';
$route['linksUteis'] = 'Page/linksUteis';
$route['parcerias'] = 'Page/parcerias';
$route['completarCadastro'] = 'Page/completarCadastro';
$route['completarCidades/(:num)'] = 'Page/getCidades/$1';


//Testes
$route['teste2'] = 'Pessoas_controller/teste2';
