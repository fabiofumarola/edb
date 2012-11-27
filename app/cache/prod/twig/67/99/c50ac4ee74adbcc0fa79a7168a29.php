<?php

/* ::base.html.twig */
class __TwigTemplate_6799c50ac4ee74adbcc0fa79a7168a29 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
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
    ";
        // line 4
        $this->displayBlock('header', $context, $blocks);
        // line 33
        echo " 
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
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_homepage"), "html", null, true);
        echo "\">EDB</a>
\t\t\t\t<div class=\"nav-collapse collapse\">
\t\t\t\t\t<ul class=\"nav\">
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_homepage"), "html", null, true);
        echo "\">Home</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_history"), "html", null, true);
        echo "\">History</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\" ";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_status"), "html", null, true);
        echo "\">Status</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_perspective"), "html", null, true);
        echo "\">Perspectives</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_collaboration"), "html", null, true);
        echo "\">Collaborations</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_link"), "html", null, true);
        echo "\">Links</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_people"), "html", null, true);
        echo "\">People</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"divider-vertical\"></li>
\t\t\t\t\t\t<li class=\"\"><a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_search"), "html", null, true);
        echo "\">Search</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 66
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 67
            echo "\t\t\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t\t\t<a href=\"#\" id=\"menuUtenti\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" >User<b class=\"caret\"></b></a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"menuUtenti\" >
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_registration"), "html", null, true);
            echo "\">New</a></li>
\t\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_user_list"), "html", null, true);
            echo "\">Show</a>\t\t\t\t\t
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 76
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 77
        if ($this->env->getExtension('security')->isGranted("ROLE_COMPILER")) {
            // line 78
            echo "\t\t\t\t\t\t\t<li class=\"dropdown\">
\t\t\t\t\t\t\t\t<a href=\"#\" id=\"menuEpigraph\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" > Epigraph <b
\t\t\t\t\t\t\t\tclass=\"caret\"></b></a>
\t\t\t\t\t\t\t\t<ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"menuEpigraph\" >
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_epigraph_new"), "html", null, true);
            echo "\">New</a></li>
\t\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 84
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
            // line 92
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_literature_new"), "html", null, true);
            echo "\">New</a></li>
\t\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\" ";
            // line 94
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
            // line 102
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_signa_new"), "html", null, true);
            echo "\">New</a></li>
\t\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t\t<li><a tabindex=\"-1\" href=\"";
            // line 104
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_signa_list"), "html", null, true);
            echo "\">Show</a>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        // line 108
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 109
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 110
            echo "                        \t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_security_logout"), "html", null, true);
            echo "\">Logout</a></li>
\t\t\t\t\t\t";
        } else {
            // line 112
            echo "    \t\t\t\t\t\t<li class=\"\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_login"), "html", null, true);
            echo "\">Login</a></li>
\t\t\t\t\t\t";
        }
        // line 114
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
    
    <div class=\"container\">
    
    
    ￼";
        // line 123
        if (isset($context["app"])) { $_app_ = $context["app"]; } else { $_app_ = null; }
        if ($this->getAttribute($this->getAttribute($_app_, "session"), "hasFlash", array(0 => "notice"), "method")) {
            // line 124
            echo "    <div class=\"alert alert-success\">
     \t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
        ";
            // line 126
            if (isset($context["app"])) { $_app_ = $context["app"]; } else { $_app_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_app_, "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
            echo "
    </div>
\t";
        }
        // line 129
        echo "\t
\t￼";
        // line 130
        if (isset($context["app"])) { $_app_ = $context["app"]; } else { $_app_ = null; }
        if ($this->getAttribute($this->getAttribute($_app_, "session"), "hasFlash", array(0 => "error"), "method")) {
            // line 131
            echo "    <div class=\"alert alert-error\">
     \t<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
        ";
            // line 133
            if (isset($context["app"])) { $_app_ = $context["app"]; } else { $_app_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($_app_, "session"), "flash", array(0 => "error"), "method"), "html", null, true);
            echo "
    </div>
\t";
        }
        // line 136
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
        // line 166
        $this->displayBlock('body', $context, $blocks);
        // line 167
        echo "        
