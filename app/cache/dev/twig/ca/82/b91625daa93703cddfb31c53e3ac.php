<?php

/* KddeEdbBundle:Form:fields.html.twig */
class __TwigTemplate_ca82b91625daa93703cddfb31c53e3ac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'field_widget' => array($this, 'block_field_widget'),
            'field_row' => array($this, 'block_field_row'),
            'textarea_widget' => array($this, 'block_textarea_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('field_widget', $context, $blocks);
        // line 9
        echo "


";
        // line 12
        $this->displayBlock('field_row', $context, $blocks);
        // line 21
        echo "
";
        // line 22
        $this->displayBlock('textarea_widget', $context, $blocks);
    }

    // line 1
    public function block_field_widget($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter($this->getContext($context, "type"), "text")) : ("text"));
        // line 3
        echo "    \t<input class=\"input-xlarge\" type=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "type"), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
        echo "\" />
    
    ";
        // line 5
        if (array_key_exists("help", $context)) {
            // line 6
            echo "        <span class=\"help\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "help"), "html", null, true);
            echo "</span>
    ";
        }
    }

    // line 12
    public function block_field_row($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"control-group\">
        ";
        // line 14
        echo $this->env->getExtension('form')->renderLabel($this->getContext($context, "form"), null, array("attr" => array("class" => "control-label")));
        echo "
        ";
        // line 15
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
        <div class=\"controls\">
        \t";
        // line 17
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
        </div>
\t</div>
";
    }

    // line 22
    public function block_textarea_widget($context, array $blocks = array())
    {
        // line 23
        echo "\t\t<textarea class=\"input-xlarge\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "value"), "html", null, true);
        echo "\" ></textarea>
";
    }

    public function getTemplateName()
    {
        return "KddeEdbBundle:Form:fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  88 => 23,  85 => 22,  77 => 17,  65 => 13,  36 => 1,  32 => 22,  29 => 21,  27 => 12,  22 => 9,  20 => 1,  21 => 4,  26 => 8,  59 => 24,  42 => 3,  39 => 2,  35 => 17,  17 => 1,  633 => 464,  629 => 463,  624 => 461,  621 => 460,  618 => 459,  604 => 448,  555 => 401,  544 => 399,  540 => 398,  405 => 265,  394 => 263,  390 => 262,  370 => 244,  359 => 242,  355 => 241,  346 => 234,  335 => 232,  331 => 231,  286 => 188,  275 => 186,  271 => 185,  263 => 179,  252 => 177,  248 => 176,  150 => 80,  118 => 48,  107 => 46,  103 => 45,  90 => 35,  84 => 34,  74 => 26,  72 => 15,  70 => 24,  68 => 14,  66 => 22,  64 => 21,  62 => 12,  60 => 19,  58 => 18,  56 => 17,  54 => 6,  52 => 5,  50 => 32,  48 => 13,  46 => 20,  44 => 11,  41 => 10,  38 => 9,  33 => 6,  30 => 5,  25 => 3,);
    }
}
