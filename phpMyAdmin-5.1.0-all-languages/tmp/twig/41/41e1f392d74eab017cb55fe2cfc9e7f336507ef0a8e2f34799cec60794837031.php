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

/* server/replication/slave_configuration.twig */
class __TwigTemplate_3377ebc2f30323c46a7aefd5b60e4a6d99d9202af735a7103e5954a2528e6500 extends \Twig\Template
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
        echo "<div class=\"card\">
  <div class=\"card-header\">";
        // line 2
        echo _gettext("Slave replication");
        echo "</div>
  <div class=\"card-body\">
  ";
        // line 4
        if (($context["server_slave_multi_replication"] ?? null)) {
            // line 5
            echo "    ";
            echo _gettext("Master connection:");
            // line 6
            echo "    <form method=\"get\" action=\"";
            echo PhpMyAdmin\Url::getFromRoute("/server/replication");
            echo "\">
      ";
            // line 7
            echo PhpMyAdmin\Url::getHiddenInputs(($context["url_params"] ?? null));
            echo "
      <select name=\"master_connection\">
        <option value=\"\">";
            // line 9
            echo _gettext("Default");
            echo "</option>
        ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["server_slave_multi_replication"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["server"]) {
                // line 11
                echo "          <option value=\"";
                echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["server"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["Connection_name"] ?? null) : null), "html", null, true);
                echo "\"";
                echo (((($context["master_connection"] ?? null) == (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["server"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["Connection_name"] ?? null) : null))) ? (" selected") : (""));
                echo ">
            ";
                // line 12
                echo twig_escape_filter($this->env, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["server"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["Connection_name"] ?? null) : null), "html", null, true);
                echo "
          </option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['server'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "      </select>
      <input id=\"goButton\" class=\"btn btn-primary\" type=\"submit\" value=\"";
            // line 16
            echo _gettext("Go");
            echo "\">
    </form>
    <br>
    <br>
  ";
        }
        // line 21
        echo "
  ";
        // line 22
        if (($context["server_slave_status"] ?? null)) {
            // line 23
            echo "    <div id=\"slave_configuration_gui\">
      ";
            // line 24
            if ( !($context["slave_sql_running"] ?? null)) {
                // line 25
                echo "        ";
                echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("Slave SQL Thread not running!")]);
                echo "
      ";
            }
            // line 27
            echo "      ";
            if ( !($context["slave_io_running"] ?? null)) {
                // line 28
                echo "        ";
                echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("Slave IO Thread not running!")]);
                echo "
      ";
            }
            // line 30
            echo "
      <p>";
            // line 31
            echo _gettext("Server is configured as slave in a replication process. Would you like to:");
            echo "</p>
      <ul>
        <li>
          <a href=\"#slave_status_href\" id=\"slave_status_href\">";
            // line 34
            echo _gettext("See slave status table");
            echo "</a>
          ";
            // line 35
            echo ($context["slave_status_table"] ?? null);
            echo "
        </li>
        <li>
          <a href=\"#slave_control_href\" id=\"slave_control_href\">";
            // line 38
            echo _gettext("Control slave:");
            echo "</a>
          <div id=\"slave_control_gui\" class=\"hide\">
            <ul>
              <li>
                <a href=\"";
            // line 42
            echo PhpMyAdmin\Url::getFromRoute("/server/replication");
            echo "\" data-post=\"";
            echo ($context["slave_control_full_link"] ?? null);
            echo "\">
                  ";
            // line 43
            echo ((( !($context["slave_io_running"] ?? null) ||  !($context["slave_sql_running"] ?? null))) ? ("Full start") : ("Full stop"));
            echo "
                </a>
              </li>
              <li>
                <a class=\"ajax\" id=\"reset_slave\" href=\"";
            // line 47
            echo PhpMyAdmin\Url::getFromRoute("/server/replication");
            echo "\" data-post=\"";
            echo ($context["slave_control_reset_link"] ?? null);
            echo "\">
                  ";
            // line 48
            echo _gettext("Reset slave");
            // line 49
            echo "                </a>
              </li>
              <li>
                <a href=\"";
            // line 52
            echo PhpMyAdmin\Url::getFromRoute("/server/replication");
            echo "\" data-post=\"";
            echo ($context["slave_control_sql_link"] ?? null);
            echo "\">
                  ";
            // line 53
            if ( !($context["slave_sql_running"] ?? null)) {
                // line 54
                echo "                    ";
                echo _gettext("Start SQL Thread only");
                // line 55
                echo "                  ";
            } else {
                // line 56
                echo "                    ";
                echo _gettext("Stop SQL Thread only");
                // line 57
                echo "                  ";
            }
            // line 58
            echo "                </a>
              </li>
              <li>
                <a href=\"";
            // line 61
            echo PhpMyAdmin\Url::getFromRoute("/server/replication");
            echo "\" data-post=\"";
            echo ($context["slave_control_io_link"] ?? null);
            echo "\">
                  ";
            // line 62
            if ( !($context["slave_io_running"] ?? null)) {
                // line 63
                echo "                    ";
                echo _gettext("Start IO Thread only");
                // line 64
                echo "                  ";
            } else {
                // line 65
                echo "                    ";
                echo _gettext("Stop IO Thread only");
                // line 66
                echo "                  ";
            }
            // line 67
            echo "                </a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href=\"#slave_errormanagement_href\" id=\"slave_errormanagement_href\">
            ";
            // line 74
            echo _gettext("Error management:");
            // line 75
            echo "          </a>
          <div id=\"slave_errormanagement_gui\" class=\"hide\">
            ";
            // line 77
            echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("Skipping errors might lead into unsynchronized master and slave!")]);
            echo "
            <ul>
              <li>
                <a href=\"";
            // line 80
            echo PhpMyAdmin\Url::getFromRoute("/server/replication");
            echo "\" data-post=\"";
            echo ($context["slave_skip_error_link"] ?? null);
            echo "\">
                  ";
            // line 81
            echo _gettext("Skip current error");
            // line 82
            echo "                </a>
              </li>
              <li>
                <form method=\"post\" action=\"";
            // line 85
            echo PhpMyAdmin\Url::getFromRoute("/server/replication");
            echo "\">
                  ";
            // line 86
            echo PhpMyAdmin\Url::getHiddenInputs("", "");
            echo "
                  ";
            // line 87
            echo sprintf(_gettext("Skip next %s errors."), "<input type=\"text\" name=\"sr_skip_errors_count\" value=\"1\" class=\"repl_gui_skip_err_cnt\">");
            echo "
                  <input class=\"btn btn-primary\" type=\"submit\" name=\"sr_slave_skip_error\" value=\"";
            // line 88
            echo _gettext("Go");
            echo "\">
                  <input type=\"hidden\" name=\"sr_take_action\" value=\"1\">
                </form>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href=\"";
            // line 96
            echo PhpMyAdmin\Url::getFromRoute("/server/replication");
            echo "\" data-post=\"";
            echo ($context["reconfigure_master_link"] ?? null);
            echo "\">
            ";
            // line 97
            echo _gettext("Change or reconfigure master server");
            // line 98
            echo "          </a>
        </li>
      </ul>
    </div>
  ";
        } elseif ( !        // line 102
($context["has_slave_configure"] ?? null)) {
            // line 103
            echo "    ";
            ob_start(function () { return ''; });
            // line 107
            echo "      ";
            echo _gettext("This server is not configured as slave in a replication process. Would you like to %sconfigure%s it?");
            // line 108
            echo "    ";
            $___internal_f9ed5a062b0665a3633c8f56316cc350c5184bec6de6cdf59e9c82a998954583_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 103
            echo sprintf($___internal_f9ed5a062b0665a3633c8f56316cc350c5184bec6de6cdf59e9c82a998954583_, (((("<a href=\"" . PhpMyAdmin\Url::getFromRoute("/server/replication")) . "\" data-post=\"") . PhpMyAdmin\Url::getCommon(twig_array_merge(($context["url_params"] ?? null), ["sl_configure" => true, "repl_clear_scr" => true]))) . "\">"), "</a>");
            // line 109
            echo "  ";
        }
        // line 110
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "server/replication/slave_configuration.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  304 => 110,  301 => 109,  299 => 103,  296 => 108,  293 => 107,  290 => 103,  288 => 102,  282 => 98,  280 => 97,  274 => 96,  263 => 88,  259 => 87,  255 => 86,  251 => 85,  246 => 82,  244 => 81,  238 => 80,  232 => 77,  228 => 75,  226 => 74,  217 => 67,  214 => 66,  211 => 65,  208 => 64,  205 => 63,  203 => 62,  197 => 61,  192 => 58,  189 => 57,  186 => 56,  183 => 55,  180 => 54,  178 => 53,  172 => 52,  167 => 49,  165 => 48,  159 => 47,  152 => 43,  146 => 42,  139 => 38,  133 => 35,  129 => 34,  123 => 31,  120 => 30,  114 => 28,  111 => 27,  105 => 25,  103 => 24,  100 => 23,  98 => 22,  95 => 21,  87 => 16,  84 => 15,  75 => 12,  68 => 11,  64 => 10,  60 => 9,  55 => 7,  50 => 6,  47 => 5,  45 => 4,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/replication/slave_configuration.twig", "/var/www/html/phpMyAdmin-5.1.0-all-languages/templates/server/replication/slave_configuration.twig");
    }
}
