<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CVManagementRepository")
 * @ORM\HasLifecycleCallbacks
 */
class CVManagement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cvname;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jobseeker", inversedBy="cVManagements")
     */
    private $jobseeker;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cvpath;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MasterCategory", inversedBy="cVManagements")
     */
    private $category;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCvname(): ?string
    {
        return $this->cvname;
    }

    public function setCvname(?string $cvname): self
    {
        $this->cvname = $cvname;

        return $this;
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

    public function getCvpath(): ?string
    {
        return $this->cvpath;
    }

    public function setCvpath(string $cvpath): self
    {
        $this->cvpath = $cvpath;

        return $this;
    }

    public function getCategory(): ?MasterCategory
    {
        return $this->category;
    }

    public function setCategory(?MasterCategory $category): self
    {
        $this->category = $category;

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
