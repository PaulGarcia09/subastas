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

/* server/collations/index.twig */
class __TwigTemplate_973258747380c7aed81aea31eea2a79a6d41be33bb30cb3cac43e884776011ce extends \Twig\Template
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
        echo "<div class=container-fluid>
<div class=\"row\">
  <h2>
    ";
        // line 4
        echo \PhpMyAdmin\Html\Generator::getImage("s_asci");
        echo "
    ";
        // line 5
        echo _gettext("Character sets and collations");
        // line 6
        echo "  </h2>
</div>

<div class=\"table-responsive\">
  <table class=\"table table-light table-striped table-hover table-sm\">
    <thead class=\"thead-light\">
      <tr>
        <th scope=\"col\">";
        // line 13
        echo _gettext("Collation");
        echo "</th>
        <th scope=\"col\">";
        // line 14
        echo _gettext("Description");
        echo "</th>
      </tr>
    </thead>

    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
            // line 19
            echo "      <tr>
        <th colspan=\"2\" class=\"table-primary\">
          ";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 21), "html", null, true);
            echo "
          ";
            // line 22
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 22))) {
                // line 23
                echo "            (<em>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 23), "html", null, true);
                echo "</em>)
          ";
            }
            // line 25
            echo "        </th>
      </tr>
      ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 27));
            foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                // line 28
                echo "        <tr";
                echo ((twig_get_attribute($this->env, $this->source, $context["collation"], "is_default", [], "any", false, false, false, 28)) ? (" class=\"table-info\"") : (""));
                echo ">
          <td>
            ";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 30), "html", null, true);
                echo "
            ";
                // line 31
                if (twig_get_attribute($this->env, $this->source, $context["collation"], "is_default", [], "any", false, false, false, 31)) {
                    // line 32
                    echo "              <span class=\"sr-only\">";
                    echo _gettext("(default)");
                    echo "</span>
            ";
                }
                // line 34
                echo "          </td>
          <td>";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 35), "html", null, true);
                echo "</td>
        </tr>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "  </table>
</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "server/collations/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 39,  126 => 38,  117 => 35,  114 => 34,  108 => 32,  106 => 31,  102 => 30,  96 => 28,  92 => 27,  88 => 25,  82 => 23,  80 => 22,  76 => 21,  72 => 19,  68 => 18,  61 => 14,  57 => 13,  48 => 6,  46 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/collations/index.twig", "/var/www/html/phpMyAdmin-5.1.0-all-languages/templates/server/collations/index.twig");
    }
}
