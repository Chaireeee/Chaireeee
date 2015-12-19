<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{

    public function init()
    {
        date_default_timezone_set( 'Europe/Paris' );
        parent::init();
    }

    public function __construct($environment, $debug)
    {
        date_default_timezone_set('Europe/Paris');
        parent::__construct($environment, $debug);
    }

    public function registerBundles()
    {



        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),
            new Chaire\AccueilBundle\ChaireAccueilBundle(),
            new Chaire\EventBundle\ChaireEventBundle(),
            new Chaire\AdminBundle\ChaireAdminBundle(),
            new Chaire\FormationBundle\ChaireFormationBundle(),
            new Chaire\TeamBundle\ChaireTeamBundle(),
            new Knp\Bundle\MailjetBundle\KnpMailjetBundle(),
            new GenerateurBundle\GenerateurBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new Chaire\ReserachBundle\ChaireReserachBundle(),
            new OCUserBundle\OCUserBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
