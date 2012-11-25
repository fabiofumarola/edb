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
            echo "    ";
            if ((array_key_exists("first", $context) && ($this->getContext($context, "current") != $this->getContext($context, "first")))) {
                // line 5
                echo "        <li class=\"first\">
            <a href=\"";
                // line 6
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "first")))), "html", null, true);
                echo "\">&lt;&lt;</a>
        </li>
    ";
            }
            // line 9
            echo "
    ";
            // line 10
            if (array_key_exists("previous", $context)) {
                // line 11
                echo "        <li class=\"previous\">
            <a href=\"";
                // line 12
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "previous")))), "html", null, true);
                echo "\">&lt;</a>
        </li>
    ";
            }
            // line 15
            echo "
    ";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "pagesInRange"));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 17
                echo "        ";
                if (($this->getContext($context, "page") != $this->getContext($context, "current"))) {
                    // line 18
                    echo "            <li>
                <a href=\"";
                    // line 19
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "page")))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                    echo "</a>
            </li>
        ";
                } else {
                    // line 22
                    echo "            <li class=\"current\"><span>";
                    echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                    echo "</span></li>
        ";
                }
                // line 24
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 25
            echo "
    ";
            // line 26
            if (array_key_exists("next", $context)) {
                // line 27
                echo "        <li class=\"next\">
            <a href=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "next")))), "html", null, true);
                echo "\">&gt;</a>
        </li>
    ";
            }
            // line 31
            echo "
    ";
            // line 32
            if ((array_key_exists("last", $context) && ($this->getContext($context, "current") != $this->getContext($context, "last")))) {
                // line 33
                echo "        <li class=\"last\">
            <a href=\"";
                // line 34
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getContext($context, "route"), twig_array_merge($this->getContext($context, "query"), array($this->getContext($context, "pageParameterName") => $this->getContext($context, "last")))), "html", null, true);
                echo "\">&gt;&gt;</a>
        </li>
    ";
            }
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
        return array (  100 => 33,  95 => 31,  86 => 27,  84 => 26,  81 => 25,  75 => 24,  61 => 19,  58 => 18,  55 => 17,  51 => 16,  48 => 15,  42 => 12,  39 => 11,  37 => 10,  34 => 9,  28 => 6,  25 => 5,  20 => 3,  17 => 2,  450 => 215,  446 => 214,  442 => 213,  438 => 212,  434 => 211,  430 => 210,  426 => 209,  422 => 208,  418 => 207,  414 => 206,  410 => 205,  406 => 204,  402 => 203,  398 => 202,  393 => 201,  388 => 199,  385 => 198,  380 => 166,  374 => 24,  370 => 23,  365 => 22,  362 => 21,  356 => 6,  349 => 31,  345 => 30,  341 => 29,  337 => 28,  333 => 27,  327 => 21,  297 => 217,  295 => 198,  271 => 176,  265 => 173,  254 => 167,  214 => 133,  210 => 131,  208 => 130,  205 => 129,  199 => 126,  195 => 124,  193 => 123,  176 => 112,  170 => 110,  168 => 109,  165 => 108,  158 => 104,  153 => 102,  142 => 94,  137 => 92,  126 => 84,  121 => 82,  115 => 78,  113 => 77,  110 => 76,  103 => 34,  98 => 32,  93 => 67,  91 => 66,  74 => 58,  69 => 22,  64 => 54,  59 => 52,  43 => 45,  27 => 4,  22 => 4,  334 => 155,  329 => 25,  326 => 152,  323 => 151,  313 => 145,  309 => 6,  303 => 4,  287 => 128,  279 => 123,  276 => 122,  270 => 121,  262 => 172,  260 => 171,  256 => 117,  252 => 166,  247 => 112,  242 => 110,  237 => 109,  235 => 108,  228 => 104,  224 => 103,  220 => 136,  213 => 98,  209 => 97,  201 => 91,  190 => 86,  186 => 84,  182 => 114,  177 => 80,  173 => 78,  169 => 76,  167 => 75,  156 => 67,  150 => 66,  144 => 62,  140 => 60,  136 => 58,  134 => 57,  128 => 54,  124 => 53,  112 => 44,  105 => 40,  101 => 39,  97 => 38,  89 => 28,  85 => 63,  83 => 30,  79 => 60,  67 => 24,  62 => 21,  60 => 20,  57 => 19,  54 => 50,  49 => 48,  46 => 14,  32 => 4,  29 => 33,);
    }
}
