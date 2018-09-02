<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobApplicationRepository")
 * @ORM\HasLifecycleCallbacks
 */
class JobApplication
{
    const APPLY_EMAIL = 1;
    const APPLY_PHONE = 2;
    const APPLY_ONLINE = 3;
    const APPLY_ADDRESS = 4;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job", inversedBy="jobApplications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $job;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bo_issignedin;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\JobseekerResume", cascade={"persist", "remove"})
     */
    private $jobseekerresume;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $vc_firstname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $vc_surname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $vc_applicantemailaddress;

    /**
     * @ORM\Column(type="integer")
     */
    private $it_applicationmethod;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_ipaddress;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bo_trackapplication;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jobseeker", inversedBy="jobApplications")
     * @ORM\JoinColumn(nullable=true)
     */
    private $jobseeker;

    public function getId()
    {
        return $this->id;
    }

    public function getJob(): ?job
    {
        return $this->job;
    }

    public function setJob(? job $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getBoIssignedin(): ?bool
    {
        return $this->bo_issignedin;
    }

    public function setBoIssignedin(bool $bo_issignedin): self
    {
        $this->bo_issignedin = $bo_issignedin;

        return $this;
    }

    public function getJobseekerresume(): ?JobseekerResume
    {
        return $this->jobseekerresume;
    }

    public function setJobseekerresume(? JobseekerResume $jobseekerresume): self
    {
        $this->jobseekerresume = $jobseekerresume;

        return $this;
    }

    public function getVcFirstname(): ?string
    {
        return $this->vc_firstname;
    }

    public function setVcFirstname(string $vc_firstname): self
    {
        $this->vc_firstname = $vc_firstname;

        return $this;
    }

    public function getVcSurname(): ?string
    {
        return $this->vc_surname;
    }

    public function setVcSurname(string $vc_surname): self
    {
        $this->vc_surname = $vc_surname;

        return $this;
    }

    public function getVcApplicantemailaddress(): ?string
    {
        return $this->vc_applicantemailaddress;
    }

    public function setVcApplicantemailaddress(string $vc_applicantemailaddress): self
    {
        $this->vc_applicantemailaddress = $vc_applicantemailaddress;

        return $this;
    }

    public function getItApplicationmethod(): ?int
    {
        return $this->it_applicationmethod;
    }

    public function setItApplicationmethod(int $it_applicationmethod): self
    {
        $this->it_applicationmethod = $it_applicationmethod;

        return $this;
    }

    public function getVcIpaddress(): ?string
    {
        return $this->vc_ipaddress;
    }

    public function setVcIpaddress(? string $vc_ipaddress): self
    {
        $this->vc_ipaddress = $vc_ipaddress;

        return $this;
    }

    public function getBoTrackapplication(): ?bool
    {
        return $this->bo_trackapplication;
    }

    public function setBoTrackapplication(? bool $bo_trackapplication): self
    {
        $this->bo_trackapplication = $bo_trackapplication;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getApplicationmethodInstring()
    {
        if ($this->it_applicationmethod == JobApplication::APPLY_EMAIL)
            return "Email";
        if ($this->it_applicationmethod == JobApplication::APPLY_ADDRESS)
            return "Address";
        if ($this->it_applicationmethod == JobApplication::APPLY_ONLINE)
            return "Online";
        if ($this->it_applicationmethod == JobApplication::APPLY_PHONE)
            return "Phone";
    }

    public function getJobseeker(): ?Jobseeker
    {
        return $this->jobseeker;
    }

    public function setJobseeker(?Jobseeker $jobseeker): self
    {
        $this->jobseeker = $jobseeker;

        return $this;
    }
}
