<?php

/* KddeEdbBundle:Search:index.html.twig */
class __TwigTemplate_bd65c5cf2f118dcfb37dc43031316a40 extends Twig_Template
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
        echo " EDB History Page
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "
";
        // line 10
        echo "
<h3 class=\"well\"> Edb can be Queried using 3 possible levels of search</h3>

<p><strong><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_search_basic"), "html", null, true);
        echo "\">Basic Search</a> </strong>: allows <em> queries </em> using combination of possible values consideres as basilar for the topic.</p>

<p><strong><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_search_medium"), "html", null, true);
        echo "\">Medium Search</a> </strong>: reserved only for registered users. This search allows the use of more fields for research than those of the basic search.</p>

<p><strong><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_search_advanced"), "html", null, true);
        echo "\">Advanced Search</a> </strong>: reserved to EDB Curators. It allows advanced searches.</p>

";
    }

    public function getTemplateName()
    {
        return "KddeEdbBundle:Search:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 17,  51 => 15,  46 => 13,  41 => 10,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
