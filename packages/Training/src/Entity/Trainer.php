<?php declare(strict_types=1);

namespace Pehapkari\Training\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Pehapkari\BetterEasyAdmin\Entity\UploadableImageTrait;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Trainer
{
    use UploadableImageTrait;
    use Timestampable;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $website;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $bio;

    /**
     * @ORM\OneToMany(targetEntity="Pehapkari\Training\Entity\Training", mappedBy="trainer")
     * @var Training[]|ArrayCollection
     */
    private $trainings = [];

    public function __construct()
    {
        $this->trainings = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param Training[] $trainings
     */
    public function setTrainings(array $trainings): void
    {
        $this->trainings = $trainings;
    }

    /**
     * @return Collection|Training[]
     */
    public function getTrainings(): Collection
    {
        return $this->trainings;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }
}
