<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MasterEducationRepository")
 * @ORM\HasLifecycleCallbacks
 */
class MasterEducation
{
    const MASTER_EDUCATION_SCHOOL = 1;
    const MASTER_EDUCATION_COLLEGE = 2;
    const MASTER_EDUCATION_GRADUATION = 3;
    const MASTER_EDUCATION_POSTGRADUATION = 4;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $it_educationtype;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $vc_name;

    /**
     * @ORM\Column(type="string", length=100)
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
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobseekerEducation", mappedBy="mastereducation")
     */
    private $jobseekerEducation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobseekerExperience", mappedBy="mastereducation")
     */
    private $jobseekerExperiences;

    public function __construct()
    {
        $this->jobseekerEducation = new ArrayCollection();
        $this->jobseekerExperiences = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getItEducationtype() : ? int
    {
        return $this->it_educationtype;
    }

    public function setItEducationtype(int $it_educationtype) : self
    {
        $this->it_educationtype = $it_educationtype;

        return $this;
    }

    public function getVcName() : ? string
    {
        return $this->vc_name;
    }

    public function setVcName(string $vc_name) : self
    {
        $this->vc_name = $vc_name;

        return $this;
    }

    public function getVcLocationdetails() : ? string
    {
        return $this->vc_locationdetails;
    }

    public function setVcLocationdetails(string $vc_locationdetails) : self
    {
        $this->vc_locationdetails = $vc_locationdetails;

        return $this;
    }

    public function getDbLatitude() : ? float
    {
        return $this->db_latitude;
    }

    public function setDbLatitude(float $db_latitude) : self
    {
        $this->db_latitude = $db_latitude;

        return $this;
    }

    public function getDbLongitude() : ? float
    {
        return $this->db_longitude;
    }

    public function setDbLongitude(float $db_longitude) : self
    {
        $this->db_longitude = $db_longitude;

        return $this;
    }

    public function getCreatedAt() : ? \DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at) : self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt() : ? \DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at) : self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|JobseekerEducation[]
     */
    public function getJobseekerEducation() : Collection
    {
        return $this->jobseekerEducation;
    }

    public function addJobseekerEducation(JobseekerEducation $jobseekerEducation) : self
    {
        if (!$this->jobseekerEducation->contains($jobseekerEducation)) {
            $this->jobseekerEducation[] = $jobseekerEducation;
            $jobseekerEducation->setMastereducation($this);
        }

        return $this;
    }

    public function removeJobseekerEducation(JobseekerEducation $jobseekerEducation) : self
    {
        if ($this->jobseekerEducation->contains($jobseekerEducation)) {
            $this->jobseekerEducation->removeElement($jobseekerEducation);
            // set the owning side to null (unless already changed)
            if ($jobseekerEducation->getMastereducation() === $this) {
                $jobseekerEducation->setMastereducation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JobseekerExperience[]
     */
    public function getJobseekerExperiences() : Collection
    {
        return $this->jobseekerExperiences;
    }

    public function addJobseekerExperience(JobseekerExperience $jobseekerExperience) : self
    {
        if (!$this->jobseekerExperiences->contains($jobseekerExperience)) {
            $this->jobseekerExperiences[] = $jobseekerExperience;
            $jobseekerExperience->setMastereducation($this);
        }

        return $this;
    }

    public function removeJobseekerExperience(JobseekerExperience $jobseekerExperience) : self
    {
        if ($this->jobseekerExperiences->contains($jobseekerExperience)) {
            $this->jobseekerExperiences->removeElement($jobseekerExperience);
            // set the owning side to null (unless already changed)
            if ($jobseekerExperience->getMastereducation() === $this) {
                $jobseekerExperience->setMastereducation(null);
            }
        }

        return $this;
    }


    /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $this->setUpdatedAt(new \DateTime('now'));
        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    public function getEducationInString()
    {
        if ($this->it_educationtype == MasterEducation::MASTER_EDUCATION_SCHOOL)
            return "School";
        if ($this->it_educationtype == MasterEducation::MASTER_EDUCATION_COLLEGE)
            return "College";
        if ($this->it_educationtype == MasterEducation::MASTER_EDUCATION_GRADUATION)
            return "Graduation";
        if ($this->it_educationtype == MasterEducation::MASTER_EDUCATION_POSTGRADUATION)
            return "Post-Graduation";
    }
}