\t\t<!-- Footer
      ================================================== -->
\t\t<footer class=\"footer\">
\t\t\t";
        // line 171
        if (array_key_exists("btn_back_previous", $context)) {
            // line 172
            echo "\t\t\t<p class=\"pull-left\">
\t\t\t\t<a href=\"";
            // line 173
            if (isset($context["btn_back_previous"])) { $_btn_back_previous_ = $context["btn_back_previous"]; } else { $_btn_back_previous_ = null; }
            echo twig_escape_filter($this->env, $_btn_back_previous_, "html", null, true);
            echo "\">Back to previous</a>
\t\t\t</p>
\t\t\t";
        }
        // line 176
        echo "\t\t\t<p class=\"pull-right\">
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
        // line 198
        $this->displayBlock('javascripts', $context, $blocks);
        // line 217
        echo "    </body>
</html>
";
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
        echo "    
        <meta charset=\"UTF-8\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">        
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">

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
                                  
\t";
    }

    // line 6
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

    // line 166
    public function block_body($context, array $blocks = array())
    {
    }

    // line 198
    public function block_javascripts($context, array $blocks = array())
    {
        // line 199
        echo "        \t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/router.js"), "html", null, true);
        echo "\"></script>
";
        // line 201
        echo "\t\t\t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData")), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 202
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 203
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-transition.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 204
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-alert.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 205
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-modal.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 206
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-dropdown.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 207
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-scrollspy.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 208
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-tab.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 209
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-tooltip.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 210
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-popover.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 211
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-button.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 212
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-collapse.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 213
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-carousel.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 214
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-typeahead.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 215
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
        return array (  455 => 215,  451 => 214,  447 => 213,  439 => 211,  435 => 210,  431 => 209,  427 => 208,  423 => 207,  419 => 206,  415 => 205,  411 => 204,  407 => 203,  403 => 202,  398 => 201,  393 => 199,  390 => 198,  385 => 166,  379 => 24,  375 => 23,  370 => 22,  367 => 21,  361 => 6,  354 => 31,  350 => 30,  346 => 29,  342 => 28,  338 => 27,  334 => 25,  332 => 21,  314 => 6,  308 => 4,  300 => 198,  276 => 176,  269 => 173,  266 => 172,  264 => 171,  258 => 167,  256 => 166,  224 => 136,  217 => 133,  213 => 131,  210 => 130,  207 => 129,  200 => 126,  196 => 124,  193 => 123,  182 => 114,  176 => 112,  170 => 110,  168 => 109,  165 => 108,  158 => 104,  153 => 102,  142 => 94,  137 => 92,  126 => 84,  121 => 82,  115 => 78,  110 => 76,  103 => 72,  98 => 70,  93 => 67,  91 => 66,  85 => 63,  79 => 60,  69 => 56,  64 => 54,  59 => 52,  54 => 50,  43 => 45,  29 => 33,  27 => 4,  22 => 1,  688 => 486,  684 => 485,  679 => 483,  676 => 482,  673 => 481,  658 => 470,  609 => 423,  596 => 421,  591 => 420,  456 => 287,  443 => 212,  438 => 284,  418 => 266,  405 => 264,  400 => 263,  391 => 256,  378 => 254,  373 => 253,  328 => 210,  315 => 208,  310 => 207,  302 => 217,  289 => 199,  284 => 198,  177 => 93,  145 => 61,  132 => 59,  127 => 58,  113 => 77,  106 => 47,  96 => 39,  94 => 38,  92 => 37,  90 => 36,  88 => 35,  86 => 34,  84 => 33,  82 => 32,  80 => 31,  78 => 30,  76 => 29,  74 => 58,  72 => 27,  70 => 26,  68 => 25,  66 => 24,  63 => 23,  60 => 22,  57 => 21,  52 => 18,  49 => 48,  35 => 4,  32 => 3,  26 => 15,);
    }
}
