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

/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card.html.twig */
class __TwigTemplate_0620d7e22d7133dc9e295193d91827bdadea2571c8277b6d1f0b93fc823a019d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 26
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card_container.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card.html.twig", 26);
        $this->blocks = [
            'content' => [$this, 'block_content'],
            'image' => [$this, 'block_image'],
            'button_container' => [$this, 'block_button_container'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card_container.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        // line 29
        echo "  <div class=\"card theme-card\">
    <div class=\"active-card-overlay ";
        // line 30
        echo ((($context["isActive"] ?? null)) ? ("active") : (""));
        echo "\"></div>

    ";
        // line 32
        $this->displayBlock('image', $context, $blocks);
        // line 34
        echo "
    <div class=\"actions-container ";
        // line 35
        echo ((($context["isActive"] ?? null)) ? ("active") : (""));
        echo "\">
      ";
        // line 36
        $this->displayBlock('button_container', $context, $blocks);
        // line 38
        echo "    </div>
  </div>

  <div class=\"text-center theme-card-description\">
    <b class=\"theme-name\">
      ";
        // line 43
        echo twig_escape_filter($this->env, ($context["themeName"] ?? null), "html", null, true);
        echo "
    </b>
    <span class=\"theme-version\">
      ";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Version", [], "Admin.Global"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["themeVersion"] ?? null), "html", null, true);
        echo "
    </span>
    <div class=\"theme-author\">
      ";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Designed by %s", ["%s" => ($context["themeAuthor"] ?? null)], "Admin.Design.Feature"), "html", null, true);
        echo "
    </div>
  </div>
";
    }

    // line 32
    public function block_image($context, array $blocks = [])
    {
        // line 33
        echo "    ";
    }

    // line 36
    public function block_button_container($context, array $blocks = [])
    {
        // line 37
        echo "      ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 37,  99 => 36,  95 => 33,  92 => 32,  84 => 49,  76 => 46,  70 => 43,  63 => 38,  61 => 36,  57 => 35,  54 => 34,  52 => 32,  47 => 30,  44 => 29,  41 => 28,  22 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/Partials/theme_card.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\Theme\\Blocks\\Partials\\theme_card.html.twig");
    }
}
