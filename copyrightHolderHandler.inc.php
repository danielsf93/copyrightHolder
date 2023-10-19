<?php
//plugins/generic/copyrightHolder/copyrightHolderHandler.inc.php

import('classes.handler.Handler');
import('lib.pkp.pages.index.PKPIndexHandler');
   
class copyrightHolderHandler extends Handler {

    public function index($args, $request) {
        $plugin = PluginRegistry::getPlugin('generic', 'copyrightHolder');
        $templateMgr = TemplateManager::getManager($request);
        $route = $request->getRequestedPage();

        if ($route === 'copyrightHolder') {
            
            return $templateMgr->display($plugin->getTemplateResource('index.tpl'));
        }

        $router = $request->getRouter();
        $router->handle404();

        return false;
    }

  
}