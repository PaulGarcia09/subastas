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

/* server/status/variables/index.twig */
class __TwigTemplate_08565e2dd7008f0956e410ad0c15f6409759bf5a4f791ef566b7b6b2af7cafd9 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "server/status/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $context["active"] = "variables";
        // line 1
        $this->parent = $this->loadTemplate("server/status/base.twig", "server/status/variables/index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
";
        // line 5
        if (($context["is_data_loaded"] ?? null)) {
            // line 6
            echo "<div class=\"row\">
  <fieldset id=\"tableFilter\">
    <legend>";
            // line 8
            echo _gettext("Filters");
            echo "</legend>
    <form action=\"";
            // line 9
            echo PhpMyAdmin\Url::getFromRoute("/server/status/variables");
            echo "\" method=\"post\">
      ";
            // line 10
            echo PhpMyAdmin\Url::getHiddenInputs();
            echo "

      <input class=\"btn btn-secondary\" type=\"submit\" value=\"";
            // line 12
            echo _gettext("Refresh");
            echo "\">

      <div class=\"formelement\">
        <label for=\"filterText\">";
            // line 15
            echo _gettext("Containing the word:");
            echo "</label>
        <input name=\"filterText\" type=\"text\" id=\"filterText\" value=\"";
            // line 16
            echo twig_escape_filter($this->env, ($context["filter_text"] ?? null), "html", null, true);
            echo "\">
      </div>

      <div class=\"formelement\">
        <input type=\"checkbox\" name=\"filterAlert\" id=\"filterAlert\"";
            // line 20
            echo ((($context["is_only_alerts"] ?? null)) ? (" checked") : (""));
            echo ">
        <label for=\"filterAlert\">
          ";
            // line 22
            echo _gettext("Show only alert values");
            // line 23
            echo "        </label>
      </div>

      <div class=\"formelement\">
        <select id=\"filterCategory\" name=\"filterCategory\">
          <option value=\"\">";
            // line 28
            echo _gettext("Filter by category…");
            echo "</option>
          ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 30
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 30), "html", null, true);
                echo "\"";
                echo ((twig_get_attribute($this->env, $this->source, $context["category"], "is_selected", [], "any", false, false, false, 30)) ? (" selected") : (""));
                echo ">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 30), "html", null, true);
                echo "</option>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "        </select>
      </div>

      <div class=\"formelement\">
        <input type=\"checkbox\" name=\"dontFormat\" id=\"dontFormat\"";
            // line 36
            echo ((($context["is_not_formatted"] ?? null)) ? (" checked") : (""));
            echo ">
        <label for=\"dontFormat\">
          ";
            // line 38
            echo _gettext("Show unformatted values");
            // line 39
            echo "        </label>
      </div>
    </form>
  </fieldset>
</div>

  <div id=\"linkSuggestions\" class=\"defaultLinks hide\">
    <p class=\"alert alert-primary\" role=\"alert\">
      ";
            // line 47
            echo _gettext("Related links:");
            // line 48
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 49
                echo "        <span class=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["link"], "name", [], "any", false, false, false, 49), "html", null, true);
                echo "\">
          ";
                // line 50
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["link"], "links", [], "any", false, false, false, 50));
                foreach ($context['_seq'] as $context["link_name"] => $context["link_url"]) {
                    // line 51
                    echo "            ";
                    if (($context["link_name"] == "doc")) {
                        // line 52
                        echo "              ";
                        echo \PhpMyAdmin\Html\MySQLDocumentation::show($context["link_url"]);
                        echo "
            ";
                    } else {
                        // line 54
                        echo "              <a href=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["link_url"], "url", [], "any", false, false, false, 54), "html", null, true);
                        echo "\"";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["link_url"], "params", [], "any", false, false, false, 54))) {
                            echo " data-post=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["link_url"], "params", [], "any", false, false, false, 54), "html", null, true);
                            echo "\"";
                        }
                        echo ">";
                        echo twig_escape_filter($this->env, $context["link_name"], "html", null, true);
                        echo "</a>
            ";
                    }
                    // line 56
                    echo "            |
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['link_name'], $context['link_url'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 58
                echo "        </span>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "    </p>
  </div>

  <div class=\"responsivetable row\">
    <table class=\"table table-light table-striped table-hover table-sm\" id=\"serverStatusVariables\">
      <colgroup>
        <col class=\"namecol\">
        <col class=\"valuecol\">
        <col class=\"descrcol\">
      </colgroup>
      <thead class=\"thead-light\">
        <tr>
          <th scope=\"col\">";
            // line 72
            echo _gettext("Variable");
            echo "</th>
          <th scope=\"col\">";
            // line 73
            echo _gettext("Value");
            echo "</th>
          <th scope=\"col\">";
            // line 74
            echo _gettext("Description");
            echo "</th>
        </tr>
      </thead>
      <tbody>
        ";
            // line 78
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["variables"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["variable"]) {
                // line 79
                echo "          <tr";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["variable"], "class", [], "any", false, false, false, 79))) {
                    echo " class=\"s_";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variable"], "class", [], "any", false, false, false, 79), "html", null, true);
                    echo "\"";
                }
                echo ">
            <th class=\"name\">
              ";
                // line 81
                echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["variable"], "name", [], "any", false, false, false, 81), ["_" => " "]), "html", null, true);
                echo "
              ";
                // line 82
                echo twig_get_attribute($this->env, $this->source, $context["variable"], "doc", [], "any", false, false, false, 82);
                echo "
            </th>

            <td class=\"value text-monospace text-right\">
              <span class=\"formatted\">
                ";
                // line 87
                if (twig_get_attribute($this->env, $this->source, $context["variable"], "has_alert", [], "any", false, false, false, 87)) {
                    // line 88
                    echo "                  <span class=\"";
                    echo ((twig_get_attribute($this->env, $this->source, $context["variable"], "is_alert", [], "any", false, false, false, 88)) ? ("attention") : ("allfine"));
                    echo "\">
                ";
                }
                // line 90
                echo "
                ";
                // line 91
                if ((is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, $context["variable"], "name", [], "any", false, false, false, 91)) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = "%") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 === substr($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, -strlen($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144))))) {
                    // line 92
                    echo "                  ";
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber(twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 92), 0, 2), "html", null, true);
                    echo " %
                ";
                } elseif (twig_in_filter("Uptime", twig_get_attribute($this->env, $this->source,                 // line 93
$context["variable"], "name", [], "any", false, false, false, 93))) {
                    // line 94
                    echo "                  ";
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::timespanFormat(twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 94)), "html", null, true);
                    echo "
                ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 95
