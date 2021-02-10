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

/* base.html.twig */
class __TwigTemplate_390ff628e0edcae704c2d64473480f5569a3b2c1849116da1368901a66fc6a62 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'styles' => [$this, 'block_styles'],
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
            'javascripts' => [$this, 'block_javascripts'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 8
        echo "        ";
        $this->displayBlock('styles', $context, $blocks);
        // line 9
        echo "    </head>
    <body>
        ";
        // line 11
        $this->displayBlock('header', $context, $blocks);
        // line 72
        echo "        ";
        $this->displayBlock('body', $context, $blocks);
        // line 73
        echo "        ";
        $this->displayBlock('footer', $context, $blocks);
        // line 145
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 146
        echo "        ";
        $this->displayBlock('scripts', $context, $blocks);
        // line 147
        echo "    </body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackLinkTags("app");
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 8
    public function block_styles($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "styles"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "styles"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 11
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 12
        echo "            <div class=\"header\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <div class=\"header-left\">
                                <div class=\"logo\">
                                    <a href=\"";
        // line 18
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("productall");
        echo "\">
                                        <img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/logo.png"), "html", null, true);
        echo "\" alt=\"Example\" />
                                    </a>
                                </div>
                                <div class=\"menu\">
                                    <a class=\"toggleMenu\" href=\"#\"><img src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/1.jpg"), "html", null, true);
        echo "\" alt=\"\" /></a>
                                    <ul class=\"nav\" id=\"nav\">
                                        <li class=\"current\"><a href=\"shop.html\">Shop</a></li>
                                        <li><a href=\"team.html\">Team</a></li>
                                        <li><a href=\"experiance.html\">Events</a></li>
                                        <li><a href=\"experiance.html\">Experiance</a></li>
                                        <li><a href=\"shop.html\">Company</a></li>
                                        <li><a href=\"contact.html\">Contact</a></li>
                                        <div class=\"clear\"></div>
                                    </ul>
                                </div>
                                <div class=\"clear\"></div>
                            </div>
                            <div class=\"header_right\">
                                <div class=\"search-box\">
                                    <div id=\"sb-search\" class=\"sb-search\">
                                        <form>
                                            <input class=\"sb-search-input\" placeholder=\"Enter your search term...\" type=\"search\" name=\"search\" id=\"search\">
                                            <input class=\"sb-search-submit\" type=\"submit\" value=\"\">
                                            <span class=\"sb-icon-search\"> </span>
                                        </form>
                                    </div>
                                </div>
                                <ul class=\"icon1 sub-icon1 profile_img\">
                                    <li><a class=\"active-icon c1\" href=\"#\"> </a>
                                        <ul class=\"sub-icon1 list\">
                                            <div class=\"product_control_buttons\">
                                                <a href=\"#\"><img src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/edit.png"), "html", null, true);
        echo "\" alt=\"\"/></a>
                                                <a href=\"#\"><img src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/close_edit.png"), "html", null, true);
        echo "\" alt=\"\"/></a>
                                            </div>
                                            <div class=\"clear\"></div>
                                            <li class=\"list_img\"><img src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/1.jpg"), "html", null, true);
        echo "\" alt=\"\"/></li>
                                            <li class=\"list_desc\"><h4><a href=\"#\">velit esse molestie</a></h4><span class=\"actual\">1 x \$12.00</span></li>
                                            <div class=\"login_buttons\">
                                                <div class=\"check_button\"><a href=\"checkout.html\">Check out</a></div>
                                                <div class=\"login_button\"><a href=\"login.html\">Login</a></div>
                                                <div class=\"clear\"></div>
                                            </div>
                                            <div class=\"clear\"></div>
                                        </ul>
                                    </li>
                                </ul>
                                <div class=\"clear\"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 72
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 73
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 74
        echo "            <div class=\"footer\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-md-3\">
                            <ul class=\"footer_box\">
                                <h4>Products</h4>
                                <li><a href=\"#\">Mens</a></li>
                                <li><a href=\"#\">Womens</a></li>
                                <li><a href=\"#\">Youth</a></li>
                            </ul>
                        </div>
                        <div class=\"col-md-3\">
                            <ul class=\"footer_box\">
                                <h4>About</h4>
                                <li><a href=\"#\">Careers and internships</a></li>
                                <li><a href=\"#\">Sponserships</a></li>
                                <li><a href=\"#\">team</a></li>
                                <li><a href=\"#\">Catalog Request/Download</a></li>
                            </ul>
                        </div>
                        <div class=\"col-md-3\">
                            <ul class=\"footer_box\">
                                <h4>Customer Support</h4>
                                <li><a href=\"#\">Contact Us</a></li>
                                <li><a href=\"#\">Shipping and Order Tracking</a></li>
                                <li><a href=\"#\">Easy Returns</a></li>
                                <li><a href=\"#\">Warranty</a></li>
                                <li><a href=\"#\">Replacement Binding Parts</a></li>
                            </ul>
                        </div>
                        <div class=\"col-md-3\">
                            <ul class=\"footer_box\">
                                <h4>Newsletter</h4>
                                <div class=\"footer_search\">
                                    <form>
                                        <input type=\"text\" value=\"Enter your email\" onfocus=\"this.value = '';\" onblur=\"if (this.value == '') {this.value = 'Enter your email';}\">
                                        <input type=\"submit\" value=\"Go\">
                                    </form>
                                </div>
                                <ul class=\"social\">
                                    <li class=\"facebook\"><a href=\"#\"><span> </span></a></li>
                                    <li class=\"twitter\"><a href=\"#\"><span> </span></a></li>
                                    <li class=\"instagram\"><a href=\"#\"><span> </span></a></li>
                                    <li class=\"pinterest\"><a href=\"#\"><span> </span></a></li>
                                    <li class=\"youtube\"><a href=\"#\"><span> </span></a></li>
                                </ul>

                            </ul>
                        </div>
                    </div>
                    <div class=\"row footer_bottom\">
                        <div class=\"copy\">
                            <p>© 2014 Template by <a href=\"http://w3layouts.com\" target=\"_blank\">w3layouts</a></p>
                        </div>
                        <dl id=\"sample\" class=\"dropdown\">
                            <dt><a href=\"#\"><span>Change Region</span></a></dt>
                            <dd>
                                <ul>
                                    <li><a href=\"#\">Australia<img class=\"flag\" src=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/as.png"), "html", null, true);
        echo "\" alt=\"\" /><span class=\"value\">AS</span></a></li>
                                    <li><a href=\"#\">Sri Lanka<img class=\"flag\" src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/srl.png"), "html", null, true);
        echo "\" alt=\"\" /><span class=\"value\">SL</span></a></li>
                                    <li><a href=\"#\">Newziland<img class=\"flag\" src=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/nz.png"), "html", null, true);
        echo "\" alt=\"\" /><span class=\"value\">NZ</span></a></li>
                                    <li><a href=\"#\">Pakistan<img class=\"flag\" src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/pk.png"), "html", null, true);
        echo "\" alt=\"\" /><span class=\"value\">Pk</span></a></li>
                                    <li><a href=\"#\">United Kingdom<img class=\"flag\" src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/uk.png"), "html", null, true);
        echo "\" alt=\"\" /><span class=\"value\">UK</span></a></li>
                                    <li><a href=\"#\">United States<img class=\"flag\" src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/us.png"), "html", null, true);
        echo "\" alt=\"\" /><span class=\"value\">US</span></a></li>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 145
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("app");
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 146
    public function block_scripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "scripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "scripts"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  395 => 146,  376 => 145,  358 => 137,  354 => 136,  350 => 135,  346 => 134,  342 => 133,  338 => 132,  278 => 74,  268 => 73,  250 => 72,  222 => 54,  216 => 51,  212 => 50,  182 => 23,  175 => 19,  171 => 18,  163 => 12,  153 => 11,  135 => 8,  116 => 7,  97 => 5,  85 => 147,  82 => 146,  79 => 145,  76 => 73,  73 => 72,  71 => 11,  67 => 9,  64 => 8,  62 => 7,  57 => 5,  51 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Welcome!{% endblock %}</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        {% block stylesheets %}{{ encore_entry_link_tags('app') }}{% endblock %}
        {% block styles %}{% endblock %}
    </head>
    <body>
        {% block header %}
            <div class=\"header\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <div class=\"header-left\">
                                <div class=\"logo\">
                                    <a href=\"{{ path('productall') }}\">
                                        <img src=\"{{ asset('build/images/logo.png') }}\" alt=\"Example\" />
                                    </a>
                                </div>
                                <div class=\"menu\">
                                    <a class=\"toggleMenu\" href=\"#\"><img src=\"{{ asset('build/images/1.jpg') }}\" alt=\"\" /></a>
                                    <ul class=\"nav\" id=\"nav\">
                                        <li class=\"current\"><a href=\"shop.html\">Shop</a></li>
                                        <li><a href=\"team.html\">Team</a></li>
                                        <li><a href=\"experiance.html\">Events</a></li>
                                        <li><a href=\"experiance.html\">Experiance</a></li>
                                        <li><a href=\"shop.html\">Company</a></li>
                                        <li><a href=\"contact.html\">Contact</a></li>
                                        <div class=\"clear\"></div>
                                    </ul>
                                </div>
                                <div class=\"clear\"></div>
                            </div>
                            <div class=\"header_right\">
                                <div class=\"search-box\">
                                    <div id=\"sb-search\" class=\"sb-search\">
                                        <form>
                                            <input class=\"sb-search-input\" placeholder=\"Enter your search term...\" type=\"search\" name=\"search\" id=\"search\">
                                            <input class=\"sb-search-submit\" type=\"submit\" value=\"\">
                                            <span class=\"sb-icon-search\"> </span>
                                        </form>
                                    </div>
                                </div>
                                <ul class=\"icon1 sub-icon1 profile_img\">
                                    <li><a class=\"active-icon c1\" href=\"#\"> </a>
                                        <ul class=\"sub-icon1 list\">
                                            <div class=\"product_control_buttons\">
                                                <a href=\"#\"><img src=\"{{ asset('build/images/edit.png') }}\" alt=\"\"/></a>
                                                <a href=\"#\"><img src=\"{{ asset('build/images/close_edit.png') }}\" alt=\"\"/></a>
                                            </div>
                                            <div class=\"clear\"></div>
                                            <li class=\"list_img\"><img src=\"{{ asset('build/images/1.jpg') }}\" alt=\"\"/></li>
                                            <li class=\"list_desc\"><h4><a href=\"#\">velit esse molestie</a></h4><span class=\"actual\">1 x \$12.00</span></li>
                                            <div class=\"login_buttons\">
                                                <div class=\"check_button\"><a href=\"checkout.html\">Check out</a></div>
                                                <div class=\"login_button\"><a href=\"login.html\">Login</a></div>
                                                <div class=\"clear\"></div>
                                            </div>
                                            <div class=\"clear\"></div>
                                        </ul>
                                    </li>
                                </ul>
                                <div class=\"clear\"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {% endblock %}
        {% block body %}{% endblock %}
        {% block footer %}
            <div class=\"footer\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-md-3\">
                            <ul class=\"footer_box\">
                                <h4>Products</h4>
                                <li><a href=\"#\">Mens</a></li>
                                <li><a href=\"#\">Womens</a></li>
                                <li><a href=\"#\">Youth</a></li>
                            </ul>
                        </div>
                        <div class=\"col-md-3\">
                            <ul class=\"footer_box\">
                                <h4>About</h4>
                                <li><a href=\"#\">Careers and internships</a></li>
                                <li><a href=\"#\">Sponserships</a></li>
                                <li><a href=\"#\">team</a></li>
                                <li><a href=\"#\">Catalog Request/Download</a></li>
                            </ul>
                        </div>
                        <div class=\"col-md-3\">
                            <ul class=\"footer_box\">
                                <h4>Customer Support</h4>
                                <li><a href=\"#\">Contact Us</a></li>
                                <li><a href=\"#\">Shipping and Order Tracking</a></li>
                                <li><a href=\"#\">Easy Returns</a></li>
                                <li><a href=\"#\">Warranty</a></li>
                                <li><a href=\"#\">Replacement Binding Parts</a></li>
                            </ul>
                        </div>
                        <div class=\"col-md-3\">
                            <ul class=\"footer_box\">
                                <h4>Newsletter</h4>
                                <div class=\"footer_search\">
                                    <form>
                                        <input type=\"text\" value=\"Enter your email\" onfocus=\"this.value = '';\" onblur=\"if (this.value == '') {this.value = 'Enter your email';}\">
                                        <input type=\"submit\" value=\"Go\">
                                    </form>
                                </div>
                                <ul class=\"social\">
                                    <li class=\"facebook\"><a href=\"#\"><span> </span></a></li>
                                    <li class=\"twitter\"><a href=\"#\"><span> </span></a></li>
                                    <li class=\"instagram\"><a href=\"#\"><span> </span></a></li>
                                    <li class=\"pinterest\"><a href=\"#\"><span> </span></a></li>
                                    <li class=\"youtube\"><a href=\"#\"><span> </span></a></li>
                                </ul>

                            </ul>
                        </div>
                    </div>
                    <div class=\"row footer_bottom\">
                        <div class=\"copy\">
                            <p>© 2014 Template by <a href=\"http://w3layouts.com\" target=\"_blank\">w3layouts</a></p>
                        </div>
                        <dl id=\"sample\" class=\"dropdown\">
                            <dt><a href=\"#\"><span>Change Region</span></a></dt>
                            <dd>
                                <ul>
                                    <li><a href=\"#\">Australia<img class=\"flag\" src=\"{{ asset('build/images/as.png') }}\" alt=\"\" /><span class=\"value\">AS</span></a></li>
                                    <li><a href=\"#\">Sri Lanka<img class=\"flag\" src=\"{{ asset('build/images/srl.png') }}\" alt=\"\" /><span class=\"value\">SL</span></a></li>
                                    <li><a href=\"#\">Newziland<img class=\"flag\" src=\"{{ asset('build/images/nz.png') }}\" alt=\"\" /><span class=\"value\">NZ</span></a></li>
                                    <li><a href=\"#\">Pakistan<img class=\"flag\" src=\"{{ asset('build/images/pk.png') }}\" alt=\"\" /><span class=\"value\">Pk</span></a></li>
                                    <li><a href=\"#\">United Kingdom<img class=\"flag\" src=\"{{ asset('build/images/uk.png') }}\" alt=\"\" /><span class=\"value\">UK</span></a></li>
                                    <li><a href=\"#\">United States<img class=\"flag\" src=\"{{ asset('build/images/us.png') }}\" alt=\"\" /><span class=\"value\">US</span></a></li>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        {% endblock %}
        {% block javascripts %}{{ encore_entry_script_tags('app') }}{% endblock %}
        {% block scripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/var/www/symfony/templates/base.html.twig");
    }
}
