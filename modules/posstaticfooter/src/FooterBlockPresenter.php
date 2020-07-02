<?php

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

class FooterBlockPresenter
{
    private $link;
    private $language;

    public function __construct(Link $link, Language $language)
    {
        $this->link = $link;
        $this->language = $language;
    }

    public function present(FooterBlock $cmsBlock)
    {    
        $id_module = Module::getModuleIdByName($cmsBlock->name_module); 
        return array(
            'id' => (int)$cmsBlock->id,
            'title' => $cmsBlock->name[(int)$this->language->id],
            'hook' => (new Hook((int)$cmsBlock->id_hook))->name,
            'position' => $cmsBlock->position,
            'links' => $this->makeLinks($cmsBlock->content, $cmsBlock->custom_content),
            'width' => $cmsBlock->width,
            'type_content' => $cmsBlock->type_content,
            'html_content' => $cmsBlock->html_content[(int)$this->language->id],
            'module_content' => $this->getModuleAssign($id_module, 'displayFooter'),
            'active_title' => $cmsBlock->active_title,
        );
    }
    public  function getModuleAssign( $id_module = '', $name_hook = '' ){
        
        if(!$id_module || !$name_hook || $id_module == 0)  return ;
            $module = Module::getInstanceById($id_module); 
            $name_module = $module->name;
            $id_hook = Hook::getIdByName($name_hook);

        if( Validate::isLoadedObject($module) && $id_module ){
            $array = array();
            $array['id_hook']   = $id_hook;
            $array['module']    = $name_module;
            $array['id_module'] = $id_module;
            //$hook_name = substr($hook_name, 7, strlen($hook_name));
            return $this->renderModuleByHook( $name_hook, array(), $id_module, $array );
            
        }
        return '';          
    }
    public static function renderModuleByHook( $hook_name, $hookArgs = array(), $id_module = NULL, $array = array() ){

        if(!$hook_name || !$id_module) return ;

        if ((!empty($id_module) AND !Validate::isUnsignedId($id_module)) OR !Validate::isHookName($hook_name))
            die(Tools::displayError());
        
        if ($id_module AND $id_module != $array['id_module'])
            return ;

        if (!($moduleInstance = Module::getInstanceByName($array['module'])))
            return ;

        $retro_hook_name = Hook::getRetroHookName($hook_name);
        
        $hook_callable = is_callable(array($moduleInstance, 'hook'.$hook_name));
        $hook_retro_callable = is_callable(array($moduleInstance, 'hook'.$retro_hook_name));
        
        $output = '';
        if (($hook_callable || $hook_retro_callable))
        { 
            if ($hook_callable)
                $output = $moduleInstance->{'hook'.$hook_name}($hookArgs);
            else if ($hook_retro_callable)
                $output = $moduleInstance->{'hook'.$retro_hook_name}($hookArgs);
        }else { 
                //echo "<pre>"; print_r($moduleInstance->name); die; 
                 if ($moduleInstance instanceof WidgetInterface) { 
                    $output = $moduleInstance->renderWidget($hook_name, $hookArgs);
                 }
        }
        //echo "<pre>"; print_r($output); die; 
        return $output;
    }

    private function makeLinks($content, $custom_content)
    {
        $cmsLinks = $productLinks = $staticsLinks = $customLinks = array();

        if (isset($content['cms'])) {
            $cmsLinks = $this->makeCmsLinks($content['cms']);
        }

        if (isset($content['product'])) {
            $productLinks = $this->makeProductLinks($content['product']);
        }

        if (isset($content['static'])) {
            $staticsLinks = $this->makeStaticLinks($content['static']);
        }

        $customLinks = $this->makeCustomLinks($custom_content);

        return array_merge(
            $cmsLinks,
            $productLinks,
            $staticsLinks,
            $customLinks
        );
    }

    private function makeCmsLinks($cmsIds)
    {
        $cmsLinks = array();
        foreach ($cmsIds as $cmsId) {
            $cms = new CMS((int)$cmsId);
            if (null !== $cms->id && $cms->active) {
                $cmsLinks[] = array(
                    'id' => 'link-cms-page-'.$cms->id,
                    'class' => 'cms-page-link',
                    'title' => $cms->meta_title[(int)$this->language->id],
                    'description' => $cms->meta_description[(int)$this->language->id],
                    'url' => $this->link->getCMSLink($cms),
                );
            }
        }

        return $cmsLinks;
    }

    private function makeProductLinks($productIds)
    {
        $productLinks = array();
        foreach ($productIds as $productId) {
            if (false !== $productId) {
                $meta = Meta::getMetaByPage($productId, (int)$this->language->id);
                $productLinks[] = array(
                    'id' => 'link-product-page-'.$productId,
                    'class' => 'cms-page-link',
                    'title' => $meta['title'],
                    'description' => $meta['description'],
                    'url' => $this->link->getPageLink($productId, true),
                );
            }
        }

        return $productLinks;
    }

    private function makeStaticLinks($staticIds)
    {
        $staticLinks = array();
        foreach ($staticIds as $staticId) {
            if (false !== $staticId) {
                $meta = Meta::getMetaByPage($staticId, (int)$this->language->id);
                $staticLinks[] = array(
                    'id' => 'link-static-page-'.$staticId,
                    'class' => 'cms-page-link',
                    'title' => $meta['title'],
                    'description' => $meta['description'],
                    'url' => $this->link->getPageLink($staticId, true),
                );
            }
        }

        return $staticLinks;
    }

    private function makeCustomLinks($customContent)
    {
        $customLinks = array();

        if (isset($customContent[$this->language->id])) {
            $customLinks = $customContent[$this->language->id];

            $customLinks = array_map(function ($el) {
                return array(
                    'id' => 'link-custom-page-'.$el['title'],
                    'class' => 'custom-page-link',
                    'title' => $el['title'],
                    'description' => '',
                    'url' => $el['url'],
                    'target' => $this->isExternalLink($el['url']) ? '_blank' : '',
                );
            },
            array_filter($customLinks));
        }

        return $customLinks;
    }

    /**
     * Check the url if is an external link
     * @param $url
     * @return bool
     */
    private function isExternalLink($url)
    {
        $baseLink = preg_replace('#^(http)s?://#', '', $this->link->getBaseLink());
        $url = strtolower($url);

        if (preg_match('#^(http)s?://#', $url) && !preg_match('#^(http)s?://' . preg_quote(rtrim($baseLink, '/'), '/') . '#', $url)) {
            return true;
        }

        return false;
    }

}