$context["variable"], "is_numeric", [], "any", false, false, false, 95) && (twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 95) >= 1000))) {
                    // line 96
                    echo "                  <abbr title=\"";
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber(twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 96), 0), "html", null, true);
                    echo "\">
                    ";
                    // line 97
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber(twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 97), 3, 1), "html", null, true);
                    echo "
                  </abbr>
                ";
                } elseif (twig_get_attribute($this->env, $this->source,                 // line 99
$context["variable"], "is_numeric", [], "any", false, false, false, 99)) {
                    // line 100
                    echo "                  ";
                    echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber(twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 100), 3, 1), "html", null, true);
                    echo "
                ";
                } else {
                    // line 102
                    echo "                  ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 102), "html", null, true);
                    echo "
                ";
                }
                // line 104
                echo "
                ";
                // line 105
                if (twig_get_attribute($this->env, $this->source, $context["variable"], "has_alert", [], "any", false, false, false, 105)) {
                    // line 106
                    echo "                  </span>
                ";
                }
                // line 108
                echo "              </span>
              <span class=\"original hide\">
                ";
                // line 110
                if (twig_get_attribute($this->env, $this->source, $context["variable"], "has_alert", [], "any", false, false, false, 110)) {
                    // line 111
                    echo "                  <span class=\"";
                    echo ((twig_get_attribute($this->env, $this->source, $context["variable"], "is_alert", [], "any", false, false, false, 111)) ? ("attention") : ("allfine"));
                    echo "\">
                ";
                }
                // line 113
                echo "                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variable"], "value", [], "any", false, false, false, 113), "html", null, true);
                echo "
                ";
                // line 114
                if (twig_get_attribute($this->env, $this->source, $context["variable"], "has_alert", [], "any", false, false, false, 114)) {
                    // line 115
                    echo "                  </span>
                ";
                }
                // line 117
                echo "              </span>
            </td>

            <td class=\"w-50\">
              ";
                // line 121
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variable"], "description", [], "any", false, false, false, 121), "html", null, true);
                echo "
              ";
                // line 122
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["variable"], "description_doc", [], "any", false, false, false, 122));
                foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
                    // line 123
                    echo "                ";
                    if ((twig_get_attribute($this->env, $this->source, $context["doc"], "name", [], "any", false, false, false, 123) == "doc")) {
                        // line 124
                        echo "                  ";
                        echo \PhpMyAdmin\Html\MySQLDocumentation::show(twig_get_attribute($this->env, $this->source, $context["doc"], "url", [], "any", false, false, false, 124));
                        echo "
                ";
                    } else {
                        // line 126
                        echo "                  <a href=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["doc"], "url", [], "any", false, false, false, 126), "url", [], "any", false, false, false, 126), "html", null, true);
                        echo "\" data-post=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["doc"], "url", [], "any", false, false, false, 126), "params", [], "any", false, false, false, 126), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["doc"], "name", [], "any", false, false, false, 126), "html", null, true);
                        echo "</a>
                ";
                    }
                    // line 128
                    echo "              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 129
                echo "            </td>
          </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variable'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            echo "      </tbody>
    </table>
  </div>
";
        } else {
            // line 136
            echo "  ";
            echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("Not enough privilege to view status variables.")]);
            echo "
";
        }
        // line 138
        echo "
";
    }

    public function getTemplateName()
    {
        return "server/status/variables/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  400 => 138,  394 => 136,  388 => 132,  380 => 129,  374 => 128,  364 => 126,  358 => 124,  355 => 123,  351 => 122,  347 => 121,  341 => 117,  337 => 115,  335 => 114,  330 => 113,  324 => 111,  322 => 110,  318 => 108,  314 => 106,  312 => 105,  309 => 104,  303 => 102,  297 => 100,  295 => 99,  290 => 97,  285 => 96,  283 => 95,  278 => 94,  276 => 93,  271 => 92,  269 => 91,  266 => 90,  260 => 88,  258 => 87,  250 => 82,  246 => 81,  236 => 79,  232 => 78,  225 => 74,  221 => 73,  217 => 72,  203 => 60,  196 => 58,  189 => 56,  175 => 54,  169 => 52,  166 => 51,  162 => 50,  157 => 49,  152 => 48,  150 => 47,  140 => 39,  138 => 38,  133 => 36,  127 => 32,  114 => 30,  110 => 29,  106 => 28,  99 => 23,  97 => 22,  92 => 20,  85 => 16,  81 => 15,  75 => 12,  70 => 10,  66 => 9,  62 => 8,  58 => 6,  56 => 5,  53 => 4,  49 => 3,  44 => 1,  42 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/status/variables/index.twig", "/var/www/html/phpMyAdmin-5.1.0-all-languages/templates/server/status/variables/index.twig");
    }
}
