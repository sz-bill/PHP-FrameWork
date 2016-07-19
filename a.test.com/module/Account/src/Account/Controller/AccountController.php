<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Account\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Account\Model\Account; // <-- Add this import
use Account\Form\AccountForm;

class AccountController extends AbstractActionController
{

    protected $accountTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'accounts' => $this->getAccountTable()->fetchAll()
        ));
    }

    public function addAction()
    {
        $form = new AccountForm();
        $form->get('submit')->setValue('Submit Submit');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $account = new Account();
            $form->setInputFilter($account->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $account->exchangeArray($form->getData());
                $this->getAccountTable()->saveAccount($account);
                // Redirect to list of accounts
                return $this->redirect()->toRoute('account');
            }
        }
        return array(
            'form' => $form
        );
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (! $id) {
            return $this->redirect()->toRoute('account', array(
                'action' => 'add'
            ));
        }
        // Get the Account with the specified id. An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $account = $this->getAccountTable()->getAccount($id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('account', array(
                'action' => 'index'
            ));
        }
        $form = new AccountForm();
        $form->bind($account);
        $form->get('submit')->setAttribute('value', 'AAABBBBCCCC');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($account->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getAccountTable()->saveAccount($account);
                // Redirect to list of accounts
                return $this->redirect()->toRoute('account');
            }
        }
        return array(
            'id' => $id,
            'form' => $form
        );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (! $id) {
            return $this->redirect()->toRoute('account');
        }
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getAccountTable()->deleteAccount($id);
            }
            // Redirect to list of accounts
            return $this->redirect()->toRoute('account');
        }
        return array(
            'id' => $id,
            'account' => $this->getAccountTable()->getAccount($id)
        );
    }
    
    // module/Account/src/Account/Controller/AccountController.php:
    public function getAccountTable()
    {
        if (! $this->accountTable) {
            $sm = $this->getServiceLocator();
            $this->accountTable = $sm->get('Account\Model\AccountTable');
        }
        return $this->accountTable;
    }

    private function formUrl($params = array())
    {
        $strUrl = $this->url('account', array(
            'action' => 'add'
        ));
        return $strUrl;
    }
}
