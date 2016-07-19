<?php
namespace Helloworld\Model;

use Zend\Db\TableGateway\TableGateway;

class HelloworldTable
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getHelloworld($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array(
            'id' => $id
        ));
        $row = $rowset->current();
        if (! $row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveHelloworld(Helloworld $helloworld)
    {
        $data = array(
            'artist' => $helloworld->artist,
            'title' => $helloworld->title
        );
        
        $id = (int) $helloworld->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getHelloworld($id)) {
                $this->tableGateway->update($data, array(
                    'id' => $id
                ));
            } else {
                throw new \Exception('Helloworld id does not exist');
            }
        }
    }

    public function deleteHelloworld($id)
    {
        $this->tableGateway->delete(array(
            'id' => (int) $id
        ));
    }
}