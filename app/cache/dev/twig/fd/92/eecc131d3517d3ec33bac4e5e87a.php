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
        return array (  85 => 40,  66 => 24,  58 => 19,  55 => 18,  49 => 16,  47 => 15,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
