<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobseekerEducationRepository")
 * @ORM\HasLifecycleCallbacks
 */
class JobseekerEducation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jobseeker", inversedBy="jobseekerEducation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobseeker;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MasterEducation", inversedBy="jobseekerEducation")
     */
    private $mastereducation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $it_passedoutyear;


    /**
     * @ORM\Column(type="string", length=100)
     */
    private $vc_coursename;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $it_percentage;

    public function getId()
    {
        return $this->id;
    }

    public function getJobseeker() : ? Jobseeker
    {
        return $this->jobseeker;
    }

    public function setJobseeker(? Jobseeker $jobseeker) : self
    {
        $this->jobseeker = $jobseeker;

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

    public function getItPassedoutyear() : ? int
    {
        return $this->it_passedoutyear;
    }

    public function setItPassedoutyear(int $it_passedoutyear) : self
    {
        $this->it_passedoutyear = $it_passedoutyear;

        return $this;
    }

    public function getItPercentage() : ? int
    {
        return $this->it_percentage;
    }

    public function setItPercentage(? int $it_percentage) : self
    {
        $this->it_percentage = $it_percentage;

        return $this;
    }

    public function getVcCoursename() : ? string
    {
        return $this->vc_coursename;
    }

    public function setVcCoursename(string $vc_coursename) : self
    {
        $this->vc_coursename = $vc_coursename;

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
