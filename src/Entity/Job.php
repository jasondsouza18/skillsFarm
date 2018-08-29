<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 * @ORM\Table(name="job",
 *    indexes={@ORM\Index(name="keyword", columns={"vc_shortheadline", "vc_longheadline","vc_salarydescription","vc_locationdetails"}),
 *             @ORM\Index(name="location", columns={"db_latitude", "db_longitude"}),
 *            }
 * )
 *
 */
class Job
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $employer_id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Employer")
     * @ORM\JoinColumn(name="employer_id", referencedColumnName="id")
     */
    protected $employer;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $vc_shortheadline;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $vc_longheadline;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $vc_description;

    /**
     * @ORM\Column(type="date")
     */
    private $dt_livedate;

    /**
     * @ORM\Column(type="date")
     */
    private $dt_enddate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dt_applicationdeadlinedate;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_salarydescription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vc_locationdetails;

    /**
     * @ORM\Column(type="float")
     */
    private $db_latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $db_longitude;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bo_isabroad;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $vc_applyemail;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $vc_applyphone;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $vc_applyaddress;


    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $vc_applyonlineurl;


    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $vc_keywords;


    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $vc_qualifications;


    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobCategory", mappedBy="job")
     */
    private $jobCategories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobseekerWishlist", mappedBy="job")
     */
    private $jobseekerWishlists;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vc_country;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVcShortheadline(): ?string
    {
        return $this->vc_shortheadline;
    }

    public function setVcShortheadline(string $vc_shortheadline): self
    {
        $this->vc_shortheadline = $vc_shortheadline;

        return $this;
    }

    public function getVcLongheadline(): ?string
    {
        return $this->vc_longheadline;
    }

    public function setVcLongheadline(?string $vc_longheadline): self
    {
        $this->vc_longheadline = $vc_longheadline;

        return $this;
    }

    public function getVcDescription(): ?string
    {
        return $this->vc_description;
    }

    public function setVcDescription(?string $vc_description): self
    {
        $this->vc_description = $vc_description;

        return $this;
    }

    public function getDtLivedate(): ?\DateTimeInterface
    {
        return $this->dt_livedate;
    }

    public function setDtLivedate(\DateTimeInterface $dt_livedate): self
    {
        $this->dt_livedate = $dt_livedate;

        return $this;
    }

    public function getDtEnddate(): ?\DateTimeInterface
    {
        return $this->dt_enddate;
    }

    public function setDtEnddate(\DateTimeInterface $dt_enddate): self
    {
        $this->dt_enddate = $dt_enddate;

        return $this;
    }

    public function getDtApplicationdeadlinedate(): ?\DateTimeInterface
    {
        return $this->dt_applicationdeadlinedate;
    }

    public function setDtApplicationdeadlinedate(?\DateTimeInterface $dt_applicationdeadlinedate): self
    {
        $this->dt_applicationdeadlinedate = $dt_applicationdeadlinedate;

        return $this;
    }

    public function getVcSalarydescription(): ?string
    {
        return $this->vc_salarydescription;
    }

    public function setVcSalarydescription(?string $vc_salarydescription): self
    {
        $this->vc_salarydescription = $vc_salarydescription;

        return $this;
    }

    public function getVcLocationdetails(): ?string
    {
        return $this->vc_locationdetails;
    }

    public function setVcLocationdetails(string $vc_locationdetails): self
    {
        $this->vc_locationdetails = $vc_locationdetails;

        return $this;
    }

    public function getDbLatitude(): ?float
    {
        return $this->db_latitude;
    }

    public function setDbLatitude(float $db_latitude): self
    {
        $this->db_latitude = $db_latitude;

        return $this;
    }

    public function getVcLongitude() : ? float
    {
        return $this->vc_longitude;
    }

    public function setVcLongitude(float $vc_longitude) : self
    {
        $this->vc_longitude = $vc_longitude;

        return $this;
    }

    public function getVcCountry() : ? string
    {
        return $this->vc_country;
    }

    public function setVcCountry(string $vc_country) : self
    {
        $this->vc_country = $vc_country;

        return $this;
    }

    public function getBoIsabroad(): ?bool
    {
        return $this->bo_isabroad;
    }

    public function setBoIsabroad(bool $bo_isabroad): self
    {
        $this->bo_isabroad = $bo_isabroad;

        return $this;
    }

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
        $this->jobCategories = new ArrayCollection();
        $this->jobseekerWishlists = new ArrayCollection();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getEmployerId(): ?int
    {
        return $this->employer_id;
    }

    public function setEmployerId(int $employer_id): self
    {
        $this->employer_id = $employer_id;

        return $this;
    }

    public function getEmployer(): ?Employer
    {
        return $this->employer;
    }

    public function setEmployer(?Employer $employer): self
    {
        $this->employer = $employer;

        return $this;
    }

    public function getDbLongitude(): ?float
    {
        return $this->db_longitude;
    }

    public function setDbLongitude(float $db_longitude): self
    {
        $this->db_longitude = $db_longitude;

        return $this;
    }

    public function getVcApplyemail(): ?string
    {
        return $this->vc_applyemail;
    }

    public function setVcApplyemail(?string $vc_applyemail): self
    {
        $this->vc_applyemail = $vc_applyemail;

        return $this;
    }

    public function getVcApplyphone(): ?string
    {
        return $this->vc_applyphone;
    }

    public function setVcApplyphone(?string $vc_applyphone): self
    {
        $this->vc_applyphone = $vc_applyphone;

        return $this;
    }

    public function getVcApplyaddress(): ?string
    {
        return $this->vc_applyaddress;
    }

    public function setVcApplyaddress(?string $vc_applyaddress): self
    {
        $this->vc_applyaddress = $vc_applyaddress;

        return $this;
    }

    public function getVcApplyonlineurl(): ?string
    {
        return $this->vc_applyonlineurl;
    }

    public function setVcApplyonlineurl(?string $vc_applyonlineurl): self
    {
        $this->vc_applyonlineurl = $vc_applyonlineurl;

        return $this;
    }

    public function getVcKeywords(): ?string
    {
        return $this->vc_keywords;
    }

    public function setVcKeywords(?string $vc_keywords): self
    {
        $this->vc_keywords = $vc_keywords;

        return $this;
    }

    public function getVcQualifications(): ?string
    {
        return $this->vc_qualifications;
    }

    public function setVcQualifications(?string $vc_qualifications): self
    {
        $this->vc_qualifications = $vc_qualifications;

        return $this;
    }

    /**
     * @return Collection|JobCategory[]
     */
    public function getJobCategories(): Collection
    {
        return $this->JobCategories;
    }

    public function addJobCategory(JobCategory $JobCategory): self
    {
        if (!$this->JobCategories->contains($JobCategory)) {
            $this->JobCategories[] = $JobCategory;
            $JobCategory->setJob($this);
        }

        return $this;
    }

    public function removeJobCategory(JobCategory $JobCategory): self
    {
        if ($this->JobCategories->contains($JobCategory)) {
            $this->JobCategories->removeElement($JobCategory);
            // set the owning side to null (unless already changed)
            if ($JobCategory->getJob() === $this) {
                $JobCategory->setJob(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JobseekerWishlist[]
     */
    public function getJobseekerWishlists(): Collection
    {
        return $this->jobseekerWishlists;
    }

    public function addJobseekerWishlist(JobseekerWishlist $jobseekerWishlist): self
    {
        if (!$this->jobseekerWishlists->contains($jobseekerWishlist)) {
            $this->jobseekerWishlists[] = $jobseekerWishlist;
            $jobseekerWishlist->setJob($this);
        }

        return $this;
    }

    public function removeJobseekerWishlist(JobseekerWishlist $jobseekerWishlist): self
    {
        if ($this->jobseekerWishlists->contains($jobseekerWishlist)) {
            $this->jobseekerWishlists->removeElement($jobseekerWishlist);
            // set the owning side to null (unless already changed)
            if ($jobseekerWishlist->getJob() === $this) {
                $jobseekerWishlist->setJob(null);
            }
        }

        return $this;
    }


}
