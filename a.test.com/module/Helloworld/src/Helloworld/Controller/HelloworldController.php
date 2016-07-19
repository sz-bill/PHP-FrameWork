<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Helloworld\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Helloworld\Model\Helloworld; // <-- Add this import
use Helloworld\Form\HelloworldForm;

class HelloworldController extends AbstractActionController
{

    protected $helloworldTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'helloworlds' => $this->getHelloworldTable()->fetchAll()
        ));
    }

    public function addAction()
    {
        $form = new HelloworldForm();
        $form->get('submit')->setValue('Submit Submit');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $helloworld = new Helloworld();
            $form->setInputFilter($helloworld->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $helloworld->exchangeArray($form->getData());
                $this->getHelloworldTable()->saveHelloworld($helloworld);
                // Redirect to list of helloworlds
                return $this->redirect()->toRoute('helloworld');
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
            return $this->redirect()->toRoute('helloworld', array(
                'action' => 'add'
            ));
        }
        // Get the Helloworld with the specified id. An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $helloworld = $this->getHelloworldTable()->getHelloworld($id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('helloworld', array(
                'action' => 'index'
            ));
        }
        $form = new HelloworldForm();
        $form->bind($helloworld);
        $form->get('submit')->setAttribute('value', 'AAABBBBCCCC');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($helloworld->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getHelloworldTable()->saveHelloworld($helloworld);
                // Redirect to list of helloworlds
                return $this->redirect()->toRoute('helloworld');
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
            return $this->redirect()->toRoute('helloworld');
        }
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getHelloworldTable()->deleteHelloworld($id);
            }
            // Redirect to list of helloworlds
            return $this->redirect()->toRoute('helloworld');
        }
        return array(
            'id' => $id,
            'helloworld' => $this->getHelloworldTable()->getHelloworld($id)
        );
    }
    
    // module/Helloworld/src/Helloworld/Controller/HelloworldController.php:
    public function getHelloworldTable()
    {
        if (! $this->helloworldTable) {
            $sm = $this->getServiceLocator();
            $this->helloworldTable = $sm->get('Helloworld\Model\HelloworldTable');
        }
        return $this->helloworldTable;
    }
}
