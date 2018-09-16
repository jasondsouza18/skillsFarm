<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MasterJobTypeRepository")
 * @ORM\HasLifecycleCallbacks
 */
class MasterJobType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vc_type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bo_typestatus;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobType", mappedBy="masterjobtype")
     */
    private $jobTypes;

    public function __construct()
    {
        $this->jobTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVcType(): ?string
    {
        return $this->vc_type;
    }

    public function setVcType(string $vc_type): self
    {
        $this->vc_type = $vc_type;

        return $this;
    }

    public function getBoTypestatus(): ?bool
    {
        return $this->bo_typestatus;
    }

    public function setBoTypestatus(bool $bo_typestatus): self
    {
        $this->bo_typestatus = $bo_typestatus;

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
     * @return Collection|JobType[]
     */
    public function getJobTypes(): Collection
    {
        return $this->jobTypes;
    }

    public function addJobType(JobType $jobType): self
    {
        if (!$this->jobTypes->contains($jobType)) {
            $this->jobTypes[] = $jobType;
            $jobType->setMasterjobtype($this);
        }

        return $this;
    }

    public function removeJobType(JobType $jobType): self
    {
        if ($this->jobTypes->contains($jobType)) {
            $this->jobTypes->removeElement($jobType);
            // set the owning side to null (unless already changed)
            if ($jobType->getMasterjobtype() === $this) {
                $jobType->setMasterjobtype(null);
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
}
