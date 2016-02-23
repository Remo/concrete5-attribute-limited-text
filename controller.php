<?php

namespace Concrete\Package\AttributeLimitedText;

use Concrete\Core\Backup\ContentImporter;
use Package;

class Controller extends Package
{

    protected $pkgHandle = 'attribute_limited_text';
    protected $appVersionRequired = '5.7.4';
    protected $pkgVersion = '1.0.1';
    protected $pkgThemeHandle = 'webwende';

    public function getPackageName()
    {
        return t('Limited text length attribute');
    }

    public function getPackageDescription()
    {
        return t('Installs a text attribute with a restricted length');
    }

    protected function installXmlContent()
    {
        $pkg = Package::getByHandle($this->pkgHandle);

        $ci = new ContentImporter();
        $ci->importContentFile($pkg->getPackagePath() . '/install.xml');
    }

    public function install()
    {
        $pkg = parent::install();

        $this->installXmlContent();
    }

    public function upgrade()
    {
        parent::upgrade();

        $this->installXmlContent();
    }

}
