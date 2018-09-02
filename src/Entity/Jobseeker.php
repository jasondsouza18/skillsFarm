<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobseekerRepository")
 * @UniqueEntity(fields="vc_email", message="Email already taken")
 * @UniqueEntity(fields="vc_login", message="username already taken")
 * @ORM\HasLifecycleCallbacks
 */
class Jobseeker implements UserInterface, \Serializable
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
    private $vc_login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vc_email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vc_password;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $vc_firstname;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_secondname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $vc_surname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_profilepic;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_facebooklogin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bo_sex;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dt_dob;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_location;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $db_latitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $db_longitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_country;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bo_allowinsearches;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $it_jobseekerstatus;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bo_subscriptionletter;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobseekerResume", mappedBy="jobseeker")
     */
    private $jobseekerResumes;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_headline;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dt_lastlogin;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $vc_description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobseekerKeyPoints", mappedBy="jobseeker")
     */
    private $jobseekerKeyPoints;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobseekerEducation", mappedBy="jobseeker")
     */
    private $jobseekerEducation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobseekerExperience", mappedBy="Jobseeker")
     */
    private $jobseekerExperiences;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobseekerWishlist", mappedBy="jobseeker")
     */
    private $jobseekerWishlists;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobApplication", mappedBy="jobseeker")
     */
    private $jobApplications;

    public function __construct()
    {
        $this->jobseekerResumes = new ArrayCollection();
        $this->jobseekerKeyPoints = new ArrayCollection();
        $this->jobseekerEducation = new ArrayCollection();
        $this->jobseekerWishlists = new ArrayCollection();
        $this->jobseekerExperiences = new ArrayCollection();
        $this->jobApplications = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getVcLogin() : ? string
    {
        return $this->vc_login;
    }

    public function setVcLogin(string $vc_login) : self
    {
        $this->vc_login = $vc_login;

        return $this;
    }

    public function getVcEmail() : ? string
    {
        return $this->vc_email;
    }

    public function setVcEmail(string $vc_email) : self
    {
        $this->vc_email = $vc_email;

        return $this;
    }

    public function getVcPassword() : ? string
    {
        return $this->vc_password;
    }

    public function setVcPassword(string $vc_password) : self
    {
        $this->vc_password = $vc_password;

        return $this;
    }

    public function getVcFirstname() : ? string
    {
        return $this->vc_firstname;
    }

    public function setVcFirstname(string $vc_firstname) : self
    {
        $this->vc_firstname = $vc_firstname;

        return $this;
    }

    public function getVcSecondname() : ? string
    {
        return $this->vc_secondname;
    }

    public function setVcSecondname(? string $vc_secondname) : self
    {
        $this->vc_secondname = $vc_secondname;

        return $this;
    }

    public function getVcSurname() : ? string
    {
        return $this->vc_surname;
    }

    public function setVcSurname(string $vc_surname) : self
    {
        $this->vc_surname = $vc_surname;

        return $this;
    }

    public function getVcProfilepic() : ? string
    {
        return $this->vc_profilepic;
    }

    public function setVcProfilepic(? string $vc_profilepic) : self
    {
        $this->vc_profilepic = $vc_profilepic;

        return $this;
    }

    public function getVcPhone() : ? string
    {
        return $this->vc_phone;
    }

    public function setVcPhone(? string $vc_phone) : self
    {
        $this->vc_phone = $vc_phone;

        return $this;
    }

    public function getVcFacebooklogin() : ? string
    {
        return $this->vc_facebooklogin;
    }

    public function setVcFacebooklogin(? string $vc_facebooklogin) : self
    {
        $this->vc_facebooklogin = $vc_facebooklogin;

        return $this;
    }

    public function getBoSex() : ? bool
    {
        return $this->bo_sex;
    }

    public function setBoSex(? bool $bo_sex) : self
    {
        $this->bo_sex = $bo_sex;

        return $this;
    }

    public function getDtDob() : ? \DateTimeInterface
    {
        return $this->dt_dob;
    }

    public function setDtDob(? \DateTimeInterface $dt_dob) : self
    {
        $this->dt_dob = $dt_dob;

        return $this;
    }

    public function getVcLocation() : ? string
    {
        return $this->vc_location;
    }

    public function setVcLocation(? string $vc_location) : self
    {
        $this->vc_location = $vc_location;

        return $this;
    }

    public function getDbLatitude() : ? float
    {
        return $this->db_latitude;
    }

    public function setDbLatitude(? float $db_latitude) : self
    {
        $this->db_latitude = $db_latitude;

        return $this;
    }

    public function getDbLongitude() : ? string
    {
        return $this->db_longitude;
    }

    public function setDbLongitude(? string $db_longitude) : self
    {
        $this->db_longitude = $db_longitude;

        return $this;
    }

    public function getVcAbout() : ? string
    {
        return $this->vc_about;
    }

    public function setVcAbout(? string $vc_about) : self
    {
        $this->vc_about = $vc_about;

        return $this;
    }

    public function getBoAllowinsearches() : ? bool
    {
        return $this->bo_allowinsearches;
    }

    public function setBoAllowinsearches(? bool $bo_allowinsearches) : self
    {
        $this->bo_allowinsearches = $bo_allowinsearches;

        return $this;
    }

    public function getItJobseekerstatus() : ? int
    {
        return $this->it_jobseekerstatus;
    }

    public function setItJobseekerstatus(? int $it_jobseekerstatus) : self
    {
        $this->it_jobseekerstatus = $it_jobseekerstatus;

        return $this;
    }

    public function getBoSubscriptionletter() : ? bool
    {
        return $this->bo_subscriptionletter;
    }

    public function setBoSubscriptionletter(? bool $bo_subscriptionletter) : self
    {
        $this->bo_subscriptionletter = $bo_subscriptionletter;

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
     * @return Collection|JobseekerResume[]
     */
    public function getJobseekerResumes() : Collection
    {
        return $this->jobseekerResumes;
    }

    public function addJobseekerResume(JobseekerResume $jobseekerResume) : self
    {
        if (!$this->jobseekerResumes->contains($jobseekerResume)) {
            $this->jobseekerResumes[] = $jobseekerResume;
            $jobseekerResume->setJobseeker($this);
        }

        return $this;
    }

    public function removeJobseekerResume(JobseekerResume $jobseekerResume) : self
    {
        if ($this->jobseekerResumes->contains($jobseekerResume)) {
            $this->jobseekerResumes->removeElement($jobseekerResume);
            // set the owning side to null (unless already changed)
            if ($jobseekerResume->getJobseeker() === $this) {
                $jobseekerResume->setJobseeker(null);
            }
        }

        return $this;
    }


    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    public function getRoles()
    {
        return array('ROLE_JOBSEEKER');
    }
    public function eraseCredentials()
    {
    }
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->vc_login,
            $this->vc_password,
            // see section on salt below
            // $this->salt,
        ));
    }
    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->vc_login,
            $this->vc_password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized, array('allowed_classes' => false));
    }

    public function getUsername()
    {
        return $this->vc_login;
    }
    public function getPassword()
    {
        return $this->vc_password;
    }

    public function getVcHeadline() : ? string
    {
        return $this->vc_headline;
    }

    public function setVcHeadline(? string $vc_headline) : self
    {
        $this->vc_headline = $vc_headline;

        return $this;
    }

    public function getVcLastlogin() : ? \DateTimeInterface
    {
        return $this->vc_lastlogin;
    }

    public function setVcLastlogin(? \DateTimeInterface $vc_lastlogin) : self
    {
        $this->vc_lastlogin = $vc_lastlogin;

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

    public function getDtLastlogin() : ? \DateTimeInterface
    {
        return $this->dt_lastlogin;
    }

    public function setDtLastlogin(? \DateTimeInterface $dt_lastlogin) : self
    {
        $this->dt_lastlogin = $dt_lastlogin;

        return $this;
    }

    /**
     * @return Collection|JobseekerKeyPoints[]
     */
    public function getJobseekerKeyPoints() : Collection
    {
        return $this->jobseekerKeyPoints;
    }

    public function addJobseekerKeyPoint(JobseekerKeyPoints $jobseekerKeyPoint) : self
    {
        if (!$this->jobseekerKeyPoints->contains($jobseekerKeyPoint)) {
            $this->jobseekerKeyPoints[] = $jobseekerKeyPoint;
            $jobseekerKeyPoint->setJobseeker($this);
        }

        return $this;
    }

    public function removeJobseekerKeyPoint(JobseekerKeyPoints $jobseekerKeyPoint) : self
    {
        if ($this->jobseekerKeyPoints->contains($jobseekerKeyPoint)) {
            $this->jobseekerKeyPoints->removeElement($jobseekerKeyPoint);
            // set the owning side to null (unless already changed)
            if ($jobseekerKeyPoint->getJobseeker() === $this) {
                $jobseekerKeyPoint->setJobseeker(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JobseekerEducation[]
     */
    public function getJobseekerEducation() : Collection
    {
        return $this->jobseekerEducation;
    }

    public function addJobseekerEducation(JobseekerEducation $jobseekerEducation) : self
    {
        if (!$this->jobseekerEducation->contains($jobseekerEducation)) {
            $this->jobseekerEducation[] = $jobseekerEducation;
            $jobseekerEducation->setJobseeker($this);
        }

        return $this;
    }

    public function removeJobseekerEducation(JobseekerEducation $jobseekerEducation) : self
    {
        if ($this->jobseekerEducation->contains($jobseekerEducation)) {
            $this->jobseekerEducation->removeElement($jobseekerEducation);
            // set the owning side to null (unless already changed)
            if ($jobseekerEducation->getJobseeker() === $this) {
                $jobseekerEducation->setJobseeker(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JobseekerExperience[]
     */
    public function getJobseekerExperiences() : Collection
    {
        return $this->jobseekerExperiences;
    }

    public function addJobseekerExperience(JobseekerExperience $jobseekerExperience) : self
    {
        if (!$this->jobseekerExperiences->contains($jobseekerExperience)) {
            $this->jobseekerExperiences[] = $jobseekerExperience;
            $jobseekerExperience->setJobseeker($this);
        }

        return $this;
    }

    public function removeJobseekerExperience(JobseekerExperience $jobseekerExperience) : self
    {
        if ($this->jobseekerExperiences->contains($jobseekerExperience)) {
            $this->jobseekerExperiences->removeElement($jobseekerExperience);
            // set the owning side to null (unless already changed)
            if ($jobseekerExperience->getJobseeker() === $this) {
                $jobseekerExperience->setJobseeker(null);
            }
        }

        return $this;
    }

    public function getVcCountry(): ?string
    {
        return $this->vc_country;
    }

    public function setVcCountry(?string $vc_country): self
    {
        $this->vc_country = $vc_country;

        return $this;
    }


    /**
     * @return Collection|JobseekerWishlist[]
     */
    public function getJobseekerWishlists(): Collection
    {
        return $this->jobseekerWishlists;
    }

    public function addJobseekerWishlist(JobseekerWishlist $jobseekerWishlist): self
    {
        if (!$this->jobseekerWishlists->contains($jobseekerWishlist)) {
            $this->jobseekerWishlists[] = $jobseekerWishlist;
            $jobseekerWishlist->setJobseeker($this);
        }

        return $this;
    }

    public function removeJobseekerWishlist(JobseekerWishlist $jobseekerWishlist): self
    {
        if ($this->jobseekerWishlists->contains($jobseekerWishlist)) {
            $this->jobseekerWishlists->removeElement($jobseekerWishlist);
            // set the owning side to null (unless already changed)
            if ($jobseekerWishlist->getJobseeker() === $this) {
                $jobseekerWishlist->setJobseeker(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JobApplication[]
     */
    public function getJobApplications(): Collection
    {
        return $this->jobApplications;
    }

    public function addJobApplication(JobApplication $jobApplication): self
    {
        if (!$this->jobApplications->contains($jobApplication)) {
            $this->jobApplications[] = $jobApplication;
            $jobApplication->setJobseeker($this);
        }

        return $this;
    }

    public function removeJobApplication(JobApplication $jobApplication): self
    {
        if ($this->jobApplications->contains($jobApplication)) {
            $this->jobApplications->removeElement($jobApplication);
            // set the owning side to null (unless already changed)
            if ($jobApplication->getJobseeker() === $this) {
                $jobApplication->setJobseeker(null);
            }
        }

        return $this;
    }

}
