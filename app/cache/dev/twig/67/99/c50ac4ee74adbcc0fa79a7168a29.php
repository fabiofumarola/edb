<?php

/* ::base.html.twig */
class __TwigTemplate_6799c50ac4ee74adbcc0fa79a7168a29 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />

\t<meta name=\"description\"
\tcontent=\"Epigraphic Database Bari - It stores Epigraphic Documents of Roman Christian Period \">

\t<meta name=\"author\"
\tcontent=\"Computer Science Department University of Bari\">
\t<meta name=\"copyright\"
\tcontent=\"Department of Classical and Christian Studies - University of Bari (Italy)\">
\t<meta name=\"keywords\"
\tcontent=\"epigraphic, Epigraphic, epigraphic database, epigrafia, database epigrafico,
\t\tiscrizioni romane, iscrizioni latine, roma antica, EAGLE, testi epigrafici\">
    ";
        // line 21
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 25
        echo " 
    
    <link rel=\"shortcut icon\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("ico/favicon.ico"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("ico/apple-touch-icon-144-precomposed.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("ico/apple-touch-icon-114-precomposed.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("ico/apple-touch-icon-72-precomposed.png"), "html", null, true);
        echo "\">
    <link rel=\"apple-touch-icon-precomposed\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("ico/apple-touch-icon-57-precomposed.png"), "html", null, true);
        echo "\">
                                  
    </head>
    <body>
    
    <!-- navbar -->
    
    <div class=\"navbar navbar-fixed-top\">
\t\t<div class=\"navbar-inner\">
\t\t\t<div class=\"container\">
\t\t\t\t<a class=\"btn btn-navbar\" data-toggle=\"collapse\"
\t\t\t\t\tdata-target=\".nav-collapse\"> <span class=\"icon-bar\"></span> <span
\t\t\t\t\tclass=\"icon-bar\"></span> <span class=\"icon-bar\"></span>
\t\t\t\t</a> <a class=\"brand visible-phone visible-tablet\" href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_homepage"), "html", null, true);
        echo "\">EDB</a>
\t\t\t\t<div class=\"nav-collapse collapse\">
\t\t\t\t\t<ul class=\"nav\">
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_homepage"), "html", null, true);
        echo "\">Home</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_history"), "html", null, true);
        echo "\">History</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\" ";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_status"), "html", null, true);
        echo "\">Status</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_perspective"), "html", null, true);
        echo "\">Perspectives</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_collaboration"), "html", null, true);
        echo "\">Collaborations</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_link"), "html", null, true);
        echo "\">Links</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_people"), "html", null, true);
        echo "\">People</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"divider-vertical\"></li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_search"), "html", null, true);
        echo "\">Search</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 65
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 66
            echo "\t\t\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t\t\t<a href=\"#\" id=\"menuUtenti\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" >User<b class=\"caret\"></b></a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"menuUtenti\" >
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_registration"), "html", null, true);
            echo "\">New</a></li>
\t\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_user_list"), "html", null, true);
            echo "\">Show</a>\t\t\t\t\t
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 75
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 76
        if ($this->env->getExtension('security')->isGranted("ROLE_COMPILER")) {
            // line 77
            echo "\t\t\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t\t\t<a href=\"#\" id=\"menuEpigraph\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" > Epigraph <b
\t\t\t\t\t\t\t\tclass=\"caret\"></b></a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"menuEpigraph\" >
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 81
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_epigraph_new"), "html", null, true);
            echo "\">New</a></li>
\t\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_epigraph_status"), "html", null, true);
            echo "\">Status</a>\t\t\t
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t\t\t<a hre=\"#\" id=\"menuLiterature\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"> Literature <b
\t\t\t\t\t\t\t\tclass=\"caret\"></b></a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"menuLiterature\">
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\" ";
            // line 91
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_literature_new"), "html", null, true);
            echo "\">New</a></li>
\t\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\" ";
            // line 93
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_literature_list"), "html", null, true);
            echo " \">Show All</a>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<li class=\"dropdown\" >
\t\t\t\t\t\t\t\t<a href=\"#\" id=\"menuSigna\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Signa
\t\t\t\t\t\t\t\t<b class=\"caret\"></b></a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"menuSigna\">
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 101
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_signa_new"), "html", null, true);
            echo "\">New</a></li>
\t\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 103
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_signa_list"), "html", null, true);
            echo "\">Show</a>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 107
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 108
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 109
            echo "                        \t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_security_logout"), "html", null, true);
            echo "\">Logout</a></li>
\t\t\t\t\t\t";
        } else {
            // line 111
            echo "    \t\t\t\t\t\t<li class=\"\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_login"), "html", null, true);
            echo "\">Login</a></li>
\t\t\t\t\t\t";
        }
        // line 113
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
    
    <div class=\"container\">
    
    
    ￼";
        // line 122
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "notice"), "method")) {
            // line 123
            echo "    <div class=\"alert alert-success\">
     \t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
        ";
            // line 125
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
            echo "
    </div>
\t";
        }
        // line 128
        echo "\t
