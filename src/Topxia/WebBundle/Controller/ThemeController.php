<?php

namespace Topxia\WebBundle\Controller;

use Topxia\WebBundle\Controller\BaseController;

class ThemeController extends BaseController
{
    public function getCurrentConfigColorAction($isEditColor = false)
    {
        $config = $this->getThemeService()->getCurrentThemeConfig();

        return $this->render("TopxiaWebBundle:Default:stylesheet.html.twig", array(
            'config'      => $config,
            'isEditColor' => $isEditColor
        ));
    }

    public function getCurrentConfigBottomAction($isIndex = null)
    {
        $config = $this->getThemeService()->getCurrentThemeConfig();

        if ($isIndex) {
            $config = $config['confirmConfig']['bottom'];
        } else {
            $config = $config['config']['bottom'];
        }

        return $this->render("TopxiaWebBundle:Default:{$config}-bottom.html.twig");
    }

    private function getThemeService()
    {
        return $this->getServiceKernel()->createService('Theme.ThemeService');
    }

    private function getCategoryService()
    {
        return $this->getServiceKernel()->createService('Taxonomy.CategoryService');
    }
}
