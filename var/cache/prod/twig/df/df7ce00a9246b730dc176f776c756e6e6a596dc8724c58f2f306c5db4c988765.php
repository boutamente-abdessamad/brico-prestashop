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

/* @PrestaShop/Admin/Improve/Design/positions.html.twig */
class __TwigTemplate_bc471709fae2cd658d51717d702f6598ae4c4123fdc201768343b4f43e8a2418 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/Design/positions.html.twig", 25);
        $this->blocks = [
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        // line 29
        echo "  <div class=\"row\">
    ";
        // line 30
        if ( !($context["canMove"] ?? null)) {
            // line 31
            echo "      <p class=\"alert alert-warning\">
        ";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If you want to order/move the following data, please select a shop from the shop list.", [], "Admin.Design.Notification"), "html", null, true);
            echo "
      </p>
    ";
        }
        // line 35
        echo "
    <div class=\"card col-9\">
      <div class=\"card-body\">
        <div class=\"card\">
          <form class=\"mt-2\" id=\"position-filters\">
            <div class=\"container\">
              <div class=\"row\">
                <div class=\"row col-md-12 col-lg-6\">
                  <label class=\"form-control-label col-4 text-left mt-1\">";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Show", [], "Admin.Actions"), "html", null, true);
        echo "</label>
                  <div class=\"col-8\">
                    <select id=\"show-modules\" class=\"filter\">
                      <option value=\"all\">";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("All modules", [], "Admin.Design.Feature"), "html", null, true);
        echo "&nbsp;</option>
                      ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 48
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "id", []), "html", null, true);
            echo "\"";
            if ((($context["selectedModule"] ?? null) == $this->getAttribute($context["module"], "id", []))) {
                echo " selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "displayName", []), "html", null, true);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                    </select>
                  </div>
                </div>

                <div class=\"row col-md-12 col-lg-6\">
                  <label class=\"form-control-label col-5 text-center mt-1\">";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search for a hook", [], "Admin.Design.Feature"), "html", null, true);
        echo "</label>
                  <div class=\"input-group col-7\">
                    <div class=\"input-group-prepend\">
                      <div class=\"input-group-text\">
                        <i class=\"material-icons\">search</i>
                      </div>
                    </div>
                    <input type=\"text\" class=\"form-control\" id=\"hook-search\" name=\"hook-search\" placeholder=\"\">
                  </div>
                </div>
              </div>
            </div>

            <div class=\"container mt-3\">
              <div class=\"row\">
                <div class=\"col-lg-12\">
                  <p class=\"checkbox\">
                    <label class=\"form-control-label\" for=\"hook-position\">
                      <input type=\"checkbox\" id=\"hook-position\"/>
                      ";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display non-positionable hooks", [], "Admin.Design.Feature"), "html", null, true);
        echo "
                    </label>
                  </p>
                </div>
              </div>
            </div>
          </form>
        </div>

        <form id=\"module-positions-form\" method=\"post\" action=\"";
        // line 83
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_modules_positions_unhook");
        echo "\" data-update-url=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("api_improve_design_positions_update");
        echo "\">
          ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 85
            echo "            <section class=\"hook-panel";
            if ( !$this->getAttribute($context["hook"], "position", [], "array")) {
                echo " hook-position";
            }
            echo "\"";
            if ( !$this->getAttribute($context["hook"], "position", [], "array")) {
                echo " style=\"display:none;\"";
            }
            echo ">
              <a name=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "name", [], "array"), "html", null, true);
            echo "\"></a>
              <header class=\"hook-panel-header\">
                <span class=\"hook-name\">";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "name", [], "array"), "html", null, true);
            echo "</span>
                <label class=\"badge badge-primary badge-pill float-right\">
                  ";
            // line 90
            if (($this->getAttribute($context["hook"], "modules_count", [], "array") && ($context["canMove"] ?? null))) {
                // line 91
                echo "                    <input type=\"checkbox\" class=\"hook-checker\" id=\"Ghook";
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                echo "\" data-hook-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                echo "\" />
                  ";
            }
            // line 93
            echo "
                  ";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "modules_count", [], "array"), "html", null, true);
            echo "
                  ";
            // line 95
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(((($this->getAttribute($context["hook"], "modules_count", [], "array") > 1)) ? ("Modules") : ("Module")), [], "Admin.Global"), "html", null, true);
            echo "
                </label>

                ";
            // line 98
            if ($this->getAttribute($context["hook"], "description", [], "array", true, true)) {
                // line 99
                echo "                  <div class=\"hook_description\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "description", [], "array"), "html", null, true);
                echo "</div>
                ";
            }
            // line 101
            echo "              </header>

              ";
            // line 103
            if ($this->getAttribute($context["hook"], "modules_count", [], "array")) {
                // line 104
                echo "                <section class=\"module-list\">
                  <ul class=\"list-unstyled";
                // line 105
                if (($this->getAttribute($context["hook"], "modules_count", [], "array") > 1)) {
                    echo " sortable";
                }
                echo "\">
                    ";
                // line 106
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["hook"], "modules", [], "array"));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                    if ($this->getAttribute(($context["modules"] ?? null), $this->getAttribute($context["module"], "id_module", [], "array"), [], "array", true, true)) {
                        // line 107
                        echo "                      ";
                        $context["moduleInstance"] = $this->getAttribute(($context["modules"] ?? null), $this->getAttribute($context["module"], "id_module", [], "array"), [], "array");
                        // line 108
                        echo "                      <li id=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                        echo "\"
                        class=\"module-position-";
                        // line 109
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "id", []), "html", null, true);
                        echo " module-item";
                        if ((($context["canMove"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") >= 2))) {
                            echo " draggable";
                        }
                        echo "\">

                        <div class=\"module-column-select\">
                          <input type=\"checkbox\" data-hook-id=\"";
                        // line 112
                        echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                        echo "\" class=\"modules-position-checkbox hook";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                        echo "\" name=\"unhooks[]\" value=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                        echo "\"/>
                        </div>

                        ";
                        // line 115
                        if (( !($context["selectedModule"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") > 1))) {
                            // line 116
                            echo "                          <div class=\"btn-toolbar text-center module-column-position";
                            if ((($context["canMove"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") >= 2))) {
                                echo " dragHandle";
                            }
                            echo "\" id=\"td_";
                            echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                            echo "\">
                            <div class=\"btn-group\">
                              <span class=\"index-position\">";
                            // line 118
                            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                            echo "</span>
                            </div>

                            ";
                            // line 121
                            if (($context["canMove"] ?? null)) {
                                // line 122
                                echo "                              <div class=\"btn-group-vertical module-buttons-update\">
                                <button class=\"btn btn-outline-primary btn-sm\"
                                  data-hook-id=\"";
                                // line 124
                                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                                echo "\"
                                  data-module-id=\"";
                                // line 125
                                echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "id", []), "html", null, true);
                                echo "\"
                                  data-way=\"0\">
                                  <i class=\"material-icons\">expand_less</i>
                                </button>

                                <button class=\"btn btn-outline-primary btn-sm\"
                                  data-hook-id=\"";
                                // line 131
                                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                                echo "\"
                                  data-module-id=\"";
                                // line 132
                                echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "id", []), "html", null, true);
                                echo "\"
                                  data-way=\"1\">
                                  <i class=\"material-icons\">expand_more</i>
                                </button>
                              </div>
                            ";
                            }
                            // line 138
                            echo "                          </div>
                        ";
                        }
                        // line 140
                        echo "
                        <div class=\"module-column-icon\">
                          <img src=\"";
                        // line 142
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl((("../modules/" . $this->getAttribute(($context["moduleInstance"] ?? null), "name", [])) . "/logo.png")), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "displayName", []));
                        echo "\" />
                        </div>

                        <div class=\"module-column-infos\">
                          <span class=\"module-name\">
                            ";
                        // line 147
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "displayName", []));
                        echo "
                            ";
                        // line 148
                        if ($this->getAttribute(($context["moduleInstance"] ?? null), "version", [])) {
                            // line 149
                            echo "                              <small class=\"text-muted\">&nbsp;-&nbsp;";
                            echo twig_escape_filter($this->env, sprintf("v%s", $this->getAttribute(($context["moduleInstance"] ?? null), "version", [])), "html", null, true);
                            echo "</small>
                            ";
                        }
                        // line 151
                        echo "                          </span>
                          <div class=\"module-description\">";
                        // line 152
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "description", []));
                        echo "</div>
                        </div>

                        <div class=\"module-column-actions\">
                          <div class=\"btn-group\">
                            ";
                        // line 157
                        $context["linkParams"] = ["id_module" => $this->getAttribute(                        // line 158
($context["moduleInstance"] ?? null), "id", []), "id_hook" => $this->getAttribute(                        // line 159
$context["hook"], "id_hook", [], "array"), "editGraft" => 1];
                        // line 162
                        echo "                            ";
                        if (($context["selectedModule"] ?? null)) {
                            // line 163
                            echo "                              ";
                            $context["linkParams"] = twig_array_merge(($context["linkParams"] ?? null), ["show_modules" => ($context["selectedModule"] ?? null)]);
                            // line 164
                            echo "                            ";
                        }
                        // line 165
                        echo "
                            <a class=\"btn btn-outline-primary btn-sm\" href=\"";
                        // line 166
                        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminModulesPositions", true, ($context["linkParams"] ?? null)), "html", null, true);
                        echo "\">
                              <i class=\"material-icons\">edit</i>
                              ";
                        // line 168
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Edit", [], "Admin.Actions"), "html", null, true);
                        echo "
                            </a>

                            <button class=\"btn btn-outline-primary btn-sm dropdown-toggle-split\" data-toggle=\"dropdown\" type=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\" data-reference=\"parent\">
                              <i class=\"material-icons\">expand_more</i>
                            </button>

                            <div class=\"dropdown-menu\">
                              <a class=\"dropdown-item\" href=\"";
                        // line 176
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_modules_positions_unhook", ["moduleId" => $this->getAttribute(($context["moduleInstance"] ?? null), "id", []), "hookId" => $this->getAttribute($context["hook"], "id_hook", [], "array")]), "html", null, true);
                        echo "\">
                                <i class=\"material-icons\">indeterminate_check_box</i>
                                ";
                        // line 178
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unhook", [], "Admin.Design.Feature"), "html", null, true);
                        echo "
                              </a>
                            </div>
                          </div>
                        </div>
                      </li>
                    ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 185
                echo "                  </ul>
                </section>
              ";
            }
            // line 188
            echo "            </section>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 190
        echo "
          <div id=\"unhook-button-position-bottom\">
            <button type=\"submit\" class=\"btn btn-default\" name=\"unhookform\">
              <i class=\"material-icons\">indeterminate_check_box</i>
              ";
        // line 194
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unhook the selection", [], "Admin.Design.Feature"), "html", null, true);
        echo "
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class=\"col-3\">
      <div class=\"card\" id=\"modules-position-selection-panel\">
        <h3 class=\"card-header\"><i class=\"material-icons\">checked</i> ";
        // line 203
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Selection", [], "Admin.Global"), "html", null, true);
        echo "</h3>
        <div class=\"card-body\">
          <p>
            <span id=\"modules-position-single-selection\">";
        // line 206
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("1 module selected", [], "Admin.Design.Feature"), "html", null, true);
        echo "</span>
            <span id=\"modules-position-multiple-selection\">
              <span id=\"modules-position-selection-count\"></span> ";
        // line 208
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("modules selected", [], "Admin.Design.Feature"), "html", null, true);
        echo "
            </span>
          </p>
          <div class=\"text-center\">
            <button class=\"btn btn-primary\"><i class=\"icon-remove\"></i> ";
        // line 212
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unhook the selection", [], "Admin.Design.Feature"), "html", null, true);
        echo "</button>
          </div>
        </div>
      </div>
    </div>
  </div>
