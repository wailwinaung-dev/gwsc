<?php
include_once( __DIR__ . '/../MySql.php');



Class PackagesTable extends MySQL
{
    private $db = null;
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAll()
    {   
        
        try {
            $query = "SELECT 
                packages.*, 
                pitch_types.name AS pitch_type_name,
                campsites.name AS campsite_name,
                concat('[', GROUP_CONCAT(DISTINCT JSON_OBJECT('id',features.id, 'name', features.name, 'description', features.description) ORDER BY features.id separator ','), ']') as features,

                concat('[', GROUP_CONCAT(DISTINCT JSON_OBJECT('id',attractions.id, 'name', attractions.name, 'description', attractions.description) ORDER BY attractions.id separator ','), ']') as attractions
            FROM packages
                JOIN package_feature ON packages.id = package_feature.package_id
                JOIN features ON features.id = package_feature.feature_id

                JOIN package_attraction ON packages.id = package_attraction.package_id
                JOIN attractions ON attractions.id = package_attraction.attraction_id

                JOIN pitch_types ON packages.pitch_type_id = pitch_types.id

                JOIN campsites ON packages.campsite_id = campsites.id
            GROUP BY packages.name";

            $result = $this->db->query($query);
            $data = $result->fetch_all(MYSQLI_ASSOC);
            
            return $data;
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

    public function findById($id)
    {
        try {
            $query = "SELECT 
                packages.*, 
                pitch_types.name AS pitch_type_name,
                campsites.name AS campsite_name,
                concat('[', GROUP_CONCAT(DISTINCT JSON_OBJECT('id',features.id, 'name', features.name, 'description', features.description) ORDER BY features.id separator ','), ']') as features,

                concat('[', GROUP_CONCAT(DISTINCT JSON_OBJECT('id',attractions.id, 'name', attractions.name, 'description', attractions.description) ORDER BY attractions.id separator ','), ']') as attractions
            FROM packages
                JOIN package_feature ON packages.id = package_feature.package_id
                JOIN features ON features.id = package_feature.feature_id

                JOIN package_attraction ON packages.id = package_attraction.package_id
                JOIN attractions ON attractions.id = package_attraction.attraction_id

                JOIN pitch_types ON packages.pitch_type_id = pitch_types.id

                JOIN campsites ON packages.campsite_id = campsites.id
            WHERE packages.id = " . $id . "
            GROUP BY packages.name";

            $result = $this->db->query($query);
            
            return $result->fetch_assoc();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        
    }
}
