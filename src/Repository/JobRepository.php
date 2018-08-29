<?php

namespace App\Repository;

use App\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Job::class);
    }
    public function findJobResults($jobSearchParameters)
    {
        $conn = $this->getEntityManager()->getConnection();
        $locationQuery = $keywordSearch = $dateQuery = $categoryQuery = "";
        $locationQuery = Self::getLocationSearchQuery($jobSearchParameters['latitude'], $jobSearchParameters['longitude'], $jobSearchParameters['radius'], $jobSearchParameters['isCountry']);
        $categoryQuery = Self::getCatrogrySearchQuery($jobSearchParameters['category']);
        $keywordSearch = Self::getKeywordSearchQuery($jobSearchParameters['keyword'], $jobSearchParameters['isCountry'], $jobSearchParameters['country'], $jobSearchParameters['county'], $jobSearchParameters['latitude']);
        $dateQuery = Self::getStartdateSearchQuery($jobSearchParameters['startdate'], $jobSearchParameters['enddate']);
        $initialQuery = Self::getJobInitialSearchQuery();
        $query = $initialQuery . $categoryQuery . $keywordSearch . $dateQuery . $locationQuery . " ORDER BY j.id";
        if ($categoryQuery == "" && $locationQuery == "" && $keywordSearch == "" && $dateQuery == "")
            $query = str_replace(" WHERE", "", $query);
        $query = preg_replace('!\s+!', ' ', $query);
        $query = str_replace(" WHERE AND", " WHERE ", $query);
        return $query;
    }

    public function getLocationSearchQuery($lat, $lng, $radius = 10, $isCountry)
    {
        $locationQuery = "";
        if ($isCountry != "1") {
            if ($lat != "")
                $locationQuery = " AND ( 3959 * acos( cos( radians('" . $lat . "') ) * cos( radians(j.db_latitude) ) * cos( radians(j.db_longitude) - radians('" . $lng . "') ) + sin( radians('" . $lat . "') ) * sin( radians(j.db_latitude) ) ) ) <= $radius ";
        }
        return $locationQuery;
    }

    public static function getCatrogrySearchQuery($category)
    {

        switch ($category) {
            case 0:
                $query = "";
                break;
            case 1:
                $query = ' j.bo_parttime = 1 ';
                break;
            case 2:
                $query = ' j.bo_gaptemp = 1  ';
                break;
            case 3:
                $query = ' j.bo_internship = 1  ';
                break;
            case 4:
                $query = ' j.bo_entrylevel = 1  ';
                break;
            case 5:
                $query = ' j.bo_graduate = 1  ';
                break;
            default:
                $query = "";
                break;
        }
        return $query;
    }



    public  function getKeywordSearchQuery($keyword, $isCountry, $country, $county, $latitude)
    {
        $countryQuery = $countyQuery = $keywordSearch = "";
        if ($county != "")
            $countyQuery = " or j.vc_locationdetails LIKE '%$county%' ";
        else if ($isCountry == "1")
            $countryQuery = " or j.vc_locationdetails LIKE '%$country%' ";
        if ($keyword != "all")
            if ($keyword != "")
                $keywordSearch = "  j.vc_longheadline LIKE '%$keyword%' or j.vc_keywords LIKE '%$keyword%' or j.vc_salarydescription LIKE '%$keyword%' ";
        $keywordQuery = " AND ($keywordSearch $countryQuery $countyQuery)";
        $keywordSearch = preg_replace('!\s+!', ' ', $keywordQuery);
        $keywordSearch = str_replace(" AND ( or ", " AND ( ", $keywordSearch);
        $keywordSearch = str_replace(" WHERE ( or ", " WHERE ( ", $keywordSearch);
        $keywordSearch = str_replace(" AND ( )", "", $keywordSearch);
        return $keywordSearch;
    }

    public function getStartdateSearchQuery($startDate, $endDate)
    {
        $startDateQuery = $endDateQuery = "";
        if ($endDate != "")
            $startDateQuery = "( j.dt_enddate <= '$endDate')";
        if ($startDate != "")
            $endDateQuery = "(j.dt_livedate >= '$startDate')";
        if ($startDate != "" && $endDate != "") {
            $query = " AND ( $startDateQuery and  $endDateQuery) ";
        } else if ($endDate != "")
            $query = " AND $endDateQuery ";
        else if ($startDate != "")
            $query = " AND $startDateQuery";
        else $query = "";
        if (trim($query) == "AND")
            $query = "";
        return $query;
    }


    public function getJobInitialSearchQuery()
    {
        return "select j.id,j.vc_shortheadline,j.vc_locationdetails,j.db_latitude,j.db_longitude,j.created_at FROM App\Entity\Job j WHERE ";
    }
}
