<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @AdvancedParameters/memcache_servers.html.twig */
class __TwigTemplate_5b917d5072bc8b967998754654e3e4360d1e2d3790cc4e012a162944baa21e82 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'perfs_memcache_servers' => [$this, 'block_perfs_memcache_servers'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 26
        echo "
";
        // line 27
        $this->displayBlock('perfs_memcache_servers', $context, $blocks);
    }

    public function block_perfs_memcache_servers($context, array $blocks = [])
    {
        // line 28
        echo "<div class=\"form-group row memcache\" id=\"new-server-btn\">
    <a
        class=\"btn btn-default\"
        data-toggle=\"collapse\"
        href=\"#server-form\"
        aria-expanded=\"false\"
        aria-controls=\"server-form\"
    ><i class=\"material-icons\">add_circle</i> ";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add server", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</a>
</div>

<div id=\"server-form\" class=\"collapse\">
    <div class=\"form-group row\">
        <label class=\"form-control-label\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("IP Address", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
        <div class=\"col-sm\">
          ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "memcache_ip", []), 'errors');
        echo "
          ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "memcache_ip", []), 'widget');
        echo "
        </div>
    </div>

    <div class=\"form-group row\">
        <label class=\"form-control-label\">";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Port", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
        <div class=\"col-sm\">
          ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "memcache_port", []), 'errors');
        echo "
          ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "memcache_port", []), 'widget');
        echo "
        </div>
    </div>

    <div class=\"form-group row\">
        <label class=\"form-control-label\">";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Weight", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
        <div class=\"col-sm\">
          ";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "memcache_weight", []), 'errors');
        echo "
          ";
        // line 59
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "memcache_weight", []), 'widget');
        echo "
        </div>
    </div>

    ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'rest');
        echo "

    <div class=\"form-group\">
        <div class=\"float-right\">
            <button id=\"add-server-btn\" class=\"btn btn-primary\">";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add Server", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</button>
            <button id=\"test-server-btn\" class=\"btn btn-primary\">";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Test Server", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</button>
        </div>
    </div>
</div>

<div id=\"servers-list\" class=\"memcache\">
    <div class=\"form-group\">
        <table class=\"table\" id=\"servers-table\">
            <thead>
            <tr>
                <th class=\"fixed-width-xs\"><span class=\"title_box\">";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("ID", [], "Admin.Global"), "html", null, true);
        echo "</span></th>
                <th><span class=\"title_box\">";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("IP Address", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</span></th>
                <th class=\"fixed-width-xs\"><span class=\"title_box\">";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Port", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</span></th>
                <th class=\"fixed-width-xs\"><span class=\"title_box\">";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Weight", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</span></th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["servers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["server"]) {
            // line 87
            echo "                <tr id=\"row_";
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "id_memcached_server", []), "html", null, true);
            echo "\">
                    <td>";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "id_memcached_server", []), "html", null, true);
            echo "</td>
                    <td>";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "ip", []), "html", null, true);
            echo "</td>
                    <td>";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "port", []), "html", null, true);
            echo "</td>
                    <td>";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "weight", []), "html", null, true);
            echo "</td>
                    <td>
                        ";
            // line 93
            $context["removeMsg"] = twig_jsonencode_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Do you really want to remove the server %serverIp%:%serverPort% ?", ["%serverIp%" => $this->getAttribute($context["server"], "ip", []), "%serverPort%" => $this->getAttribute($context["server"], "port", [])], "Admin.Advparameters.Notification"));
            // line 94
            echo "                        <a class=\"btn btn-default\" href=\"\" onclick=\"app.removeServer(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "id_memcached_server", []), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, ($context["removeMsg"] ?? null), "html", null, true);
            echo ");\"><i class=\"material-icons\">remove_circle</i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Remove", [], "Admin.Actions"), "html", null, true);
            echo "</a>
                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['server'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        echo "            </tbody>
        </table>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@AdvancedParameters/memcache_servers.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  194 => 98,  179 => 94,  177 => 93,  172 => 91,  168 => 90,  164 => 89,  160 => 88,  155 => 87,  151 => 86,  143 => 81,  139 => 80,  135 => 79,  131 => 78,  118 => 68,  114 => 67,  107 => 63,  100 => 59,  96 => 58,  91 => 56,  83 => 51,  79 => 50,  74 => 48,  66 => 43,  62 => 42,  57 => 40,  49 => 35,  40 => 28,  34 => 27,  31 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@AdvancedParameters/memcache_servers.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\AdvancedParameters\\memcache_servers.html.twig");
    }
}