";
    }

    // line 220
    public function block_javascripts($context, array $blocks = [])
    {
        // line 221
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script src=\"";
        // line 222
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/improve_design_positions.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/positions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  465 => 222,  460 => 221,  457 => 220,  446 => 212,  439 => 208,  434 => 206,  428 => 203,  416 => 194,  410 => 190,  403 => 188,  398 => 185,  381 => 178,  376 => 176,  365 => 168,  360 => 166,  357 => 165,  354 => 164,  351 => 163,  348 => 162,  346 => 159,  345 => 158,  344 => 157,  336 => 152,  333 => 151,  327 => 149,  325 => 148,  321 => 147,  311 => 142,  307 => 140,  303 => 138,  294 => 132,  290 => 131,  281 => 125,  277 => 124,  273 => 122,  271 => 121,  265 => 118,  255 => 116,  253 => 115,  243 => 112,  233 => 109,  228 => 108,  225 => 107,  214 => 106,  208 => 105,  205 => 104,  203 => 103,  199 => 101,  193 => 99,  191 => 98,  185 => 95,  181 => 94,  178 => 93,  170 => 91,  168 => 90,  163 => 88,  158 => 86,  147 => 85,  143 => 84,  137 => 83,  125 => 74,  103 => 55,  96 => 50,  81 => 48,  77 => 47,  73 => 46,  67 => 43,  57 => 35,  51 => 32,  48 => 31,  46 => 30,  43 => 29,  40 => 28,  22 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/positions.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\positions.html.twig");
    }
}
