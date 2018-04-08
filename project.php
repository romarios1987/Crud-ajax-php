<?php

class Project
{
    // database connection and table name
    private $conn;
    private $table_name = "projects";

    // object properties
    public $id;
    public $title;
    public $description;
    public $timestamp;


    // create project
    function create()
    {
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    title=:title, 
                    image=:image, 
                    description=:description, 
                    created=:created";

        $stmt = $this->conn->prepare($query);

        // posted values
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->description = htmlspecialchars(strip_tags($this->description));

        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');

        // bind values
        $stmt->bindParam(":title", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":created", $this->timestamp);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

    }
}
