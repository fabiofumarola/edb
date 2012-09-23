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
        return array (  103 => 34,  98 => 32,  95 => 31,  89 => 28,  86 => 27,  84 => 26,  75 => 24,  69 => 22,  58 => 18,  51 => 16,  48 => 15,  42 => 12,  39 => 11,  37 => 10,  34 => 9,  28 => 6,  25 => 5,  22 => 4,  20 => 3,  17 => 2,  276 => 127,  272 => 125,  266 => 124,  250 => 110,  242 => 105,  239 => 104,  233 => 103,  225 => 101,  223 => 100,  219 => 99,  215 => 97,  210 => 94,  205 => 92,  200 => 91,  198 => 90,  191 => 86,  187 => 85,  183 => 84,  176 => 80,  172 => 79,  164 => 73,  153 => 68,  149 => 66,  145 => 65,  140 => 62,  136 => 60,  132 => 58,  130 => 57,  120 => 49,  116 => 47,  112 => 45,  110 => 44,  104 => 41,  100 => 33,  88 => 31,  81 => 25,  77 => 26,  73 => 25,  65 => 20,  61 => 19,  59 => 17,  55 => 17,  43 => 11,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
