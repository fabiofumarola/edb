<?php

/* KnpPaginatorBundle:Pagination:sliding.html.twig */
class __TwigTemplate_9bf3d62ecce015efd2d2b1bb24502c20 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 3
        if (($this->getContext($context, "pageCount") > 1)) {
            // line 4
            echo "<div class=\"pagination\">
    ";
            // line 5
            if ((array_key_exists("first", $context) && ($this->getContext($context, "current") != $this->getContext($context, "first")))) {
                // line 6
                echo "        <span class=\"first\">
            <a href=\"";
                // line 7
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "first")))), "html", null, true);
                echo "\">&lt;&lt;</a>
        </span>
    ";
            }
            // line 10
            echo "
    ";
            // line 11
            if (array_key_exists("previous", $context)) {
                // line 12
                echo "        <span class=\"previous\">
            <a href=\"";
                // line 13
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "previous")))), "html", null, true);
                echo "\">&lt;</a>
        </span>
    ";
            }
            // line 16
            echo "
    ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "pagesInRange"));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 18
                echo "        ";
                if (($this->getContext($context, "page") != $this->getContext($context, "current"))) {
                    // line 19
                    echo "            <span class=\"page\">
                <a href=\"";
                    // line 20
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "page")))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                    echo "</a>
            </span>
        ";
                } else {
                    // line 23
                    echo "            <span class=\"current\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                    echo "</span>
        ";
                }
                // line 25
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 27
            echo "
    ";
            // line 28
            if (array_key_exists("next", $context)) {
                // line 29
                echo "        <span class=\"next\">
            <a href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "next")))), "html", null, true);
                echo "\">&gt;</a>
        </span>
    ";
            }
            // line 33
            echo "
    ";
            // line 34
            if ((array_key_exists("last", $context) && ($this->getContext($context, "current") != $this->getContext($context, "last")))) {
                // line 35
                echo "        <span class=\"last\">
            <a href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "last")))), "html", null, true);
                echo "\">&gt;&gt;</a>
        </span>
    ";
            }
            // line 39
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "KnpPaginatorBundle:Pagination:sliding.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 36,  12 => 1,  119 => 56,  334 => 155,  326 => 152,  323 => 151,  313 => 145,  287 => 128,  279 => 123,  276 => 122,  270 => 121,  256 => 117,  247 => 112,  242 => 110,  237 => 109,  235 => 108,  213 => 98,  186 => 84,  173 => 78,  167 => 75,  144 => 62,  140 => 60,  136 => 58,  112 => 39,  105 => 48,  101 => 34,  83 => 30,  160 => 94,  151 => 91,  61 => 29,  65 => 27,  36 => 10,  100 => 46,  228 => 104,  217 => 95,  203 => 92,  201 => 91,  197 => 90,  183 => 83,  169 => 76,  154 => 71,  150 => 66,  118 => 53,  114 => 51,  662 => 486,  658 => 485,  653 => 483,  650 => 482,  647 => 481,  633 => 470,  584 => 423,  573 => 421,  569 => 420,  423 => 285,  419 => 284,  399 => 266,  384 => 263,  375 => 256,  364 => 254,  360 => 253,  315 => 210,  304 => 208,  300 => 207,  292 => 201,  281 => 199,  277 => 198,  138 => 61,  76 => 20,  68 => 17,  66 => 26,  56 => 22,  45 => 14,  21 => 10,  450 => 215,  446 => 214,  442 => 213,  438 => 212,  434 => 287,  430 => 210,  426 => 209,  422 => 208,  418 => 207,  414 => 206,  410 => 205,  406 => 204,  402 => 203,  398 => 202,  393 => 201,  388 => 264,  385 => 198,  380 => 166,  374 => 24,  370 => 23,  365 => 22,  362 => 21,  356 => 6,  349 => 31,  345 => 30,  341 => 29,  337 => 28,  333 => 27,  329 => 153,  327 => 21,  309 => 143,  303 => 142,  297 => 217,  295 => 198,  271 => 176,  265 => 173,  262 => 119,  260 => 118,  254 => 167,  252 => 115,  220 => 102,  214 => 133,  210 => 131,  208 => 130,  199 => 126,  182 => 83,  170 => 93,  168 => 109,  110 => 49,  98 => 33,  85 => 17,  209 => 97,  205 => 129,  196 => 79,  192 => 78,  189 => 77,  178 => 82,  176 => 81,  165 => 76,  161 => 75,  152 => 58,  148 => 90,  145 => 89,  141 => 63,  134 => 57,  132 => 49,  127 => 58,  123 => 57,  109 => 48,  93 => 40,  90 => 36,  54 => 12,  133 => 44,  124 => 53,  111 => 37,  80 => 31,  60 => 19,  52 => 20,  97 => 38,  95 => 32,  88 => 23,  78 => 30,  71 => 23,  25 => 5,  72 => 31,  64 => 11,  53 => 17,  34 => 5,  92 => 30,  86 => 27,  79 => 35,  19 => 1,  42 => 16,  40 => 10,  29 => 3,  26 => 4,  224 => 103,  215 => 90,  211 => 94,  204 => 84,  200 => 83,  195 => 124,  193 => 88,  190 => 86,  188 => 85,  185 => 76,  179 => 72,  177 => 80,  171 => 67,  162 => 63,  158 => 104,  156 => 67,  153 => 102,  146 => 55,  142 => 64,  137 => 92,  126 => 84,  120 => 39,  117 => 44,  103 => 35,  74 => 27,  47 => 12,  32 => 10,  24 => 11,  22 => 4,  23 => 3,  17 => 2,  69 => 29,  63 => 20,  58 => 13,  49 => 16,  43 => 45,  37 => 10,  20 => 3,  139 => 26,  131 => 59,  128 => 54,  125 => 42,  121 => 82,  115 => 78,  107 => 36,  99 => 34,  96 => 45,  91 => 66,  82 => 31,  77 => 25,  75 => 29,  57 => 18,  50 => 16,  46 => 18,  44 => 13,  39 => 11,  33 => 3,  30 => 7,  27 => 6,  135 => 61,  129 => 59,  122 => 46,  116 => 42,  113 => 51,  108 => 49,  104 => 43,  102 => 47,  94 => 38,  89 => 29,  87 => 28,  84 => 27,  81 => 31,  73 => 36,  70 => 15,  67 => 13,  62 => 10,  59 => 23,  55 => 7,  51 => 6,  48 => 15,  41 => 12,  38 => 14,  35 => 12,  31 => 4,  28 => 1,);
    }
}
