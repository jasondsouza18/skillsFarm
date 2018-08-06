<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobseekerKeyPointsRepository")
 */
class JobseekerKeyPoints
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jobseeker", inversedBy="jobseekerKeyPoints")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobseeker;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vc_keyname;

    /**
     * @ORM\Column(type="smallint")
     */
    private $it_status;

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

    public function getJobseeker(): ?Jobseeker
    {
        return $this->jobseeker;
    }

    public function setJobseeker(?Jobseeker $jobseeker): self
    {
        $this->jobseeker = $jobseeker;

        return $this;
    }

    public function getVcKeyname(): ?string
    {
        return $this->vc_keyname;
    }

    public function setVcKeyname(string $vc_keyname): self
    {
        $this->vc_keyname = $vc_keyname;

        return $this;
    }

    public function getItStatus(): ?int
    {
        return $this->it_status;
    }

    public function setItStatus(int $it_status): self
    {
        $this->it_status = $it_status;

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
}
