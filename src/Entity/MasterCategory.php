<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MasterCategoryRepository")
 * @ORM\HasLifecycleCallbacks
 */
class MasterCategory
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
    private $vc_categoryname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bo_categorystatus;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JobCategory", mappedBy="mastercategory")
     */
    private $JobCategories;

    public function __construct()
    {
        $this->JobCategories = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getVcCategoryname() : ? string
    {
        return $this->vc_categoryname;
    }

    public function setVcCategoryname(string $vc_categoryname) : self
    {
        $this->vc_categoryname = $vc_categoryname;

        return $this;
    }

    public function getBoCategorystatus() : ? string
    {
        return $this->bo_categorystatus;
    }

    public function setBoCategorystatus(string $bo_categorystatus) : self
    {
        $this->bo_categorystatus = $bo_categorystatus;

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
     * @return Collection|JobCategory[]
     */
    public function getJobCategories() : Collection
    {
        return $this->JobCategories;
    }

    public function addJobCategory(JobCategory $JobCategory) : self
    {
        if (!$this->JobCategories->contains($JobCategory)) {
            $this->JobCategories[] = $JobCategory;
            $JobCategory->setMastercategory($this);
        }

        return $this;
    }

    public function removeJobCategory(JobCategory $JobCategory) : self
    {
        if ($this->JobCategories->contains($JobCategory)) {
            $this->JobCategories->removeElement($JobCategory);
            // set the owning side to null (unless already changed)
            if ($JobCategory->getMastercategory() === $this) {
                $JobCategory->setMastercategory(null);
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
