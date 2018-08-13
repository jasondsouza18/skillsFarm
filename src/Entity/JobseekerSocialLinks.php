<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobseekerSocialLinksRepository")
 * @ORM\HasLifecycleCallbacks
 */
class JobseekerSocialLinks
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
    private $vc_facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_googleplus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_linkedin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_twitter;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\jobseeker", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $jobseeker;

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

    public function getVcFacebook() : ? string
    {
        return $this->vc_facebook;
    }

    public function setVcFacebook(? string $vc_facebook) : self
    {
        $this->vc_facebook = $vc_facebook;

        return $this;
    }

    public function getVcGoogleplus() : ? string
    {
        return $this->vc_googleplus;
    }

    public function setVcGoogleplus(? string $vc_googleplus) : self
    {
        $this->vc_googleplus = $vc_googleplus;

        return $this;
    }

    public function getVcLinkedin() : ? string
    {
        return $this->vc_linkedin;
    }

    public function setVcLinkedin(? string $vc_linkedin) : self
    {
        $this->vc_linkedin = $vc_linkedin;

        return $this;
    }

    public function getVcTwitter() : ? string
    {
        return $this->vc_twitter;
    }

    public function setVcTwitter(? string $vc_twitter) : self
    {
        $this->vc_twitter = $vc_twitter;

        return $this;
    }

    public function getJobseeker() : ? jobseeker
    {
        return $this->jobseeker;
    }

    public function setJobseeker(jobseeker $jobseeker) : self
    {
        $this->jobseeker = $jobseeker;

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
