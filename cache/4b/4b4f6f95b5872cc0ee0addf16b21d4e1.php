<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* Home/index.html */
class __TwigTemplate_2d918853ece248b4af37d8cc6b60f1b4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"UTF-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
    <title>Twig Home</title>
  </head>
  <body>
    <h1>Welcome to Twig</h1>
    <p>Hello from a Twig template, ";
        // line 11
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "</p>

    <ul>
      ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["colours"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["colour"]) {
            // line 15
            echo "      <li>";
            echo twig_escape_filter($this->env, $context["colour"], "html", null, true);
            echo "</li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['colour'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "    </ul>
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "Home/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 17,  59 => 15,  55 => 14,  49 => 11,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "Home/index.html", "C:\\Users\\alexsandro.santos\\Documents\\Dev\\Projects\\php-mvc-course\\App\\Views\\Home\\index.html");
    }
}
