<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       'fos_js_routing_js' => true,
       'edb_homepage' => true,
       'edb_history' => true,
       'edb_login' => true,
       'edb_login_check' => true,
       'edb_security_logout' => true,
       'edb_registration' => true,
       'edb_registration_create' => true,
       'edb_user_list' => true,
       'ebd_user_show' => true,
       'edb_user_edit' => true,
       'edb_user_delete' => true,
       'edb_user_destroy' => true,
       'edb_user_activate' => true,
       'edb_user_deactivate' => true,
       'edb_user_reset_password' => true,
       'edb_epigraph_new' => true,
       'edb_epigraph_status' => true,
       'edb_epigraph_approve' => true,
       'edb_epigraph_show' => true,
       'edb_epigraph_edit' => true,
       'edb_literature_new' => true,
       'edb_literature_new_modal' => true,
       'edb_literature_list' => true,
       'edb_pertinence_area_list' => true,
       'edb_new_pertinence_area' => true,
       'edb_new_pertinence_context' => true,
       'edb_pertinence_context_list' => true,
       'edb_new_pertinence_position' => true,
       'edb_pertinence_position_list' => true,
       'edb_conservation_location_list' => true,
       'edb_new_conservation_location' => true,
       'edb_conservation_context_list' => true,
       'edb_conservation_position_list' => true,
       'edb_new_conservation_position' => true,
       'edb_new_paleography' => true,
       'edb_paleography_list' => true,
       'edb_new_technique' => true,
       'edb_technique_list' => true,
       'edb_new_function' => true,
       'edb_function_list' => true,
       'edb_new_support' => true,
       'edb_support_list' => true,
       'edb_new_onomastic_area' => true,
       'edb_onomastic_area_list' => true,
       'edb_signa_list' => true,
       'edb_signa_new' => true,
       'edb_new_signa' => true,
       'edb_new_conservation_context' => true,
       'edb_status' => true,
       'edb_perspective' => true,
       'edb_collaboration' => true,
       'edb_link' => true,
       'edb_people' => true,
       'edb_search' => true,
       'edb_search_basic' => true,
       'edb_search_basic_do' => true,
       'edb_search_medium' => true,
       'edb_search_advanced' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function getfos_js_routing_jsRouteInfo()
    {
        return array(array (  0 => '_format',), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',), array (  '_format' => 'js|json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'js|json',    3 => '_format',  ),  1 =>   array (    0 => 'text',    1 => '/js/routing',  ),));
    }

    private function getedb_homepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getedb_historyRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\HistoryController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/history',  ),));
    }

    private function getedb_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SecurityController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login',  ),));
    }

    private function getedb_login_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SecurityController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login/check',  ),));
    }

    private function getedb_security_logoutRouteInfo()
    {
        return array(array (), array (), array (), array (  0 =>   array (    0 => 'text',    1 => '/logout',  ),));
    }

    private function getedb_registrationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\AccountController::registerAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/account',  ),));
    }

    private function getedb_registration_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\AccountController::createAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/account/create',  ),));
    }

    private function getedb_user_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::listAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/user/list',  ),));
    }

    private function getebd_user_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::showAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/admin/user',  ),));
    }

    private function getedb_user_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::editAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/user',  ),));
    }

    private function getedb_user_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::deleteAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/user',  ),));
    }

    private function getedb_user_destroyRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::destroyAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/destroy',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/user',  ),));
    }

    private function getedb_user_activateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::activateAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/activate',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/user',  ),));
    }

    private function getedb_user_deactivateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::deactivateAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/deactivate',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/user',  ),));
    }

    private function getedb_user_reset_passwordRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::resetPasswordAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/reset',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/user',  ),));
    }

    private function getedb_epigraph_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\EpigraphController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/compiler/epigraph/new',  ),));
    }

    private function getedb_epigraph_statusRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\EpigraphController::statusAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/compiler/epigraph/status',  ),));
    }

    private function getedb_epigraph_approveRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\EpigraphController::approveAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/approve',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/compiler/epigraph',  ),));
    }

    private function getedb_epigraph_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\EpigraphController::showAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  1 =>   array (    0 => 'text',    1 => '/epigraph',  ),));
    }

    private function getedb_epigraph_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\EpigraphController::editAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/compiler/epigraph',  ),));
    }

    private function getedb_literature_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\LiteratureController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/compiler/literature/new',  ),));
    }

    private function getedb_literature_new_modalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\LiteratureController::newModalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/compile/literature/new/modal',  ),));
    }

    private function getedb_literature_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\LiteratureController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/literature',  ),));
    }

    private function getedb_pertinence_area_listRouteInfo()
    {
        return array(array (  0 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinenceAreaController::listAction',  '_format' => 'json',), array (  '_format' => 'json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'text',    1 => '/pertinence/area',  ),));
    }

    private function getedb_new_pertinence_areaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinenceAreaController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/pertinence/area/new/modal',  ),));
    }

    private function getedb_new_pertinence_contextRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinenceContextController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/pertinence/context/new/modal',  ),));
    }

    private function getedb_pertinence_context_listRouteInfo()
    {
        return array(array (  0 => 'id',  1 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinenceContextController::listAction',  '_format' => 'json',), array (  '_format' => 'json',  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/pertinence/context',  ),));
    }

    private function getedb_new_pertinence_positionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinencePositionController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/pertinence/position/new/modal',  ),));
    }

    private function getedb_pertinence_position_listRouteInfo()
    {
        return array(array (  0 => 'id',  1 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinencePositionController::listAction',  '_format' => 'json',), array (  '_format' => 'json',  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '\\d+',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/pertinence/position',  ),));
    }

    private function getedb_conservation_location_listRouteInfo()
    {
        return array(array (  0 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationLocationController::listAction',  '_format' => 'json',), array (  '_format' => 'json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'text',    1 => '/conservation/location',  ),));
    }

    private function getedb_new_conservation_locationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationLocationController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/conservation/location/new/modal',  ),));
    }

    private function getedb_conservation_context_listRouteInfo()
    {
        return array(array (  0 => 'id',  1 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationContextController::listAction',  '_format' => 'json',), array (  '_format' => 'json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/conservation/context',  ),));
    }

    private function getedb_conservation_position_listRouteInfo()
    {
        return array(array (  0 => 'id',  1 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationPositionController::listAction',  '_format' => 'json',), array (  '_format' => 'json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/conservation/position',  ),));
    }

    private function getedb_new_conservation_positionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationPositionController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/conservation/position/new/modal',  ),));
    }

    private function getedb_new_paleographyRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PaleographyController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/paleography/new/modal',  ),));
    }

    private function getedb_paleography_listRouteInfo()
    {
        return array(array (  0 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PaleographyController::listAction',  '_format' => 'json',), array (  '_format' => 'json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'text',    1 => '/paleography/list',  ),));
    }

    private function getedb_new_techniqueRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\TechniqueController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/technique/new/modal',  ),));
    }

    private function getedb_technique_listRouteInfo()
    {
        return array(array (  0 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\TechniqueController::listAction',  '_format' => 'json',), array (  '_format' => 'json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'text',    1 => '/technique/list',  ),));
    }

    private function getedb_new_functionRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\FunctionController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/function/new/modal',  ),));
    }

    private function getedb_function_listRouteInfo()
    {
        return array(array (  0 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\FunctionController::listAction',  '_format' => 'json',), array (  '_format' => 'json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'text',    1 => '/function/list',  ),));
    }

    private function getedb_new_supportRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SupportController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/support/new/modal',  ),));
    }

    private function getedb_support_listRouteInfo()
    {
        return array(array (  0 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SupportController::listAction',  '_format' => 'json',), array (  '_format' => 'json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'text',    1 => '/support/list',  ),));
    }

    private function getedb_new_onomastic_areaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\OnomasticAreaController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/onomastic/area/new/modal',  ),));
    }

    private function getedb_onomastic_area_listRouteInfo()
    {
        return array(array (  0 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\OnomasticAreaController::listAction',  '_format' => 'json',), array (  '_format' => 'json',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json',    3 => '_format',  ),  1 =>   array (    0 => 'text',    1 => '/onomastic/area/list',  ),));
    }

    private function getedb_signa_listRouteInfo()
    {
        return array(array (  0 => '_format',), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SignaController::listAction',  '_format' => 'html',), array (  '_format' => 'json|html',), array (  0 =>   array (    0 => 'variable',    1 => '.',    2 => 'json|html',    3 => '_format',  ),  1 =>   array (    0 => 'text',    1 => '/compiler/signa/list',  ),));
    }

    private function getedb_signa_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SignaController::createAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/compiler/signa/new',  ),));
    }

    private function getedb_new_signaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SignaController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/signa/new/modal',  ),));
    }

    private function getedb_new_conservation_contextRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationContextController::newModalAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/compiler/conservation/context/new/modal',  ),));
    }

    private function getedb_statusRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\StatusController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/status',  ),));
    }

    private function getedb_perspectiveRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PerspectiveController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/perspective',  ),));
    }

    private function getedb_collaborationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\CollaborationController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/collaboration',  ),));
    }

    private function getedb_linkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\LinkController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/link',  ),));
    }

    private function getedb_peopleRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PeopleController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/people',  ),));
    }

    private function getedb_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SearchController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search',  ),));
    }

    private function getedb_search_basicRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SearchController::basicAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/basic',  ),));
    }

    private function getedb_search_basic_doRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SearchController::basicDoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/basic/do',  ),));
    }

    private function getedb_search_mediumRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SearchController::mediumAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/medium',  ),));
    }

    private function getedb_search_advancedRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SearchController::advancedAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/advanced',  ),));
    }
}
