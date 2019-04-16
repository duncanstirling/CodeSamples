<?php

namespace Album\Model;

 use Zend\Db\TableGateway\TableGateway;

 class AlbumTable
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

     public function getAlbum($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => "$id"));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function getAlbumByUserName($userName)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('userName' => "$userName"));
         if (!$rowset) {
             throw new \Exception("Could not find rows for $userName");
         }
         return $rowset;
     }	 
	 
     public function saveAlbum(Album $album)
     {
         $data = array(
			 'userName'  => $album->userName,
			 'email'     => $album->email,
             'firstName' => $album->firstName,
             'lastName' => $album->lastName,
             'profileType'  => $album->profileType,			 
             'enabled' => $album->enabled,		 
         );

         $id = (int) $album->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getAlbum($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Album id does not exist');
             }
         }
     }

     public function deleteAlbum($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }