<?php


namespace core\traits;
use PDO;

trait Country
{
    public function getCountry($id = null)
    {
        $country = [];
        $where = "";
        if(!empty($id)) {
            $where = " WHERE id = $id";
        }
        $c = $this->db->query("SELECT * FROM country $where");
        while ($row = $c->fetch(PDO::FETCH_ASSOC)) {
            $country[$row['id']] = $row['name'];
        }
        return $country;
    }

    public function getRegions($countryId = null)
    {
        $regions = [];
        $where = "";
        if(!empty($countryId)) {
            $where = " WHERE country_id = $countryId";
        }
        $r = $this->db->query("SELECT * FROM region $where");
        while ($row = $r->fetch(PDO::FETCH_ASSOC)) {
            $regions[$row['id']] = $row['name'];
        }
        return $regions;
    }

    public function getCity($regionId = null)
    {
        $city = [];
        $where = "";
        if(!empty($regionId)) {
            $where = " WHERE region_id = $regionId";
        }
        $c = $this->db->query("SELECT * FROM city $where");
        while ($row = $c->fetch(PDO::FETCH_ASSOC)) {
            $city[$row['id']] = $row['name'];
        }
        return $city;
    }
}