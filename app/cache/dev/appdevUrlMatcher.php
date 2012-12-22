<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',)), array('_route' => 'fos_js_routing_js'));
        }

        // edb_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'edb_homepage');
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\DefaultController::indexAction',  '_route' => 'edb_homepage',);
        }

        // edb_history
        if ($pathinfo === '/history') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\HistoryController::indexAction',  '_route' => 'edb_history',);
        }

        // edb_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SecurityController::loginAction',  '_route' => 'edb_login',);
        }

        // edb_login_check
        if ($pathinfo === '/login/check') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SecurityController::checkAction',  '_route' => 'edb_login_check',);
        }

        // edb_security_logout
        if ($pathinfo === '/logout') {
            return array('_route' => 'edb_security_logout');
        }

        // edb_registration
        if ($pathinfo === '/account') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\AccountController::registerAction',  '_route' => 'edb_registration',);
        }

        // edb_registration_create
        if ($pathinfo === '/account/create') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_registration_create;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\AccountController::createAction',  '_route' => 'edb_registration_create',);
        }
        not_edb_registration_create:

        // edb_user_list
        if ($pathinfo === '/admin/user/list') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::listAction',  '_route' => 'edb_user_list',);
        }

        // ebd_user_show
        if (0 === strpos($pathinfo, '/admin/user') && preg_match('#^/admin/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::showAction',)), array('_route' => 'ebd_user_show'));
        }

        // edb_user_edit
        if (0 === strpos($pathinfo, '/admin/user') && preg_match('#^/admin/user/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::editAction',)), array('_route' => 'edb_user_edit'));
        }

        // edb_user_delete
        if (0 === strpos($pathinfo, '/admin/user') && preg_match('#^/admin/user/(?P<id>\\d+)/delete$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::deleteAction',)), array('_route' => 'edb_user_delete'));
        }

        // edb_user_destroy
        if (0 === strpos($pathinfo, '/admin/user') && preg_match('#^/admin/user/(?P<id>\\d+)/destroy$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::destroyAction',)), array('_route' => 'edb_user_destroy'));
        }

        // edb_user_activate
        if (0 === strpos($pathinfo, '/admin/user') && preg_match('#^/admin/user/(?P<id>\\d+)/activate$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::activateAction',)), array('_route' => 'edb_user_activate'));
        }

        // edb_user_deactivate
        if (0 === strpos($pathinfo, '/admin/user') && preg_match('#^/admin/user/(?P<id>\\d+)/deactivate$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::deactivateAction',)), array('_route' => 'edb_user_deactivate'));
        }

        // edb_user_reset_password
        if (0 === strpos($pathinfo, '/admin/user') && preg_match('#^/admin/user/(?P<id>\\d+)/reset$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\UserController::resetPasswordAction',)), array('_route' => 'edb_user_reset_password'));
        }

        // edb_epigraph_new
        if ($pathinfo === '/compiler/epigraph/new') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\EpigraphController::newAction',  '_route' => 'edb_epigraph_new',);
        }

        // edb_epigraph_status
        if ($pathinfo === '/compiler/epigraph/status') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\EpigraphController::statusAction',  '_route' => 'edb_epigraph_status',);
        }

        // edb_epigraph_approve
        if (0 === strpos($pathinfo, '/compiler/epigraph') && preg_match('#^/compiler/epigraph/(?P<id>\\d+)/approve$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\EpigraphController::approveAction',)), array('_route' => 'edb_epigraph_approve'));
        }

        // edb_epigraph_show
        if (0 === strpos($pathinfo, '/epigraph') && preg_match('#^/epigraph/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\EpigraphController::showAction',)), array('_route' => 'edb_epigraph_show'));
        }

        // edb_epigraph_edit
        if (0 === strpos($pathinfo, '/compiler/epigraph') && preg_match('#^/compiler/epigraph/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\EpigraphController::editAction',)), array('_route' => 'edb_epigraph_edit'));
        }

        // edb_literature_new
        if ($pathinfo === '/compiler/literature/new') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\LiteratureController::newAction',  '_route' => 'edb_literature_new',);
        }

        // edb_literature_new_modal
        if ($pathinfo === '/compile/literature/new/modal') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\LiteratureController::newModalAction',  '_route' => 'edb_literature_new_modal',);
        }

        // edb_literature_list
        if ($pathinfo === '/literature') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\LiteratureController::indexAction',  '_route' => 'edb_literature_list',);
        }

        // edb_pertinence_area_list
        if (0 === strpos($pathinfo, '/pertinence/area') && preg_match('#^/pertinence/area(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinenceAreaController::listAction',  '_format' => 'json',)), array('_route' => 'edb_pertinence_area_list'));
        }

        // edb_new_pertinence_area
        if ($pathinfo === '/compiler/pertinence/area/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_pertinence_area;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinenceAreaController::newModalAction',  '_route' => 'edb_new_pertinence_area',);
        }
        not_edb_new_pertinence_area:

        // edb_new_pertinence_context
        if ($pathinfo === '/compiler/pertinence/context/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_pertinence_context;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinenceContextController::newModalAction',  '_route' => 'edb_new_pertinence_context',);
        }
        not_edb_new_pertinence_context:

        // edb_pertinence_context_edit
        if ($pathinfo === '/compiler/pertinence/context/edit') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinenceContextController::editAction',  '_route' => 'edb_pertinence_context_edit',);
        }

        // edb_pertinence_context_list
        if (0 === strpos($pathinfo, '/pertinence/context') && preg_match('#^/pertinence/context/(?P<id>\\d+)(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinenceContextController::listAction',  '_format' => 'json',)), array('_route' => 'edb_pertinence_context_list'));
        }

        // edb_new_pertinence_position
        if ($pathinfo === '/compiler/pertinence/position/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_pertinence_position;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinencePositionController::newModalAction',  '_route' => 'edb_new_pertinence_position',);
        }
        not_edb_new_pertinence_position:

        // edb_pertinence_position_list
        if (0 === strpos($pathinfo, '/pertinence/position') && preg_match('#^/pertinence/position/(?P<id>\\d+)(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PertinencePositionController::listAction',  '_format' => 'json',)), array('_route' => 'edb_pertinence_position_list'));
        }

        // edb_conservation_location_list
        if (0 === strpos($pathinfo, '/conservation/location') && preg_match('#^/conservation/location(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationLocationController::listAction',  '_format' => 'json',)), array('_route' => 'edb_conservation_location_list'));
        }

        // edb_new_conservation_location
        if ($pathinfo === '/compiler/conservation/location/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_conservation_location;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationLocationController::newModalAction',  '_route' => 'edb_new_conservation_location',);
        }
        not_edb_new_conservation_location:

        // edb_conservation_context_list
        if (0 === strpos($pathinfo, '/conservation/context') && preg_match('#^/conservation/context/(?P<id>[^/\\.]+?)(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationContextController::listAction',  '_format' => 'json',)), array('_route' => 'edb_conservation_context_list'));
        }

        // edb_conservation_position_list
        if (0 === strpos($pathinfo, '/conservation/position') && preg_match('#^/conservation/position/(?P<id>[^/\\.]+?)(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationPositionController::listAction',  '_format' => 'json',)), array('_route' => 'edb_conservation_position_list'));
        }

        // edb_new_conservation_position
        if ($pathinfo === '/compiler/conservation/position/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_conservation_position;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationPositionController::newModalAction',  '_route' => 'edb_new_conservation_position',);
        }
        not_edb_new_conservation_position:

        // edb_new_paleography
        if ($pathinfo === '/compiler/paleography/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_paleography;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PaleographyController::newModalAction',  '_route' => 'edb_new_paleography',);
        }
        not_edb_new_paleography:

        // edb_paleography_list
        if (0 === strpos($pathinfo, '/paleography/list') && preg_match('#^/paleography/list(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PaleographyController::listAction',  '_format' => 'json',)), array('_route' => 'edb_paleography_list'));
        }

        // edb_types_list
        if (0 === strpos($pathinfo, '/types/list') && preg_match('#^/types/list(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'KddeEdbBundle:Types:list',  '_format' => 'json',)), array('_route' => 'edb_types_list'));
        }

        // edb_new_technique
        if ($pathinfo === '/compiler/technique/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_technique;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\TechniqueController::newModalAction',  '_route' => 'edb_new_technique',);
        }
        not_edb_new_technique:

        // edb_technique_list
        if (0 === strpos($pathinfo, '/technique/list') && preg_match('#^/technique/list(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\TechniqueController::listAction',  '_format' => 'json',)), array('_route' => 'edb_technique_list'));
        }

        // edb_new_function
        if ($pathinfo === '/compiler/function/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_function;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\FunctionController::newModalAction',  '_route' => 'edb_new_function',);
        }
        not_edb_new_function:

        // edb_function_list
        if (0 === strpos($pathinfo, '/function/list') && preg_match('#^/function/list(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\FunctionController::listAction',  '_format' => 'json',)), array('_route' => 'edb_function_list'));
        }

        // edb_new_support
        if ($pathinfo === '/compiler/support/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_support;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SupportController::newModalAction',  '_route' => 'edb_new_support',);
        }
        not_edb_new_support:

        // edb_support_list
        if (0 === strpos($pathinfo, '/support/list') && preg_match('#^/support/list(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SupportController::listAction',  '_format' => 'json',)), array('_route' => 'edb_support_list'));
        }

        // edb_new_onomastic_area
        if ($pathinfo === '/compiler/onomastic/area/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_onomastic_area;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\OnomasticAreaController::newModalAction',  '_route' => 'edb_new_onomastic_area',);
        }
        not_edb_new_onomastic_area:

        // edb_onomastic_area_list
        if (0 === strpos($pathinfo, '/onomastic/area/list') && preg_match('#^/onomastic/area/list(?:\\.(?P<_format>json))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\OnomasticAreaController::listAction',  '_format' => 'json',)), array('_route' => 'edb_onomastic_area_list'));
        }

        // edb_signa_list
        if (0 === strpos($pathinfo, '/compiler/signa/list') && preg_match('#^/compiler/signa/list(?:\\.(?P<_format>json|html))?$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SignaController::listAction',  '_format' => 'html',)), array('_route' => 'edb_signa_list'));
        }

        // edb_signa_new
        if ($pathinfo === '/compiler/signa/new') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SignaController::createAction',  '_route' => 'edb_signa_new',);
        }

        // edb_new_signa
        if ($pathinfo === '/compiler/signa/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_signa;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SignaController::newModalAction',  '_route' => 'edb_new_signa',);
        }
        not_edb_new_signa:

        // edb_new_conservation_context
        if ($pathinfo === '/compiler/conservation/context/new/modal') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_edb_new_conservation_context;
            }
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\ConservationContextController::newModalAction',  '_route' => 'edb_new_conservation_context',);
        }
        not_edb_new_conservation_context:

        // edb_status
        if ($pathinfo === '/status') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\StatusController::indexAction',  '_route' => 'edb_status',);
        }

        // edb_perspective
        if ($pathinfo === '/perspective') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PerspectiveController::indexAction',  '_route' => 'edb_perspective',);
        }

        // edb_collaboration
        if ($pathinfo === '/collaboration') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\CollaborationController::indexAction',  '_route' => 'edb_collaboration',);
        }

        // edb_link
        if ($pathinfo === '/link') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\LinkController::indexAction',  '_route' => 'edb_link',);
        }

        // edb_people
        if ($pathinfo === '/people') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\PeopleController::indexAction',  '_route' => 'edb_people',);
        }

        // edb_search
        if ($pathinfo === '/search/basic') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SearchController::basicAction',  '_route' => 'edb_search',);
        }

        // edb_search_basic
        if ($pathinfo === '/search/basic') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SearchController::basicAction',  '_route' => 'edb_search_basic',);
        }

        // edb_search_basic_do
        if ($pathinfo === '/search/basic/do') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SearchController::basicDoAction',  '_route' => 'edb_search_basic_do',);
        }

        // edb_search_medium
        if ($pathinfo === '/search/medium') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SearchController::mediumAction',  '_route' => 'edb_search_medium',);
        }

        // edb_search_advanced
        if ($pathinfo === '/search/advanced') {
            return array (  '_controller' => 'Kdde\\EdbBundle\\Controller\\SearchController::advancedAction',  '_route' => 'edb_search_advanced',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
