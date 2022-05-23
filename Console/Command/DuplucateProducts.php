<?php
/**
 * Encora product duplication Module logic.
 * @category  Duplicate Products Practical Test 
 * @package   Encora_TwoFold
 * @author    vashishtha chauhan
 */
namespace Encora\TwoFold\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Authorization\Model\Acl\Role\Group as RoleGroup;
use Magento\Authorization\Model\UserContextInterface;

/**
 * Class DuplicateProducts for command line utility process
 */
class DuplicateProducts extends Command
{
    /**
     * command input parameter for cloning products from id
     */
    const FROMID = 'fromId';

    /**
     * command input for cloning products to id
     */
    const TOID = 'toId';

    /**
     * User model factory
     *
     * @var \Magento\User\Model\UserFactory
     */
    protected $_userFactory;

    /**
     * Factory for user role model
     *
     * @var \Magento\Authorization\Model\RoleFactory
     */
    protected $_roleFactory;

    /**
     * Constructor
     *
     * @param \Salecto\Advertisment\Model\GridModelFactory
     */
    public function __construct(
        UserFactory $userFactory,
        RoleFactory $roleFactory
    ) {
        
        $this->_userFactory = $userFactory;
        $this->_roleFactory = $roleFactory;
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('create:duplicate:product');
        $this->setDescription('It will create duplicate product(s) of provided product ID range.');
        $this->addOption(
                self::FROMID,
                null,
                InputOption::VALUE_REQUIRED,
                'FROMID'
        );
        $this->addOption(
                self::TOID,
                null,
                InputOption::VALUE_OPTIONAL,
                'TOID'
        );
        parent::configure();
    }

    /**
     * Command Execution and product(s) cloning 
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fromId = $input->getOption(self::FROMID);
        $toId = $input->getOption(self::TOID);
        if($fromId) {
            $output->writeln('<info>clone products from `'.$formId.'` to  `'.$toName.'`</info>');
        }
        /*if($userId && $roleId) {
            
            $model = $this->_userFactory->create()->load($userId);
            $roleName = $this->checkRole($roleId);
            if ($userId && $model->isObjectNew()) {
                $output->writeln('<error>User with id = `'.$userId.'`, No longer exisits</error>');
            } elseif ($roleName === 0) {
                $output->writeln('<error>User Role with id = `'.$roleId.'`, Not exisits</error>');
            } else {
              $model->setUserId($userId);
              $model->setRoleId($roleId);
              $model->save();
              $output->writeln('<info>User with id `'.$userId.'`set as `'.$roleName.'`</info>');
            }
        }else{
            $output->writeln('<error>please set both fromId and toId, i.e. --fromId=integer --toId=integer</error>');
        }*/
    }

    private function checkRole($roleId) {
        $role = $this->_roleFactory->create()->load($roleId);
        if($role->getId()){
            return $role->getRoleName();
        } else {
            return 0;
        }
    }
}
