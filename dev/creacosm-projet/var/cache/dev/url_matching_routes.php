<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_index', '_controller' => 'App\\Controller\\RacineController::index'], null, null, null, false, false, null]],
        '/accueil' => [[['_route' => 'app_accueil', '_controller' => 'App\\Controller\\RacineController::accueil'], null, null, null, false, false, null]],
        '/signin' => [[['_route' => 'app_connexion', '_controller' => 'App\\Controller\\RacineController::signin'], null, null, null, false, false, null]],
        '/signup' => [[['_route' => 'app_incription', '_controller' => 'App\\Controller\\RacineController::register'], null, null, null, false, false, null]],
        '/moncompte' => [[['_route' => 'app_moncompte', '_controller' => 'App\\Controller\\RacineController::account'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityAdminController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityAdminController::logout'], null, null, null, false, false, null]],
        '/loginuser' => [[['_route' => 'app_login_user', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logoutuser' => [[['_route' => 'app_user_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/sondages' => [[['_route' => 'app_sondages_index', '_controller' => 'App\\Controller\\SondagesController::index'], null, ['GET' => 0], null, true, false, null]],
        '/sondages/new' => [[['_route' => 'app_sondages_new', '_controller' => 'App\\Controller\\SondagesController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/sondages/(?'
                    .'|([^/]++)(?'
                        .'|(*:193)'
                        .'|/edit(*:206)'
                        .'|(*:214)'
                    .')'
                    .'|repondre(*:231)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        193 => [[['_route' => 'app_sondages_show', '_controller' => 'App\\Controller\\SondagesController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        206 => [[['_route' => 'app_sondages_edit', '_controller' => 'App\\Controller\\SondagesController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        214 => [[['_route' => 'app_sondages_delete', '_controller' => 'App\\Controller\\SondagesController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        231 => [
            [['_route' => 'app_creation', '_controller' => 'App\\Controller\\SondagesController::answer'], [], null, null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
