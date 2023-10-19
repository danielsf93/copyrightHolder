<?php
//plugins/generic/copyrightHolder/copyrightHolder.inc.php
import('lib.pkp.classes.plugins.GenericPlugin');
import('lib.pkp.plugins.importexport.users.PKPUserImportExportPlugin');

class copyrightHolder extends GenericPlugin {
    public function register($category, $path, $mainContextId = NULL) {
        $success = parent::register($category, $path);
            if ($success && $this->getEnabled()) {
      HookRegistry::register('LoadHandler', array($this, 'setPageHandler'));
               
            }
        return $success;
    }

    public function setPageHandler($hookName, $params) {
        $page = $params[0];
        if ($page === 'copyrightHolder') {
            $this->import('copyrightHolderHandler');
            define('HANDLER_CLASS', 'copyrightHolderHandler');
            return true;
    
            
        }
        return false;
    }
 
	public function getDisplayName() {
		return __('plugins.generic.copyrightholder.displayName');
	}

	public function getDescription() {
		return __('plugins.generic.copyrightholder.description');
	}
	
	

}