\t￼";
        // line 129
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "error"), "method")) {
            // line 130
            echo "    <div class=\"alert alert-error\">
     \t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
        ";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "error"), "method"), "html", null, true);
            echo "
    </div>
\t";
        }
        // line 135
        echo "    
    <!-- Masthead================================================== -->
\t\t<header class=\"jumbotron masthead\">
\t\t\t<div class=\"inner\">
\t\t\t\t<h1>EDB Epigraphic Database Bari</h1>
\t\t\t\t<p>Documenti epigrafici romani di committenza cristiana - Secoli III
\t\t\t\t\t- VIII</p>
\t\t\t\t<p class=\"inner\">Electronic Archive of Greek and Latin Epigraphy
\t\t\t\t\t(EAGLE) - International Federation of Epigraphic Databases.</p>
\t\t\t\t<p class=\"inner\">Under the patronage of Association Internationale
\t\t\t\t\td'Epigraphie Grecque et Latine - AIEGL</p>
\t\t\t</div>
\t\t\t<ul class=\"thumbnails\">
\t\t\t  <li class=\"span3\"></li>
              <li class=\"span2\">
                <a href=\"#\" class=\"thumbnail\">EAGLE</a>
              </li>
              <li class=\"span2\">
                <a href=\"#\" class=\"thumbnail\">
                  AIEGL
                </a>
              </li>
              <li class=\"span2\">
                <a href=\"#\" class=\"thumbnail\">
                  Read mode
                </a>
              </li>
            </ul>
\t\t</header>
\t\t\t\t 
        ";
        // line 165
        $this->displayBlock('body', $context, $blocks);
        // line 166
        echo "        
\t\t<!-- Footer
      ================================================== -->
\t\t<footer class=\"footer\">
\t\t\t<p class=\"pull-right\">
\t\t\t\t<a href=\"#\">Back to top</a>
\t\t\t</p>
\t\t\t<p>
\t\t\t\tFed by the <a href=\"http://www.dscc.uniba.it\">Department of Classical
\t\t\t\t\tand Christian Studies</a> - <a href=\"http://www.uniba.it\">University of Bari (Italy)</a>
\t\t\t</p>
\t\t\t<p>
\t\t\t\tDesigned by the <a href=\"#\"><em>KDDE Group</em> </a> hosted at the <a
\t\t\t\t\thref=\"http://www.di.uniba.it\"><em>Department of Computer Science</em>
\t\t\t\t</a> - <a href=\"http://www.uniba.it\">University of Bari (Italy)</a>
\t\t\t</p>
\t\t\t<p>
\t\t\t\tIcons from <a href=\"http://glyphicons.com\">Glyphicons Free</a>,
\t\t\t\tlicensed under <a href=\"http://creativecommons.org/licenses/by/3.0/\">CC
\t\t\t\t\tBY 3.0</a>.
\t\t\t</p>
\t\t</footer>
    </div>
   
      
        
        ";
        // line 192
        $this->displayBlock('javascripts', $context, $blocks);
        // line 211
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "EDB Epigraphic Database Bari / EAGLE";
    }

    // line 21
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 22
        echo "    \t<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" />
    \t<link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap-responsive.css"), "html", null, true);
        echo "\" />
    \t<link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/docs.css"), "html", null, true);
        echo "\" />
    ";
    }

    // line 165
    public function block_body($context, array $blocks = array())
    {
    }

    // line 192
    public function block_javascripts($context, array $blocks = array())
    {
        // line 193
        echo "        \t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/router.js"), "html", null, true);
        echo "\"></script>
";
        // line 195
        echo "\t\t\t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData")), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 196
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 197
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-transition.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 198
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-alert.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 199
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-modal.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 200
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-dropdown.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 201
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-scrollspy.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 202
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-tab.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 203
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-tooltip.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 204
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-popover.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 205
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-button.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 206
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-collapse.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 207
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-carousel.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 208
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-typeahead.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 209
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-affix.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  425 => 209,  421 => 208,  417 => 207,  413 => 206,  409 => 205,  405 => 204,  401 => 203,  397 => 202,  393 => 201,  389 => 200,  385 => 199,  381 => 198,  377 => 197,  373 => 196,  368 => 195,  363 => 193,  360 => 192,  355 => 165,  349 => 24,  345 => 23,  340 => 22,  337 => 21,  331 => 5,  325 => 211,  323 => 192,  295 => 166,  293 => 165,  261 => 135,  255 => 132,  251 => 130,  249 => 129,  246 => 128,  240 => 125,  236 => 123,  234 => 122,  223 => 113,  217 => 111,  211 => 109,  209 => 108,  206 => 107,  199 => 103,  194 => 101,  183 => 93,  178 => 91,  167 => 83,  162 => 81,  154 => 76,  144 => 71,  139 => 69,  134 => 66,  132 => 65,  126 => 62,  120 => 59,  115 => 57,  110 => 55,  105 => 53,  100 => 51,  95 => 49,  90 => 47,  84 => 44,  68 => 31,  64 => 30,  60 => 29,  56 => 28,  52 => 27,  46 => 21,  27 => 5,  21 => 1,  156 => 77,  151 => 75,  148 => 90,  145 => 89,  129 => 76,  82 => 31,  71 => 30,  67 => 29,  48 => 25,  39 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
