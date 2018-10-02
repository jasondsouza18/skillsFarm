<?php

namespace App\Repository;

use App\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Job|null find( $id, $lockMode = null, $lockVersion = null )
 * @method Job|null findOneBy( array $criteria, array $orderBy = null )
 * @method Job[]    findAll()
 * @method Job[]    findBy( array $criteria, array $orderBy = null, $limit = null, $offset = null )
 */
class JobRepository extends ServiceEntityRepository {
	public function __construct( RegistryInterface $registry ) {
		parent::__construct( $registry, Job::class );
	}

	public function findJobResults( $jobSearchParameters ) {
		$conn          = $this->getEntityManager()->getConnection();
		$locationQuery = $keywordSearch = $dateQuery = $categoryQuery = "";
		$locationQuery = Self::getLocationSearchQuery( $jobSearchParameters['location'], $jobSearchParameters['latitude'], $jobSearchParameters['longitude'], $jobSearchParameters['radius'], $jobSearchParameters['isCountry'] );
		$keywordSearch = Self::getKeywordSearchQuery( $jobSearchParameters['location'], $jobSearchParameters['keyword'], $jobSearchParameters['isCountry'], $jobSearchParameters['country'], $jobSearchParameters['county'], $jobSearchParameters['latitude'] );
		$category      = Self::getCategorySearchQuery( $jobSearchParameters['category'] );
		$type          = Self::getTypeSearchQuery( $jobSearchParameters['type'] );
		$dateQuery     = Self::getStartdateSearchQuery( $jobSearchParameters['startdate'], $jobSearchParameters['enddate'] );
		$initialQuery  = Self::getJobInitialSearchQuery();
		$query         = $initialQuery . $categoryQuery . $keywordSearch . $dateQuery . $locationQuery . $category . $type . " ORDER BY j.id";
		if ( $categoryQuery == "" && $locationQuery == "" && $keywordSearch == "" && $dateQuery == "" && $category == "" && $type == "" ) {
			$query = str_replace( " WHERE", "", $query );
		}
		$query = preg_replace( '!\s+!', ' ', $query );
		$query = str_replace( " WHERE AND", " WHERE ", $query );
		$query = str_replace( " WHERE  AND", " WHERE ", $query );
		return $query;
	}

	public function getLocationSearchQuery( $location, $lat, $lng, $radius = 10, $isCountry ) {
		$locationQuery = "";
		if ( $isCountry != "1" ) {
			if ( $location != "" ) {
				if ( $lat != "" ) {
					$locationQuery = " AND ( 3959 * acos( cos( radians('" . $lat . "') ) * cos( radians(j.db_latitude) ) * cos( radians(j.db_longitude) - radians('" . $lng . "') ) + sin( radians('" . $lat . "') ) * sin( radians(j.db_latitude) ) ) ) <= $radius ";
				}
			}
		}

		return $locationQuery;
	}


	public function getKeywordSearchQuery( $location, $keyword, $isCountry, $country, $county, $latitude ) {
		$countryQuery = $countyQuery = $keywordSearch = "";
		if ( $county != "" && $location != "" ) {
			$countyQuery = " or (j.vc_locationdetails LIKE '%$county%') ";
		} else if ( $isCountry == "1" && $country != "" && $location != "" ) {
			$countryQuery = " and (j.vc_locationdetails LIKE '%$country%') ";
		} else if ( $location != "" && $latitude == '' ) {
			$countryQuery = " or (j.vc_locationdetails LIKE '%$country%') ";
		}
		if ( $keyword != "all" ) {
			if ( $keyword != "" ) {
				$keywordSearch = "  j.vc_longheadline LIKE '%$keyword%' or j.vc_keywords LIKE '%$keyword%' or j.vc_salarydescription LIKE '%$keyword%' ";
			}
		}
		$keywordQuery  = " AND (($keywordSearch) $countryQuery $countyQuery)";
		$keywordSearch = preg_replace( '!\s+!', ' ', $keywordQuery );
		$keywordSearch = str_replace( " AND ( and ", " AND ( ", $keywordSearch );
		$keywordSearch = str_replace( " WHERE ( and ", " WHERE ( ", $keywordSearch );
		$keywordSearch = str_replace( " AND ( or ", " AND ( ", $keywordSearch );
		$keywordSearch = str_replace( " WHERE ( or ", " WHERE ( ", $keywordSearch );
		$keywordSearch = str_replace( " AND ( )", "", $keywordSearch );
		$keywordSearch = str_replace( " () and ", "", $keywordSearch );
		$keywordSearch = str_replace( "() or", "", $keywordSearch );
		$keywordSearch = str_replace( "()", "", $keywordSearch );
		$keywordSearch = preg_replace( '!\s+!', ' ', $keywordSearch );
		$keywordSearch = str_replace( "( )", "", $keywordSearch );
		$keywordSearch = str_replace( "( and ", "(", $keywordSearch );
		return $keywordSearch;
	}

