<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobseekerExperienceRepository")
 * @ORM\HasLifecycleCallbacks
 */
class JobseekerExperience
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jobseeker", inversedBy="jobseekerExperiences")
     */
    private $Jobseeker;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MasterEducation", inversedBy="jobseekerExperiences")
     */
    private $mastereducation;

    /**
     * @ORM\Column(type="integer")
     */
    private $it_years;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vc_designation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_description;

    public function getId()
    {
        return $this->id;
    }

    public function getJobseeker() : ? Jobseeker
    {
        return $this->Jobseeker;
    }

    public function setJobseeker(? Jobseeker $Jobseeker) : self
    {
        $this->Jobseeker = $Jobseeker;

        return $this;
    }

    public function getMastereducation() : ? MasterEducation
    {
        return $this->mastereducation;
    }

    public function setMastereducation(? MasterEducation $mastereducation) : self
    {
        $this->mastereducation = $mastereducation;

        return $this;
    }

    public function getItYears() : ? int
    {
        return $this->it_years;
    }

    public function setItYears(int $it_years) : self
    {
        $this->it_years = $it_years;

        return $this;
    }

    public function getVcDesignation() : ? string
    {
        return $this->vc_designation;
    }

    public function setVcDesignation(string $vc_designation) : self
    {
        $this->vc_designation = $vc_designation;

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

    public function getVcDescription() : ? string
    {
        return $this->vc_description;
    }

    public function setVcDescription(? string $vc_description) : self
    {
        $this->vc_description = $vc_description;

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
}
