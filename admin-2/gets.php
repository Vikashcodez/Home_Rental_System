<?php

include 'include/dbcon.php';

class Company {
    private $con;

    public function __construct() {
        $this->con = mysqli_connect('localhost', 'root','', 'ars');
        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getCompanyDetails() {
        $query = "SELECT * FROM company_details WHERE id = 1";
        $result = mysqli_query($this->con, $query);
        if ($result) {
            return mysqli_fetch_array($result);
        } else {
            die("Error in query: " . mysqli_error($this->con));
        }
    }

    public function getabt(){
        $query = "SELECT * FROM about WHERE id = 1";
        $result = mysqli_query($this->con, $query);
        if ($result) {
            return mysqli_fetch_array($result);
            } else {
                die("Error in query :".mysqli_error($this->con) );
            }
    }


    public function getRoom() {
        $query = "SELECT r.*, d.district, a.area, u.name AS uploaded_by
        FROM rooms r
        LEFT JOIN district d ON d.id = r.district_id
        LEFT JOIN area a ON a.id = r.area_id
        LEFT JOIN users u ON u.id = r.user
        ORDER BY r.id DESC;
        ";
        $result = $this->con->query($query);
        $rooms = array(); // Array to store room data
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_array()) {
            $room = array(
              'id' => $row['id'],
              'description' => $row['description'],
              'type' => $row['type'],
              'room_for' => $row['room_for'],
              'district' => $row['district'],
              'area' => $row['area'],
              'water' => $row['water'],
              'toilet' => $row['toilet'],
              'location' => $row['location'],
              'image' => $row['image'],
              'video' => $row['video'],
              'user' => $row['user'],
              'date' => $row['date'],
              'rent' => $row['rent'],
              'contact' => $row['contact'],
              'status' => $row['status']
            );
            $rooms[] = $room; // Add room to the array
          }
        }
        return $rooms; // Return the array of room data
      }


      public function getall() {
        $query = "SELECT r.*, d.district, a.area, u.name AS uploaded_by
        FROM rooms r
        LEFT JOIN district d ON d.id = r.district_id
        LEFT JOIN area a ON a.id = r.area_id
        LEFT JOIN users u ON u.id = r.user
        ORDER BY r.id DESC;
        ";
        $result = $this->con->query($query);
        $rooms = array(); // Array to store room data
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_array()) {
            $room = array(
              'id' => $row['id'],
              'description' => $row['description'],
              'type' => $row['type'],
              'room_for' => $row['room_for'],
              'district' => $row['district'],
              'area' => $row['area'],
              'water' => $row['water'],
              'toilet' => $row['toilet'],
              'location' => $row['location'],
              'image' => $row['image'],
              'video' => $row['video'],
              'user' => $row['user'],
              'date' => $row['date'],
              'rent' => $row['rent'],
              'contact' => $row['contact'],
              'status' => $row['status']
            );
            $rooms[] = $room; // Add room to the array
          }
        }
        return $rooms; // Return the array of room data
      }



      public function getTag(){
        $query = "SELECT tag_line FROM company_details WHERE id = 1";
        $result=$this->con->query($query);
        if ($result) {
          return mysqli_fetch_array($result);
          } else {
              die("Error in query :".mysqli_error($this->con) );
          }
      }

      public function isAdmin() {
        $query = "SELECT * FROM users WHERE role='admin'";
        $result=$this->con->query($query);
    
        if (mysqli_num_rows($result) > 0) {
            return true; // User is an admin
        } else {
            return false; // User is not an admin
        }
    }
    
        
      }
      

      




?>