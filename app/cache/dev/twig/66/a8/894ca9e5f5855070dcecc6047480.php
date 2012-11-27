<?php

/* WebProfilerBundle:Profiler:toolbar_js.html.twig */
class __TwigTemplate_66a8894ca9e5f5855070dcecc6047480 extends Twig_Template
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
        // line 1
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" style=\"display: none\"></div>
<script type=\"text/javascript\">/*<![CDATA[*/
    (function () {
        var wdt, xhr;
        wdt = document.getElementById('sfwdt";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "');
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xhr.open('GET', '";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(state) {
            if (4 === xhr.readyState && 200 === xhr.status && -1 !== xhr.responseText.indexOf('sf-toolbarreset')) {
                wdt.innerHTML = xhr.responseText;
                wdt.style.display = 'block';
            }
        };
        xhr.send('');
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 11,  25 => 5,  17 => 1,  450 => 215,  446 => 214,  442 => 213,  438 => 212,  434 => 211,  430 => 210,  426 => 209,  422 => 208,  418 => 207,  414 => 206,  410 => 205,  406 => 204,  402 => 203,  398 => 202,  393 => 201,  388 => 199,  385 => 198,  380 => 166,  374 => 24,  370 => 23,  365 => 22,  362 => 21,  356 => 6,  349 => 31,  345 => 30,  341 => 29,  337 => 28,  333 => 27,  329 => 25,  327 => 21,  309 => 6,  303 => 4,  297 => 217,  295 => 198,  271 => 176,  265 => 173,  262 => 172,  260 => 171,  254 => 167,  252 => 166,  220 => 136,  214 => 133,  210 => 131,  208 => 130,  205 => 129,  199 => 126,  195 => 124,  193 => 123,  182 => 114,  176 => 112,  170 => 110,  168 => 109,  165 => 108,  158 => 104,  153 => 102,  142 => 94,  137 => 92,  126 => 84,  121 => 82,  115 => 78,  113 => 77,  110 => 76,  103 => 72,  98 => 70,  93 => 67,  91 => 66,  85 => 63,  79 => 60,  74 => 58,  69 => 56,  64 => 54,  59 => 52,  54 => 50,  49 => 48,  43 => 45,  29 => 33,  22 => 1,  56 => 17,  51 => 15,  46 => 13,  41 => 10,  38 => 8,  35 => 7,  30 => 4,  27 => 4,);
    }
}
