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

/* database/routines/row.twig */
class __TwigTemplate_72ec426364b06c7eca56b3e894df917be1b225d5fe99d7f6d03ae5c0971c2230 extends \Twig\Template
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
        echo "<tr";
        if ( !twig_test_empty(($context["row_class"] ?? null))) {
            echo " class=\"";
            echo twig_escape_filter($this->env, ($context["row_class"] ?? null), "html", null, true);
            echo "\"";
        }
        echo " data-filter-row=\"";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["routine"] ?? null), "name", [], "any", false, false, false, 1)), "html", null, true);
        echo "\">
  <td>
    <input type=\"checkbox\" class=\"checkall\" name=\"item_name[]\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["routine"] ?? null), "name", [], "any", false, false, false, 3), "html", null, true);
        echo "\">
  </td>
  <td>
    <span class=\"drop_sql hide\">";
        // line 6
        echo twig_escape_filter($this->env, ($context["sql_drop"] ?? null), "html", null, true);
        echo "</span>
    <strong>";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["routine"] ?? null), "name", [], "any", false, false, false, 7), "html", null, true);
        echo "</strong>
  </td>
  <td>
    ";
        // line 10
        if (($context["has_edit_privilege"] ?? null)) {
            // line 11
            echo "      <a class=\"ajax edit_anchor\" href=\"";
            echo PhpMyAdmin\Url::getFromRoute("/database/routines", ["db" =>             // line 12
($context["db"] ?? null), "table" =>             // line 13
($context["table"] ?? null), "edit_item" => true, "item_name" => twig_get_attribute($this->env, $this->source,             // line 15
($context["routine"] ?? null), "name", [], "any", false, false, false, 15), "item_type" => twig_get_attribute($this->env, $this->source,             // line 16
($context["routine"] ?? null), "type", [], "any", false, false, false, 16)]);
            // line 17
            echo "\">
        ";
            // line 18
            echo \PhpMyAdmin\Html\Generator::getIcon("b_edit", _gettext("Edit"));
            echo "
      </a>
    ";
        } else {
            // line 21
            echo "      ";
            echo \PhpMyAdmin\Html\Generator::getIcon("bd_edit", _gettext("Edit"));
            echo "
    ";
        }
        // line 23
        echo "  </td>
  <td>
    ";
        // line 25
        if ((($context["has_execute_privilege"] ?? null) &&  !twig_test_empty(($context["execute_action"] ?? null)))) {
            // line 26
            echo "      ";
            if ((($context["execute_action"] ?? null) == "execute_routine")) {
                // line 27
                echo "        <a class=\"ajax exec_anchor\" href=\"";
                echo PhpMyAdmin\Url::getFromRoute("/database/routines", ["db" => ($context["db"] ?? null), "table" => ($context["table"] ?? null)]);
                echo "\" data-post=\"";
                echo PhpMyAdmin\Url::getCommon(["execute_routine" => true, "item_name" => twig_get_attribute($this->env, $this->source,                 // line 29
($context["routine"] ?? null), "name", [], "any", false, false, false, 29), "item_type" => twig_get_attribute($this->env, $this->source,                 // line 30
($context["routine"] ?? null), "type", [], "any", false, false, false, 30)], "");
                // line 31
                echo "\">
          ";
                // line 32
                echo \PhpMyAdmin\Html\Generator::getIcon("b_nextpage", _gettext("Execute"));
                echo "
        </a>
      ";
            } else {
                // line 35
                echo "        <a class=\"ajax exec_anchor\" href=\"";
                echo PhpMyAdmin\Url::getFromRoute("/database/routines", ["db" =>                 // line 36
($context["db"] ?? null), "table" =>                 // line 37
($context["table"] ?? null), "execute_dialog" => true, "item_name" => twig_get_attribute($this->env, $this->source,                 // line 39
($context["routine"] ?? null), "name", [], "any", false, false, false, 39), "item_type" => twig_get_attribute($this->env, $this->source,                 // line 40
($context["routine"] ?? null), "type", [], "any", false, false, false, 40)]);
                // line 41
                echo "\">
          ";
                // line 42
                echo \PhpMyAdmin\Html\Generator::getIcon("b_nextpage", _gettext("Execute"));
                echo "
        </a>
      ";
            }
            // line 45
            echo "    ";
        } else {
            // line 46
            echo "      ";
            echo \PhpMyAdmin\Html\Generator::getIcon("bd_nextpage", _gettext("Execute"));
            echo "
    ";
        }
        // line 48
        echo "  </td>
  <td>
    ";
        // line 50
        if (($context["has_export_privilege"] ?? null)) {
            // line 51
            echo "      <a class=\"ajax export_anchor\" href=\"";
            echo PhpMyAdmin\Url::getFromRoute("/database/routines", ["db" =>             // line 52
($context["db"] ?? null), "table" =>             // line 53
($context["table"] ?? null), "export_item" => true, "item_name" => twig_get_attribute($this->env, $this->source,             // line 55
($context["routine"] ?? null), "name", [], "any", false, false, false, 55), "item_type" => twig_get_attribute($this->env, $this->source,             // line 56
($context["routine"] ?? null), "type", [], "any", false, false, false, 56)]);
            // line 57
            echo "\">
        ";
            // line 58
            echo \PhpMyAdmin\Html\Generator::getIcon("b_export", _gettext("Export"));
            echo "
      </a>
    ";
        } else {
            // line 61
            echo "      ";
            echo \PhpMyAdmin\Html\Generator::getIcon("bd_export", _gettext("Export"));
            echo "
    ";
        }
        // line 63
        echo "  </td>
  <td>
    ";
        // line 65
        echo PhpMyAdmin\Html\Generator::linkOrButton(PhpMyAdmin\Url::getFromRoute("/sql", ["db" =>         // line 67
($context["db"] ?? null), "table" =>         // line 68
($context["table"] ?? null), "sql_query" =>         // line 69
($context["sql_drop"] ?? null), "goto" => PhpMyAdmin\Url::getFromRoute("/database/routines", ["db" =>         // line 70
($context["db"] ?? null)])]), \PhpMyAdmin\Html\Generator::getIcon("b_drop", _gettext("Drop")), ["class" => "ajax drop_anchor"]);
        // line 74
        echo "
  </td>
  <td>
    ";
        // line 77
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["routine"] ?? null), "type", [], "any", false, false, false, 77), "html", null, true);
        echo "
  </td>
  <td dir=\"ltr\">
    ";
        // line 80
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["routine"] ?? null), "returns", [], "any", false, false, false, 80), "html", null, true);
        echo "
  </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "database/routines/row.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 80,  182 => 77,  177 => 74,  175 => 70,  174 => 69,  173 => 68,  172 => 67,  171 => 65,  167 => 63,  161 => 61,  155 => 58,  152 => 57,  150 => 56,  149 => 55,  148 => 53,  147 => 52,  145 => 51,  143 => 50,  139 => 48,  133 => 46,  130 => 45,  124 => 42,  121 => 41,  119 => 40,  118 => 39,  117 => 37,  116 => 36,  114 => 35,  108 => 32,  105 => 31,  103 => 30,  102 => 29,  98 => 27,  95 => 26,  93 => 25,  89 => 23,  83 => 21,  77 => 18,  74 => 17,  72 => 16,  71 => 15,  70 => 13,  69 => 12,  67 => 11,  65 => 10,  59 => 7,  55 => 6,  49 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "database/routines/row.twig", "/var/www/html/phpMyAdmin-5.1.0-all-languages/templates/database/routines/row.twig");
    }
}
