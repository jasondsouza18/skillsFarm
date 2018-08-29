<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobseekerWishlistRepository")
 * @ORM\HasLifecycleCallbacks
 */
class JobseekerWishlist
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jobseeker", inversedBy="jobseekerWishlists")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobseeker;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job", inversedBy="jobseekerWishlists")
     * @ORM\JoinColumn(nullable=false)
     */
    private $job;

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

    public function getJobseeker() : ? jobseeker
    {
        return $this->jobseeker;
    }

    public function setJobseeker(? jobseeker $jobseeker) : self
    {
        $this->jobseeker = $jobseeker;

        return $this;
    }

    public function getJob() : ? job
    {
        return $this->job;
    }

    public function setJob(? job $job) : self
    {
        $this->job = $job;

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
