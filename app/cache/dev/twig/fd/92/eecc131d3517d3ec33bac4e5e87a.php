<?php

/* KddeEdbBundle:Security:login.html.twig */
class __TwigTemplate_fd92eecc131d3517d3ec33bac4e5e87a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo " EDB Home Page
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "
\t<div class=\"marketing\">
\t\t<h2>New Account</h2>
\t\t<br>
\t</div>
\t<div class=\"row\">
\t\t<div class=\"offset3 span5\">
\t\t";
        // line 15
        if ($this->getContext($context, "error")) {
            // line 16
            echo "    \t\t<div>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "error"), "message"), "html", null, true);
            echo "</div>
\t\t";
        }
        // line 18
        echo "
\t\t<form class=\"form-horizontal\" action=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_login_check"), "html", null, true);
        echo "\" method=\"post\">
\t\t\t<fieldset>
\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t<label class=\"control-label\"  for=\"username\">Username:</label>
\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t<input type=\"text\" class=\"input-xlarge\" id=\"username\" name=\"_username\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, "last_username"), "html", null, true);
        echo "\" />
\t\t\t\t\t</div>
\t\t\t\t
    \t\t\t</div>
\t\t\t\t<div class=\"control-group\">
\t\t\t\t\t<label class=\"control-label\" for=\"password\">Password:</label>
\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t<input class=\"input-xlarge\" type=\"password\" id=\"password\" name=\"_password\" />
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-actions\">
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">Login</button>
\t\t\t\t</div>
\t\t\t</fieldset>
\t\t</form>
\t\t
\t\t<a class=\"\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_registration"), "html", null, true);
        echo "\">Create a New Account</a>
\t\t</div>
\t</div>
\t
";
    }

    public function getTemplateName()
    {
        return "KddeEdbBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 155,  326 => 152,  323 => 151,  313 => 145,  287 => 128,  279 => 123,  276 => 122,  270 => 121,  256 => 117,  247 => 112,  242 => 110,  237 => 109,  235 => 108,  213 => 98,  186 => 84,  173 => 78,  167 => 75,  144 => 62,  140 => 60,  136 => 58,  112 => 44,  105 => 40,  101 => 39,  83 => 30,  160 => 94,  151 => 91,  61 => 19,  65 => 13,  36 => 7,  100 => 33,  228 => 104,  217 => 95,  203 => 92,  201 => 91,  197 => 90,  183 => 83,  169 => 76,  154 => 71,  150 => 66,  118 => 53,  114 => 51,  662 => 486,  658 => 485,  653 => 483,  650 => 482,  647 => 481,  633 => 470,  584 => 423,  573 => 421,  569 => 420,  423 => 285,  419 => 284,  399 => 266,  384 => 263,  375 => 256,  364 => 254,  360 => 253,  315 => 210,  304 => 208,  300 => 207,  292 => 201,  281 => 199,  277 => 198,  138 => 61,  76 => 31,  68 => 14,  66 => 24,  56 => 17,  45 => 14,  21 => 4,  450 => 215,  446 => 214,  442 => 213,  438 => 212,  434 => 287,  430 => 210,  426 => 209,  422 => 208,  418 => 207,  414 => 206,  410 => 205,  406 => 204,  402 => 203,  398 => 202,  393 => 201,  388 => 264,  385 => 198,  380 => 166,  374 => 24,  370 => 23,  365 => 22,  362 => 21,  356 => 6,  349 => 31,  345 => 30,  341 => 29,  337 => 28,  333 => 27,  329 => 153,  327 => 21,  309 => 143,  303 => 142,  297 => 217,  295 => 198,  271 => 176,  265 => 173,  262 => 119,  260 => 118,  254 => 167,  252 => 115,  220 => 102,  214 => 133,  210 => 131,  208 => 130,  199 => 126,  182 => 83,  170 => 93,  168 => 109,  110 => 49,  98 => 32,  85 => 40,  209 => 97,  205 => 129,  196 => 79,  192 => 78,  189 => 77,  178 => 82,  176 => 81,  165 => 76,  161 => 75,  152 => 58,  148 => 90,  145 => 89,  141 => 55,  134 => 57,  132 => 49,  127 => 57,  123 => 56,  109 => 39,  93 => 40,  90 => 36,  54 => 18,  133 => 44,  124 => 53,  111 => 37,  80 => 31,  60 => 20,  52 => 5,  97 => 38,  95 => 31,  88 => 23,  78 => 33,  71 => 30,  25 => 5,  72 => 30,  64 => 24,  53 => 19,  34 => 9,  92 => 38,  86 => 27,  79 => 29,  19 => 2,  42 => 12,  40 => 10,  29 => 3,  26 => 8,  224 => 103,  215 => 90,  211 => 94,  204 => 84,  200 => 83,  195 => 124,  193 => 88,  190 => 86,  188 => 85,  185 => 76,  179 => 72,  177 => 80,  171 => 67,  162 => 63,  158 => 104,  156 => 67,  153 => 102,  146 => 55,  142 => 64,  137 => 92,  126 => 84,  120 => 39,  117 => 44,  103 => 34,  74 => 29,  47 => 15,  32 => 4,  24 => 3,  22 => 4,  23 => 3,  17 => 1,  69 => 29,  63 => 26,  58 => 19,  49 => 16,  43 => 45,  37 => 10,  20 => 3,  139 => 26,  131 => 59,  128 => 54,  125 => 42,  121 => 82,  115 => 78,  107 => 36,  99 => 34,  96 => 41,  91 => 66,  82 => 31,  77 => 17,  75 => 24,  57 => 19,  50 => 32,  46 => 14,  44 => 11,  39 => 8,  33 => 7,  30 => 4,  27 => 3,  135 => 50,  129 => 76,  122 => 46,  116 => 42,  113 => 46,  108 => 48,  104 => 43,  102 => 37,  94 => 38,  89 => 33,  87 => 32,  84 => 26,  81 => 25,  73 => 36,  70 => 30,  67 => 24,  62 => 21,  59 => 24,  55 => 18,  51 => 15,  48 => 15,  41 => 10,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
