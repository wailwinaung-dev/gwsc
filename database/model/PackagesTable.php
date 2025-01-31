<?php
include_once(__DIR__ . '/../MySql.php');



class PackagesTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getCount()
    {
        try {
            $sql = "SELECT COUNT(id) FROM packages";
            $result = $this->db->query($sql);

            return $result->fetch_column();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getAll()
    {

        try {
            $query = "SELECT 
                packages.*, 
                pitch_types.name AS pitch_type_name,
                campsites.name AS campsite_name,
                GROUP_CONCAT(DISTINCT features.name ORDER BY features.id separator '|') as features,

                GROUP_CONCAT(DISTINCT  attractions.name ORDER BY attractions.id separator '|')as attractions
            FROM packages
                LEFT JOIN package_feature ON packages.id = package_feature.package_id
                LEFT JOIN features ON features.id = package_feature.feature_id

                LEFT JOIN package_attraction ON packages.id = package_attraction.package_id
                LEFT JOIN attractions ON attractions.id = package_attraction.attraction_id

                LEFT JOIN pitch_types ON packages.pitch_type_id = pitch_types.id

                LEFT JOIN campsites ON packages.campsite_id = campsites.id
            GROUP BY packages.name , packages.id
            ORDER BY packages.id DESC";

            $result = $this->db->query($query);
            $data = $result->fetch_all(MYSQLI_ASSOC);

            return $data;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function search($searchText)
    {

        try {
            $searchText = trim($searchText);

            if (!$searchText) {
                return null;
            }

            $query = "SELECT packages.*, 
                pitch_types.name AS pitch_type_name,
                campsites.name AS campsite_name
                FROM packages
            LEFT JOIN pitch_types ON packages.pitch_type_id = pitch_types.id
            LEFT JOIN campsites ON packages.campsite_id = campsites.id
            WHERE packages.name LIKE '%$searchText%'";

            $result = $this->db->query($query);

            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($data)
    {
        try {

            $sql = "INSERT INTO packages (
                name, description, price, image, location, pitch_type_id, campsite_id, created_at, updated_at
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, NOW(), NOW()
            )";

            $stmt = $this->db->prepare($sql);
            $stmt->bind_param(
                "ssissii",
                $data['name'],
                $data['description'],
                $data['price'],
                $data['image'],
                $data['location'],
                $data['pitch_type_id'],
                $data['campsite_id']
            );
            $stmt->execute();

            $package_id = $this->db->insert_id;

            //Package_Feature Pivote
            $stmt = $this->db->prepare("INSERT INTO package_feature (package_id, feature_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $package_id, $feature_id);

            foreach ($data['feature_ids'] as $featureId) {
                $feature_id = $featureId;
                $stmt->execute();
            }

            //Package_Attraction Pivote
            $stmt = $this->db->prepare("INSERT INTO package_attraction (package_id, attraction_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $package_id, $attraction_id);

            foreach ($data['attraction_ids'] as $attractionId) {
                $attraction_id = $attractionId;
                $stmt->execute();
            }

            return $package_id;
        } catch (PDOException $e) {
            return $e->getMessage()();
        }
    }


    public function update($data)
    {
        // var_dump($data);exit;
        // Construct the SQL query
        $sql = "UPDATE packages
            SET pitch_type_id = ?, campsite_id = ?, name = ?, description = ?, price = ?, image = ?, location = ?, updated_at = NOW()
            WHERE id = ?";

        // Prepare and execute the query
        $updatePackage = $this->db->prepare($sql);
        $updatePackage->bind_param(
            "iississi",
            $data['pitch_type_id'],
            $data['campsite_id'],
            $data['name'],
            $data['description'],
            $data['price'],
            $data['image'],
            $data['location'],
            $data['id']
        );

        if ($updatePackage->execute()) {

            $package_id = $data['id'];
            //PK means package_feature pivot table
            $deletePK = $this->db->prepare("DELETE FROM package_feature WHERE package_id = ?");
            $deletePK->bind_param("i", $package_id);
            $deletePK->execute();

            $insertPK = $this->db->prepare("INSERT INTO package_feature (package_id, feature_id) VALUES (?, ?)");
            $insertPK->bind_param("ii", $package_id, $feature_id);

            foreach ($data['feature_ids'] as $featureId) {
                $feature_id = $featureId;
                $insertPK->execute();
            }

            //PA means package_attraction pivot table
            $deletePA = $this->db->prepare("DELETE FROM package_attraction WHERE package_id = ?");
            $deletePA->bind_param("i", $package_id);
            $deletePA->execute();

            $insertPA = $this->db->prepare("INSERT INTO package_attraction (package_id, attraction_id) VALUES (?, ?)");
            $insertPA->bind_param("ii", $package_id, $attraction_id);

            foreach ($data['attraction_ids'] as $attractionId) {
                $attraction_id = $attractionId;
                $insertPA->execute();
            }

            return true;
        } else {
            // Error occurred, handle it
            echo "Error updating data";
            exit;
        }
    }

    public function delete($id)
    {
        // Delete from package_attraction table
        $stmt = $this->db->prepare("DELETE FROM package_attraction WHERE package_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        // Delete from package_feature table
        $stmt = $this->db->prepare("DELETE FROM package_feature WHERE package_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        // Delete from packages table
        $stmt = $this->db->prepare("DELETE FROM packages WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function findById($id)
    {
        try {
            $query = "SELECT 
                packages.*, 
                pitch_types.name AS pitch_type_name,
                campsites.name AS campsite_name,

                GROUP_CONCAT(DISTINCT features.name ORDER BY features.id separator '|') as features,

                GROUP_CONCAT(DISTINCT  attractions.name ORDER BY attractions.id separator '|')as attractions,

                GROUP_CONCAT(DISTINCT features.id) as feature_ids,
                GROUP_CONCAT(DISTINCT attractions.id) as attraction_ids
            FROM packages
            LEFT JOIN package_feature ON packages.id = package_feature.package_id
            LEFT JOIN features ON features.id = package_feature.feature_id

            LEFT JOIN package_attraction ON packages.id = package_attraction.package_id
            LEFT JOIN attractions ON attractions.id = package_attraction.attraction_id

            LEFT JOIN pitch_types ON packages.pitch_type_id = pitch_types.id

            LEFT JOIN campsites ON packages.campsite_id = campsites.id
            WHERE packages.id = " . $id . "
            GROUP BY packages.name";

            $result = $this->db->query($query);

            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function toggleStatus($id)
    {

        try {
            $result = $this->db->query("SELECT status FROM packages WHERE id='" . $id . "'");
            $status = $result->fetch_column();

            $this->db->query("UPDATE packages SET status='" . !$status . "' WHERE id='" . $id . "'");

            return !$status;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getFive()
    {

        try {
            $query = "SELECT 
                packages.*, 
                pitch_types.name AS pitch_type_name,
                campsites.name AS campsite_name,
                GROUP_CONCAT(DISTINCT features.name ORDER BY features.id separator '|') as features,

                GROUP_CONCAT(DISTINCT  attractions.name ORDER BY attractions.id separator '|')as attractions
            FROM packages
                LEFT JOIN package_feature ON packages.id = package_feature.package_id
                LEFT JOIN features ON features.id = package_feature.feature_id

                LEFT JOIN package_attraction ON packages.id = package_attraction.package_id
                LEFT JOIN attractions ON attractions.id = package_attraction.attraction_id

                LEFT JOIN pitch_types ON packages.pitch_type_id = pitch_types.id

                LEFT JOIN campsites ON packages.campsite_id = campsites.id
            GROUP BY packages.name , packages.id
            ORDER BY packages.id DESC
            LIMIT 5 ";

            $result = $this->db->query($query);
            $data = $result->fetch_all(MYSQLI_ASSOC);

            return $data;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}