	public function getStartdateSearchQuery( $startDate, $endDate ) {
		$startDateQuery = $endDateQuery = "";
		if ( $endDate != "" ) {
			$startDateQuery = "( j.dt_enddate <= '$endDate')";
		}
		if ( $startDate != "" ) {
			$endDateQuery = "(j.dt_livedate >= '$startDate')";
		}
		if ( $startDate != "" && $endDate != "" ) {
			$query = " AND ( $startDateQuery and  $endDateQuery) ";
		} else if ( $endDate != "" ) {
			$query = " AND $endDateQuery ";
		} else if ( $startDate != "" ) {
			$query = " AND $startDateQuery";
		} else {
			$query = "";
		}
		if ( trim( $query ) == "AND" ) {
			$query = "";
		}

		return $query;
	}

	public function getCategorySearchQuery( $category ) {
		$query = "";
		if ( $category != '' ) {
			if ( $category != 'default' ) {
				$query = " AND jc.mastercategory = $category and jc.job=j.id";
			}
		}

		return $query;
	}

	public function getTypeSearchQuery( $type ) {
		$query = "";
		if ( $type != '' ) {
			if ( $type != 'default' ) {
				$query = " AND jt.masterjobtype = $type and jt.job=j.id";
			}
		}

		return $query;
	}

	public function getJobInitialSearchQuery() {
		return "select DISTINCT j.id,j.vc_shortheadline,j.vc_locationdetails,j.db_latitude,j.db_longitude,j.vc_salarydescription ,j.created_at FROM App\Entity\Job j inner join  App\Entity\JobCategory jc inner join App\Entity\JobType jt  WHERE ";
	}

	public function getJobRecommendationsfeatured() {
		$qb           = $this->createQueryBuilder( 'u' )
		                     ->setMaxResults( 6 )
		                     ->getQuery();
		$result       = $qb->execute();
		$returnResult = array();
		$i            = 0;
		foreach ( $result as $job ) {
			$returnResult[ $i ]['id']       = $job->getid();
			$returnResult[ $i ]['headline'] = $job->getVcShortheadline();
			$returnResult[ $i ]['location'] = $job->getVcLocationdetails();
			$returnResult[ $i ]['salary']   = $job->getVcSalarydescription();
			$i ++;
		}

		return $returnResult;
	}

	public function getJobRecommendationsrecent() {
		$qb           = $this->createQueryBuilder( 'u' )
		                     ->addOrderBy( 'u.created_at', 'DESC' )
		                     ->setMaxResults( 6 )
		                     ->getQuery();
		$result       = $qb->execute();
		$returnResult = array();
		$i            = 0;
		foreach ( $result as $job ) {
			$returnResult[ $i ]['id']       = $job->getid();
			$returnResult[ $i ]['headline'] = $job->getVcShortheadline();
			$returnResult[ $i ]['location'] = $job->getVcLocationdetails();
			$returnResult[ $i ]['salary']   = $job->getVcSalarydescription();
			$i ++;
		}

		return $returnResult;
	}

	public function getJobRecommendationstop() {
		$qb           = $this->createQueryBuilder( 'u' )
		                     ->addOrderBy( 'u.dt_livedate', 'DESC' )
		                     ->setMaxResults( 6 )
		                     ->getQuery();
		$result       = $qb->execute();
		$returnResult = array();
		$i            = 0;
		foreach ( $result as $job ) {
			$returnResult[ $i ]['id']       = $job->getid();
			$returnResult[ $i ]['headline'] = $job->getVcShortheadline();
			$returnResult[ $i ]['location'] = $job->getVcLocationdetails();
			$returnResult[ $i ]['salary']   = $job->getVcSalarydescription();
			$i ++;
		}

		return $returnResult;
	}

	public function getJobRecommendationsmostapplied() {
		$qb           = $this->createQueryBuilder( 'u' )
		                     ->addOrderBy( 'u.updated_at', 'DESC' )
		                     ->setMaxResults( 6 )
		                     ->getQuery();
		$result       = $qb->execute();
		$returnResult = array();
		$i            = 0;
		foreach ( $result as $job ) {
			$returnResult[ $i ]['id']       = $job->getid();
			$returnResult[ $i ]['headline'] = $job->getVcShortheadline();
			$returnResult[ $i ]['location'] = $job->getVcLocationdetails();
			$returnResult[ $i ]['salary']   = $job->getVcSalarydescription();
			$i ++;
		}

		return $returnResult;
	}
}
