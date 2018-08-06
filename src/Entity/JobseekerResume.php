<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobseekerResumeRepository")
 */
class JobseekerResume
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\jobseeker", inversedBy="jobseekerResumes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobseeker;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_coverletter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vc_cvpath;

    /**
     * @ORM\Column(type="smallint")
     */
    private $it_priority;

    /**
     * @ORM\Column(type="smallint")
     */
    private $it_cvstatus;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function getJobseeker(): ?jobseeker
    {
        return $this->jobseeker;
    }

    public function setJobseeker(?jobseeker $jobseeker): self
    {
        $this->jobseeker = $jobseeker;

        return $this;
    }

    public function getVcCoverletter(): ?string
    {
        return $this->vc_coverletter;
    }

    public function setVcCoverletter(?string $vc_coverletter): self
    {
        $this->vc_coverletter = $vc_coverletter;

        return $this;
    }

    public function getVcCvpath(): ?string
    {
        return $this->vc_cvpath;
    }

    public function setVcCvpath(string $vc_cvpath): self
    {
        $this->vc_cvpath = $vc_cvpath;

        return $this;
    }

    public function getItPriority(): ?int
    {
        return $this->it_priority;
    }

    public function setItPriority(int $it_priority): self
    {
        $this->it_priority = $it_priority;

        return $this;
    }

    public function getItCvstatus(): ?int
    {
        return $this->it_cvstatus;
    }

    public function setItCvstatus(int $it_cvstatus): self
    {
        $this->it_cvstatus = $it_cvstatus;

        return $this;
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
