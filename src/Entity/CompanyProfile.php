<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyProfileRepository")
 */
class CompanyProfile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $vc_url;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $vc_description;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_companyURL;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_videoURL;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_facebook;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_twitter;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_linkedIn;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_imagepath;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Employer", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $employer;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vc_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVcUrl(): ?string
    {
        return $this->vc_url;
    }

    public function setVcUrl(string $vc_url): self
    {
        $this->vc_url = $vc_url;

        return $this;
    }

    public function getVcDescription(): ?string
    {
        return $this->vc_description;
    }

    public function setVcDescription(string $vc_description): self
    {
        $this->vc_description = $vc_description;

        return $this;
    }

    public function getVcCompanyURL(): ?string
    {
        return $this->vc_companyURL;
    }

    public function setVcCompanyURL(?string $vc_companyURL): self
    {
        $this->vc_companyURL = $vc_companyURL;

        return $this;
    }

    public function getVcVideoURL(): ?string
    {
        return $this->vc_videoURL;
    }

    public function setVcVideoURL(?string $vc_videoURL): self
    {
        $this->vc_videoURL = $vc_videoURL;

        return $this;
    }

    public function getVcFacebook(): ?string
    {
        return $this->vc_facebook;
    }

    public function setVcFacebook(?string $vc_facebook): self
    {
        $this->vc_facebook = $vc_facebook;

        return $this;
    }

    public function getVcTwitter(): ?string
    {
        return $this->vc_twitter;
    }

    public function setVcTwitter(?string $vc_twitter): self
    {
        $this->vc_twitter = $vc_twitter;

        return $this;
    }

    public function getVcLinkedIn(): ?string
    {
        return $this->vc_linkedIn;
    }

    public function setVcLinkedIn(?string $vc_linkedIn): self
    {
        $this->vc_linkedIn = $vc_linkedIn;

        return $this;
    }

    public function getVcImagepath(): ?string
    {
        return $this->vc_imagepath;
    }

    public function setVcImagepath(?string $vc_imagepath): self
    {
        $this->vc_imagepath = $vc_imagepath;

        return $this;
    }

    public function getEmployer(): ?Employer
    {
        return $this->employer;
    }

    public function setEmployer(Employer $employer): self
    {
        $this->employer = $employer;

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

    public function getVcName(): ?string
    {
        return $this->vc_name;
    }

    public function setVcName(string $vc_name): self
    {
        $this->vc_name = $vc_name;

        return $this;
    }
}
