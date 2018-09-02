<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployerRepository")
 */
class Employer implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $vc_name;

    /**
     * @ORM\Column(type="string", length=100,nullable=false)
     */
    private $vc_login;

    /**
     * @ORM\Column(type="string", length=255,nullable=false)
     */
    private $vc_email;

    /**
     * @ORM\Column(type="string", length=255,nullable=false)
     */
    private $vc_password;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_companyname;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $vc_addressline1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_addressline2;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $vc_county;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $vc_country;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vc_phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vc_url;

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

    public function getVcName(): ?string
    {
        return $this->vc_name;
    }

    public function setVcName(? string $vc_name): self
    {
        $this->vc_name = $vc_name;

        return $this;
    }

    public function getVcLoginid(): ?string
    {
        return $this->vc_login;
    }

    public function setVcLoginid(string $vc_login): self
    {
        $this->vc_login = $vc_login;

        return $this;
    }

    public function getVcEmail(): ?string
    {
        return $this->vc_email;
    }

    public function setVcEmail(string $vc_email): self
    {
        $this->vc_email = $vc_email;

        return $this;
    }

    public function getVcPassword(): ?string
    {
        return $this->vc_password;
    }

    public function setVcPassword(string $vc_password): self
    {
        $this->vc_password = $vc_password;

        return $this;
    }

    public function getVcCompanyname(): ?string
    {
        return $this->vc_companyname;
    }

    public function setVcCompanyname(? string $vc_companyname): self
    {
        $this->vc_companyname = $vc_companyname;

        return $this;
    }

    public function getVcAddressline1(): ?string
    {
        return $this->vc_addressline1;
    }

    public function setVcAddressline1(string $vc_addressline1): self
    {
        $this->vc_addressline1 = $vc_addressline1;

        return $this;
    }

    public function getVcAddressline2(): ?string
    {
        return $this->vc_addressline2;
    }

    public function setVcAddressline2(? string $vc_addressline2): self
    {
        $this->vc_addressline2 = $vc_addressline2;

        return $this;
    }

    public function getVcCounty(): ?string
    {
        return $this->vc_county;
    }

    public function setVcCounty(string $vc_county): self
    {
        $this->vc_county = $vc_county;

        return $this;
    }

    public function getVcCountry(): ?string
    {
        return $this->vc_country;
    }

    public function setVcCountry(string $vc_country): self
    {
        $this->vc_country = $vc_country;

        return $this;
    }

    public function getVcPhone(): ?string
    {
        return $this->vc_phone;
    }

    public function setVcPhone(? string $vc_phone): self
    {
        $this->vc_phone = $vc_phone;

        return $this;
    }

    public function getVcUrl(): ?string
    {
        return $this->vc_url;
    }

    public function setVcUrl(? string $vc_url): self
    {
        $this->vc_url = $vc_url;

        return $this;
    }

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
        $this->jobseekerEmployerfollowers = new ArrayCollection();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->setUpdatedAt(new \DateTime());
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


    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getRoles()
    {
        return array('ROLE_EMPLOYER');
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

    public function getVcLogin(): ?string
    {
        return $this->vc_login;
    }

    public function setVcLogin(string $vc_login): self
    {
        $this->vc_login = $vc_login;

        return $this;
    }

}
