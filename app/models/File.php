<?php
//create the connection
include_once __DIR__ . "\..\database\config.php";
include_once __DIR__ . "\..\database\operations.php";
class File extends config implements operations
{
    private $id;
    private $file_name;
    private $label;
    private $created_at;
    private $updated_at;

    public function create()
    {
        $query = "INSERT INTO `files` (file_name) VALUE ('$this->file_name');";
        return $this->runDML($query);
    }
    public function read()
    {
        $query = " SELECT file_name,label from files  ";
        return $this->runDQL($query);
    }
    public function update(){}
    public function delete(){}
    public function updateLabel()
    {
        $query = " UPDATE files 
                   SET label='$this->label',
                   updated_at='$this->updated_at'
                   WHERE file_name='$this->file_name' ";
        return $this->runDML($query);
    }

    public function searchFileName()
    {
        $query = " SELECT * from 
        files 
        WHERE file_name='$this->file_name' ";
        return $this->runDQL($query);
    }
    public function returnTocsv()
    {
        $query = " SELECT file_name,label 
        from files 
        where label is NOT NULL ";
        return $this->runDQL($query);
    }

    /**
     * Get the value of file_name
     */
    public function getFile_name()
    {
        return $this->file_name;
    }

    /**
     * Set the value of file_name
     *
     * @return  self
     */
    public function setFile_name($file_name)
    {
        $this->file_name = $file_name;

        return $this;
    }

    /**
     * Get the value of label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @return  self
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
