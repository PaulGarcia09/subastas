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

/* server/replication/index.twig */
class __TwigTemplate_fc32f3ceada59a2758a7eadcb68d1c8241b579a986474e8bb2741b2a8f8b990a extends \Twig\Template
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
        echo "<div class=\"container-fluid\">
<div class=\"row\">
<h2>
  ";
        // line 4
        echo \PhpMyAdmin\Html\Generator::getImage("s_replication");
        echo "
  ";
        // line 5
        echo _gettext("Replication");
        // line 6
        echo "</h2>
</div>

";
        // line 9
        if (($context["is_super_user"] ?? null)) {
            // line 10
            echo "<div class=\"row\">
  <div id=\"replication\" class=\"container-fluid\">
    ";
            // line 12
            echo ($context["error_messages"] ?? null);
            echo "

    ";
            // line 14
            if (($context["is_master"] ?? null)) {
                // line 15
                echo "      ";
                echo ($context["master_replication_html"] ?? null);
                echo "
    ";
            } elseif (((null ===             // line 16
($context["master_configure"] ?? null)) && (null === ($context["clear_screen"] ?? null)))) {
                // line 17
                echo "      <div class=\"card mb-2\">
        <div class=\"card-header\">";
                // line 18
                echo _gettext("Master replication");
                echo "</div>
        <div class=\"card-body\">
        ";
                // line 20
                ob_start(function () { return ''; });
                // line 21
                echo "          ";
                echo _gettext("This server is not configured as master in a replication process. Would you like to %sconfigure%s it?");
                // line 24
                echo "        ";
                $___internal_69f644f491bbc51374b95243f4d520224579c55ccc550bead34f2f78b3581b52_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 20
                echo sprintf($___internal_69f644f491bbc51374b95243f4d520224579c55ccc550bead34f2f78b3581b52_, (((("<a href=\"" . PhpMyAdmin\Url::getFromRoute("/server/replication")) . "\" data-post=\"") . PhpMyAdmin\Url::getCommon(twig_array_merge(($context["url_params"] ?? null), ["mr_configure" => true]), "")) . "\">"), "</a>");
                // line 25
                echo "        </div>
      </div>
    ";
            }
            // line 28
            echo "
    ";
            // line 29
            if ( !(null === ($context["master_configure"] ?? null))) {
                // line 30
                echo "      ";
                echo ($context["master_configuration_html"] ?? null);
                echo "
    ";
            } else {
                // line 32
                echo "      ";
                if ((null === ($context["clear_screen"] ?? null))) {
                    // line 33
                    echo "        ";
                    echo ($context["slave_configuration_html"] ?? null);
                    echo "
      ";
                }
                // line 35
                echo "      ";
                if ( !(null === ($context["slave_configure"] ?? null))) {
                    // line 36
                    echo "        ";
                    echo ($context["change_master_html"] ?? null);
                    echo "
      ";
                }
                // line 38
                echo "    ";
            }
            // line 39
            echo "  </div>
</div>
</div>
";
        } else {
            // line 43
            echo "  ";
            echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("No privileges")]);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "server/replication/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 43,  128 => 39,  125 => 38,  119 => 36,  116 => 35,  110 => 33,  107 => 32,  101 => 30,  99 => 29,  96 => 28,  91 => 25,  89 => 20,  86 => 24,  83 => 21,  81 => 20,  76 => 18,  73 => 17,  71 => 16,  66 => 15,  64 => 14,  59 => 12,  55 => 10,  53 => 9,  48 => 6,  46 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/replication/index.twig", "/var/www/html/phpMyAdmin-5.1.0-all-languages/templates/server/replication/index.twig");
    }
}
