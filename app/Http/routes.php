<?php declare(strict_types = 1);

/** @var \Illuminate\Routing\Router $router */

$router->get('/', [
    'uses' => 'FrontEnd\HomeController@home',
    'as'   => 'home',
]);

$router->get('/rsvp/{rsvpId}', [
    'uses' => 'FrontEnd\RsvpController@directRsvp',
    'as'   => 'direct_rsvp',
]);

$router->get('/guest-information', [
    'uses' => 'FrontEnd\HomeController@guestInformation',
    'as'   => 'guest_information',
]);

$router->get('/guests', [
    'uses' => 'FrontEnd\HomeController@guestNames',
    'as'   => 'guest_names',
]);

$router->post('rsvp', [
    'uses' => 'FrontEnd\HomeController@rsvp',
]);