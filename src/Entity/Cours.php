<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column(length: 100)]
    private ?string $synopsis = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $niveau = null;

    #[ORM\Column]
    private ?int $temps_estime = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $cree = null;

    #[ORM\ManyToOne(inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Langages $id_langage = null;

    #[ORM\ManyToOne(inversedBy: 'cours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Niveaux $id_niveau = null;

    /**
     * @var Collection<int, Chapitres>
     */
    #[ORM\OneToMany(targetEntity: Chapitres::class, mappedBy: 'id_cours')]
    private Collection $chapitres;

    public function __construct()
    {
        $this->chapitres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): static
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getTempsEstime(): ?int
    {
        return $this->temps_estime;
    }

    public function setTempsEstime(int $temps_estime): static
    {
        $this->temps_estime = $temps_estime;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getCree(): ?int
    {
        return $this->cree;
    }

    public function setCree(int $cree): static
    {
        $this->cree = $cree;

        return $this;
    }

    public function getIdLangage(): ?Langages
    {
        return $this->id_langage;
    }

    public function setIdLangage(?Langages $id_langage): static
    {
        $this->id_langage = $id_langage;

        return $this;
    }

    public function getIdNiveau(): ?Niveaux
    {
        return $this->id_niveau;
    }

    public function setIdNiveau(?Niveaux $id_niveau): static
    {
        $this->id_niveau = $id_niveau;

        return $this;
    }

    /**
     * @return Collection<int, Chapitres>
     */
    public function getChapitres(): Collection
    {
        return $this->chapitres;
    }

    public function addChapitre(Chapitres $chapitre): static
    {
        if (!$this->chapitres->contains($chapitre)) {
            $this->chapitres->add($chapitre);
            $chapitre->setIdCours($this);
        }

        return $this;
    }

    public function removeChapitre(Chapitres $chapitre): static
    {
        if ($this->chapitres->removeElement($chapitre)) {
            // set the owning side to null (unless already changed)
            if ($chapitre->getIdCours() === $this) {
                $chapitre->setIdCours(null);
            }
        }

        return $this;
    }
}
