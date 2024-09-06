<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 10)]
    private ?string $matricule_ET = null;

    
    #[ORM\Column(type: 'boolean')]
    private $estAdmin;
    /**
     * @var Collection<int, Note>
     */
    #[ORM\OneToMany(targetEntity: Note::class, mappedBy: 'etudiant')]
    private Collection $notes;

    /**
     * @var Collection<int, EmploisDuTemps>
     */
    #[ORM\OneToMany(targetEntity: EmploisDuTemps::class, mappedBy: 'etudiant')]
    private Collection $emploisDuTemps;

    #[ORM\ManyToOne(inversedBy: 'etudiants')]
    private ?Classe $classe = null;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->emploisDuTemps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMatriculeET(): ?string
    {
        return $this->matricule_ET;
    }

    public function setMatriculeET(string $matricule_ET): static
    {
        $this->matricule_ET = $matricule_ET;

        return $this;
    }

    /**
     * @return Collection<int, Note>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): static
    {
        if (!$this->notes->contains($note)) {
            $this->notes->add($note);
            $note->setEtudiant($this);
        }

        return $this;
    }

    public function removeNote(Note $note): static
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getEtudiant() === $this) {
                $note->setEtudiant(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->nom . ' ' . $this->prenom; // Affiche le nom complet de l'étudiant
    }

    /**
     * @return Collection<int, EmploisDuTemps>
     */
    public function getEmplois(): Collection
    {
        return $this->emploisDuTemps;
    }

    public function addEmploi(EmploisDuTemps $emploisDuTemps): static
    {
        if (!$this->emploisDuTemps->contains($emploisDuTemps)) {
            $this->emploisDuTemps->add($emploisDuTemps);
            $emploisDuTemps->setEtudiant($this);
        }

        return $this;
    }

    public function removeEmploi(EmploisDuTemps $emploisDuTemps): static
    {
        if ($this->emploisDuTemps->removeElement($emploisDuTemps)) {
            // set the owning side to null (unless already changed)
            if ($emploisDuTemps->getEtudiant() === $this) {
                $emploisDuTemps->setEtudiant(null);
            }
        }

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): static
    {
        $this->classe = $classe;

        return $this;
    }

    public function isEstAdmin(): ?bool
    {
        return $this->estAdmin;
    }

    public function setEstAdmin(bool $estAdmin): static
    {
        $this->estAdmin = $estAdmin;

        return $this;
    }

    /**
     * @return Collection<int, EmploisDuTemps>
     */
    public function getEmploisDuTemps(): Collection
    {
        return $this->emploisDuTemps;
    }

    public function addEmploisDuTemp(EmploisDuTemps $emploisDuTemp): static
    {
        if (!$this->emploisDuTemps->contains($emploisDuTemp)) {
            $this->emploisDuTemps->add($emploisDuTemp);
            $emploisDuTemp->setEtudiant($this);
        }

        return $this;
    }

    public function removeEmploisDuTemp(EmploisDuTemps $emploisDuTemp): static
    {
        if ($this->emploisDuTemps->removeElement($emploisDuTemp)) {
            // set the owning side to null (unless already changed)
            if ($emploisDuTemp->getEtudiant() === $this) {
                $emploisDuTemp->setEtudiant(null);
            }
        }

        return $this;
    }

}
